<?php
include 'conexion.php'; // Incluir el archivo de conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el código de la especialidad a eliminar
    $codigo = $_POST['codigo'];

    // Preparar la consulta SQL para eliminar la especialidad
    $sql = "DELETE FROM especialidades WHERE codigo = ?";
    $stmt = $conexion->prepare($sql);
    
    // Ejecutar la consulta
    if ($stmt->execute([$codigo])) {
        echo "Especialidad eliminada correctamente.";
    } else {
        echo "Error al eliminar la especialidad.";
    }
} else {
    echo "Método de solicitud no permitido.";
}
?>
