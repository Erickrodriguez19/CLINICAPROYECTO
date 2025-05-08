<?php
include 'conexion.php'; // Incluye el archivo de conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el código del médico a eliminar
    $codigo = $_POST['codigo'];

    // Preparar la consulta SQL para eliminar el médico
    $sql = "DELETE FROM medicos WHERE codigo = ?";
    $stmt = $conexion->prepare($sql);
    
    // Ejecutar la consulta
    if ($stmt->execute([$codigo])) {
        echo "Médico eliminado correctamente.";
    } else {
        echo "Error al eliminar el médico.";
    }
} else {
    echo "Método de solicitud no permitido.";
}
?>
