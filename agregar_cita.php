<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $conexion->prepare("INSERT INTO citas (n_cita, fecha_registro, servicio, especialidad, medico, fecha_cita, costo, codigo, nombres, otros, total_cancelar) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['n_cita'],
        $_POST['fecha_registro'],
        $_POST['servicio'],
        $_POST['especialidad'],
        $_POST['medico'],
        $_POST['fecha_cita'],
        $_POST['costo'],
        $_POST['codigo'],
        $_POST['nombres'],
        $_POST['otros'],
        $_POST['total_cancelar']
    ]);

    echo "Cita agregada con éxito.";
}
?>
