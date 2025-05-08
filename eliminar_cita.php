<?php
include 'conexion.php'; // Archivo de conexión PDO

if (isset($_GET['n_cita'])) {
    $n_cita = $_GET['n_cita'];
    try {
        $stmt = $conexion->prepare("DELETE FROM citas WHERE n_cita = :n_cita");
        $stmt->bindParam(':n_cita', $n_cita, PDO::PARAM_INT);
        $stmt->execute();
        header("Location: lista_citas.php"); // Redirigir a la lista de citas después de eliminar
    } catch (Exception $e) {
        echo "Error al eliminar la cita: " . $e->getMessage();
    }
}
?>
