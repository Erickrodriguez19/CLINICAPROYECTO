<?php
include 'conexion.php'; // Archivo de conexión PDO

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $n_cita = $_POST['n_cita'];

    $stmt = $conexion->prepare("SELECT * FROM citas WHERE n_cita = ?");
    $stmt->execute([$n_cita]);
    $cita = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($cita) {
        header("Location: lista_citas.php"); // Redirige a una página con la lista de citas
    } else {
        echo "Cita no encontrada.";
    }
}
?>
