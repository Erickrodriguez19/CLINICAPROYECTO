<?php
// Conexión a la base de datos
$dsn = "mysql:host=localhost;dbname=clinica;charset=utf8";
$usuario = "root";
$contrasena = "";

try {
    $conexion = new PDO($dsn, $usuario, $contrasena);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = json_decode(file_get_contents("php://input"));
        $codigo = $data->idservicio;

        $stmt = $conexion->prepare("DELETE FROM servicios WHERE idservicio = :codigo");
        $stmt->bindParam(':codigo', $codigo);
        $stmt->execute();

        echo "Servicio eliminado exitosamente.";
    }
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>
