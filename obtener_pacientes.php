<?php
// Conexión a la base de datos
$dsn = "mysql:host=localhost;dbname=clinica;charset=utf8";
$usuario = "root";
$contrasena = "";

try {
    $conexion = new PDO($dsn, $usuario, $contrasena);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consultar pacientes
    $sql = "SELECT * FROM pacientes";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Mostrar resultados en formato de tabla
    foreach ($resultados as $paciente) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($paciente['codigo']) . "</td>";
        echo "<td>" . htmlspecialchars($paciente['nombres']) . "</td>";
        echo "<td>" . htmlspecialchars($paciente['apellidos']) . "</td>";
        echo "<td>" . htmlspecialchars($paciente['direccion']) . "</td>";
        echo "<td>" . htmlspecialchars($paciente['telefono']) . "</td>";
        echo "<td>" . htmlspecialchars($paciente['dni']) . "</td>";
        echo "<td>" . htmlspecialchars($paciente['fecha_nacimiento']) . "</td>";
        echo "<td>" . htmlspecialchars($paciente['sexo']) . "</td>";
        echo "</tr>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
