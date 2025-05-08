<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $conexion->prepare("UPDATE citas SET fecha_registro = ?, servicio = ?, especialidad = ?, medico = ?, fecha_cita = ?, costo = ?, codigo = ?, nombres = ?, otros = ?, total_cancelar = ? WHERE n_cita = ?");
    $stmt->execute([
        $_POST['fecha_registro'],
        $_POST['servicio'],
        $_POST['especialidad'],
        $_POST['medico'],
        $_POST['fecha_cita'],
        $_POST['costo'],
        $_POST['codigo'],
        $_POST['nombres'],
        $_POST['otros'],
        $_POST['total_cancelar'],
        $_POST['n_cita']
    ]);

    echo "Cita actualizada con éxito.";
}
?>
