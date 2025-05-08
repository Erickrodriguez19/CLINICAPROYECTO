<?php
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $atencion = $_POST['atencion'];
    $medico = $_POST['medico'];
    $receta = $_POST['receta'];
    $proximo_control = $_POST['proximo_control'];
    $alergico = $_POST['alergico'];
    $examenes = $_FILES['examen'];

    try {
        // Inserta el historial en la tabla `historial_pacientes`
        $stmt = $conexion->prepare("INSERT INTO historial_pacientes (nombres, apellidos, dni, fecha, hora, atencion, medico, receta, proximo_control, alergico) VALUES (:nombres, :apellidos, :dni, :fecha, :hora, :atencion, :medico, :receta, :proximo_control, :alergico)");
        $stmt->execute([
            ':nombres' => $nombres,
            ':apellidos' => $apellidos,
            ':dni' => $dni,
            ':fecha' => $fecha,
            ':hora' => $hora,
            ':atencion' => $atencion,
            ':medico' => $medico,
            ':receta' => $receta,
            ':proximo_control' => $proximo_control,
            ':alergico' => $alergico
        ]);

        $historial_id = $conexion->lastInsertId();

        // Manejo de archivos adjuntos
        foreach ($examenes['tmp_name'] as $index => $tmp_name) {
            if ($examenes['error'][$index] === UPLOAD_ERR_OK) {
                $nombre_archivo = basename($examenes['name'][$index]);
                $ruta_destino = "uploads/" . $nombre_archivo;

                if (move_uploaded_file($tmp_name, $ruta_destino)) {
                    $stmt_archivo = $conexion->prepare("INSERT INTO examenes (historial_id, archivo) VALUES (:historial_id, :archivo)");
                    $stmt_archivo->execute([
                        ':historial_id' => $historial_id,
                        ':archivo' => $ruta_destino
                    ]);
                } else {
                    echo "Error al mover el archivo {$nombre_archivo} al destino.";
                }
            }
        }

        echo "Historial guardado correctamente.";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
