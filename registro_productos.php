<?php
// Conexión a la base de datos
$dsn = "mysql:host=localhost;dbname=clinica;charset=utf8";
$usuario = "root";  // Cambia por tu usuario de base de datos
$contrasena = "";   // Cambia por tu contraseña de base de datos

try {
    $conexion = new PDO($dsn, $usuario, $contrasena);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO productos (nombre, descripcion, precio, stock) 
            VALUES (:nombre, :descripcion, :precio, :stock)";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':stock', $stock);
    $stmt->execute();

    echo "Producto registrado exitosamente.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Producto</title>
    <link rel="stylesheet" href="css/productos.css">
</head>
<body>
    <h2>Registro de Nuevo Producto</h2>
    <form method="POST" action="">
        <label for="nombre">Nombre del Producto:</label>
        <input type="text" name="nombre" id="nombre" required><br>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" required></textarea><br>

        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" step="0.01" required><br>

        <label for="stock">Cantidad en Stock:</label>
        <input type="number" name="stock" id="stock" required><br>

        <button type="submit">Registrar Producto</button>
         <!-- Botones para regresar a la página principal y ver listado de productos -->
    <a href="Menu.html"><button type="button">Regresar a la Página Principal</button></a>
    <a href="listar_productos.php"><button type="button">Ver Listado de Productos</button></a>
    </form>
</body>
</html>
