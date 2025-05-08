<?php
// Incluir el archivo de conexión a la base de datos
require_once 'conexion.php';

// Verificar si se ha enviado el parámetro 'dni'
if (isset($_GET['dni']) && !empty($_GET['dni'])) {
    $dni = $_GET['dni'];

    try {
        // Preparar la consulta para buscar el médico por DNI
        $query = $conexion->prepare("SELECT * FROM medicos WHERE dni = :dni");
        $query->bindParam(':dni', $dni, PDO::PARAM_STR);
        $query->execute();

        // Verificar si se encontró un registro
        if ($query->rowCount() > 0) {
            // Generar el HTML de la fila del médico encontrado
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['codigo']) . "</td>";
                echo "<td>" . htmlspecialchars($row['apellidos']) . "</td>";
                echo "<td>" . htmlspecialchars($row['nombres']) . "</td>";
                echo "<td>" . htmlspecialchars($row['direccion']) . "</td>";
                echo "<td>" . htmlspecialchars($row['telefono']) . "</td>";
                echo "<td>" . htmlspecialchars($row['dni']) . "</td>";
                echo "<td>" . htmlspecialchars($row['fecha_nacimiento']) . "</td>";
                echo "<td>" . htmlspecialchars($row['especialidad']) . "</td>";
                echo "<td><button onclick=\"eliminarMedico(" . htmlspecialchars($row['codigo']) . ")\">Eliminar</button></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No se encontraron médicos con el DNI ingresado.</td></tr>";
        }
    } catch (PDOException $e) {
        echo "<tr><td colspan='9'>Error al buscar el médico: " . $e->getMessage() . "</td></tr>";
    }
} else {
    echo "<tr><td colspan='9'>Por favor, ingrese un DNI para buscar.</td></tr>";
}
?>
