<?php
// Conexión a la base de datos
$dsn = "mysql:host=localhost;dbname=clinica;charset=utf8";
$usuario = "root";
$contrasena = "";

try {
    $conexion = new PDO($dsn, $usuario, $contrasena);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $codigo = $_POST['idservicio'];
        $descripcion = $_POST['descripcion'];

        $stmt = $conexion->prepare("INSERT INTO servicios (idservicio, descripcion) VALUES (:codigo, :descripcion)");
        $stmt->bindParam(':codigo', $codigo);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->execute();

        echo "Servicio registrado exitosamente.";
    }
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>
