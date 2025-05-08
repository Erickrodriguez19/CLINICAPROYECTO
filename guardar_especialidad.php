<?php
include 'conexion.php'; // Incluir archivo de conexión

// Obtener los datos del formulario
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$servicio = $_POST['servicio'];
$consultorio = $_POST['consultorio'];
$tarifa = $_POST['tarifa'];

try {
    // Preparar la consulta SQL
    $sql = "INSERT INTO especialidades (codigo, especialidad, servicio, consultorio, tarifa)
            VALUES (:codigo, :especialidad, :servicio, :consultorio, :tarifa)";
    $stmt = $conexion->prepare($sql);
    
    // Asignar los valores a los parámetros
    $stmt->bindParam(':codigo', $codigo);
    $stmt->bindParam(':especialidad', $nombre);
    $stmt->bindParam(':servicio', $servicio);
    $stmt->bindParam(':consultorio', $consultorio);
    $stmt->bindParam(':tarifa', $tarifa);
    
    // Ejecutar la consulta
    $stmt->execute();
    
    // Respuesta de éxito
    echo "Especialidad registrada correctamente.";
} catch (PDOException $e) {
    // Manejo de errores
    echo "Error al registrar la especialidad: " . $e->getMessage();
}
?>
