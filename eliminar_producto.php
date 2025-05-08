<?php
// Conexión a la base de datos
$dsn = "mysql:host=localhost;dbname=clinica;charset=utf8";
$usuario = "root";
$contrasena = "";

try {
    $conexion = new PDO($dsn, $usuario, $contrasena);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}

// Verificar y eliminar producto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $stmt = $conexion->prepare("DELETE FROM productos WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        header("Location: listar_productos.php"); // Asegúrate de que este sea el nombre correcto de tu archivo
        exit;
    } else {
        echo "Error al eliminar el producto.";
    }
} else {
    echo "Solicitud no válida.";
}
