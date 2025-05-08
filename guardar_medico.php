<?php
include 'conexion.php'; // Incluye el archivo de conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir datos del formulario
    $codigo = $_POST['codigo'];
    $apellidos = $_POST['apellidos'];
    $nombres = $_POST['nombres'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $dni = $_POST['dni'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $especialidad = $_POST['especialidad'];

    // Insertar médico
    $sql = "INSERT INTO medicos (codigo, apellidos, nombres, direccion, telefono, dni, fecha_nacimiento, especialidad) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $result = $stmt->execute([$codigo, $apellidos, $nombres, $direccion, $telefono, $dni, $fecha_nacimiento, $especialidad]);

    if ($result) {
        echo "Médico registrado correctamente.";
    } else {
        echo "Error al registrar el médico.";
    }
} else {
    echo "Método de solicitud no permitido.";
}
?>
