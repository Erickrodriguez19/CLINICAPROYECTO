<?php
include 'conexion.php'; // Archivo de conexión PDO

// Verificar que se haya enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $n_cita = $_POST['n_cita'];
    $fecha_registro = $_POST['fecha_registro'];
    $servicio = $_POST['servicio'];
    $especialidad = $_POST['especialidad'];
    $medico = $_POST['medico'];
    $fecha_cita = $_POST['fecha_cita'];
    $costo = $_POST['costo'];
    $codigo = $_POST['codigo'];
    $nombres = $_POST['nombres'];
    $otros = $_POST['otros'];
    $total_cancelar = $_POST['total_cancelar'];
    $receta = $_POST['receta']; // Nuevo campo receta
    $diagnostico = $_POST['diagnostico']; // Nuevo campo diagnóstico

    // Preparar la consulta SQL para actualizar la cita
    $stmt = $conexion->prepare("
        UPDATE citas 
        SET 
            fecha_registro = :fecha_registro,
            servicio = :servicio,
            especialidad = :especialidad,
            medico = :medico,
            fecha_cita = :fecha_cita,
            costo = :costo,
            codigo = :codigo,
            nombres = :nombres,
            otros = :otros,
            total_cancelar = :total_cancelar,
            receta = :receta,
            diagnostico = :diagnostico
        WHERE n_cita = :n_cita
    ");

    // Enlazar los parámetros
    $stmt->bindParam(':fecha_registro', $fecha_registro);
    $stmt->bindParam(':servicio', $servicio);
    $stmt->bindParam(':especialidad', $especialidad);
    $stmt->bindParam(':medico', $medico);
    $stmt->bindParam(':fecha_cita', $fecha_cita);
    $stmt->bindParam(':costo', $costo);
    $stmt->bindParam(':codigo', $codigo);
    $stmt->bindParam(':nombres', $nombres);
    $stmt->bindParam(':otros', $otros);
    $stmt->bindParam(':total_cancelar', $total_cancelar);
    $stmt->bindParam(':receta', $receta);
    $stmt->bindParam(':diagnostico', $diagnostico);
    $stmt->bindParam(':n_cita', $n_cita);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Cita actualizada con éxito.";
    } else {
        echo "Error al actualizar la cita.";
    }
} else {
    echo "No se ha enviado ningún dato.";
}
?>
