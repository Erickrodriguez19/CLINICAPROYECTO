<?php
// Conexión a la base de datos
$dsn = "mysql:host=localhost;dbname=clinica;charset=utf8";
$usuario = "root";
$contrasena = "";

try {
    $conexion = new PDO($dsn, $usuario, $contrasena);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Recibir datos del formulario
    $codigo = $_POST['codigo'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $dni = $_POST['dni'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $sexo = $_POST['sexo'];

    // Insertar en la base de datos
    $sql = "INSERT INTO pacientes (codigo, nombres, apellidos, direccion, telefono, dni, fecha_nacimiento, sexo) VALUES (:codigo, :nombres, :apellidos, :direccion, :telefono, :dni, :fecha_nacimiento, :sexo)";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':codigo', $codigo);
    $stmt->bindParam(':nombres', $nombres);
    $stmt->bindParam(':apellidos', $apellidos);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':dni', $dni);
    $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
    $stmt->bindParam(':sexo', $sexo);

    if ($stmt->execute()) {
        echo "Paciente registrado correctamente.";
    } else {
        echo "Error al registrar el paciente.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
