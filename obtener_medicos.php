<?php
include 'conexion.php'; // Incluye el archivo de conexión a la base de datos

$sql = "SELECT codigo, apellidos, nombres, direccion, telefono, dni, fecha_nacimiento, especialidad FROM medicos";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $medico) {
    echo "<tr>
            <td>{$medico['codigo']}</td>
            <td>{$medico['apellidos']}</td>
            <td>{$medico['nombres']}</td>
            <td>{$medico['direccion']}</td>
            <td>{$medico['telefono']}</td>
            <td>{$medico['dni']}</td>
            <td>{$medico['fecha_nacimiento']}</td>
            <td>{$medico['especialidad']}</td>
            <td><button onclick='eliminarMedico(\"{$medico['codigo']}\")'>Eliminar</button></td>
          </tr>";
}
?>
