<?php
include 'conexion.php'; // Incluir archivo de conexión

// Consulta para obtener todas las especialidades
$sql = "SELECT * FROM especialidades";
$stmt = $conexion->prepare($sql);
$stmt->execute();

// Generar el HTML con los resultados
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
            <td>{$row['codigo']}</td>
            <td>{$row['especialidad']}</td>
            <td>{$row['servicio']}</td>
            <td>{$row['consultorio']}</td>
            <td>{$row['tarifa']}</td>
            <td>
                <button onclick=\"eliminarEspecialidad('{$row['codigo']}')\">Eliminar</button>
            </td>
          </tr>";
}
?>
