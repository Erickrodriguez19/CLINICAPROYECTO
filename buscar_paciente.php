<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

if (isset($_GET['dni'])) {
    $dni = $_GET['dni'];

    // Preparar la consulta para buscar al paciente por DNI
    $sql = "SELECT * FROM pacientes WHERE dni = :dni";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
    $stmt->execute();

    // Comprobar si se encontró el paciente
    if ($stmt->rowCount() > 0) {
        $paciente = $stmt->fetch(PDO::FETCH_ASSOC);

        // Generar el HTML para mostrar el paciente en la tabla
        echo "<tr>
                <td>{$paciente['codigo']}</td>
                <td>{$paciente['nombres']}</td>
                <td>{$paciente['apellidos']}</td>
                <td>{$paciente['direccion']}</td>
                <td>{$paciente['telefono']}</td>
                <td>{$paciente['dni']}</td>
                <td>{$paciente['fecha_nacimiento']}</td>
                <td>{$paciente['sexo']}</td>
               
              </tr>";
    } else {
        // Mensaje si no se encontró el paciente
        echo "<tr><td colspan='9'>Paciente no encontrado</td></tr>";
    }
} else {
    echo "<tr><td colspan='9'>No se proporcionó un DNI</td></tr>";
}
?>
