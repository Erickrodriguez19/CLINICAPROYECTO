<?php
// Conexión a la base de datos
$dsn = "mysql:host=localhost;dbname=clinica;charset=utf8";
$usuario = "root";
$contrasena = "";

try {
    $conexion = new PDO($dsn, $usuario, $contrasena);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Obtener el código del paciente a eliminar
    $codigo = $_POST['codigo'];

    // Eliminar paciente de la base de datos
    $sql = "DELETE FROM pacientes WHERE codigo = :codigo";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':codigo', $codigo);

    if ($stmt->execute()) {
        echo "Paciente eliminado correctamente.";
    } else {
        echo "Error al eliminar el paciente.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
