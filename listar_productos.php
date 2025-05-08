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

// Obtener los productos
$sql = "SELECT * FROM productos";
$stmt = $conexion->query($sql);
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <h2>Lista de Productos</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Fecha de Registro</th>
                <th>Acción</th> <!-- Nueva columna -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?= $producto['id'] ?></td>
                    <td><?= $producto['nombre'] ?></td>
                    <td><?= $producto['descripcion'] ?></td>
                    <td><?= $producto['precio'] ?></td>
                    <td><?= $producto['stock'] ?></td>
                    <td><?= $producto['fecha_registro'] ?></td>
                    <td>
                        <form method="POST" action="eliminar_producto.php" onsubmit="return confirm('¿Deseas eliminar este producto?');">
                            <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                            <button type="submit" style="background-color: red; color: white; border: none; padding: 5px 10px; border-radius: 5px;">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<br>
    <!-- Botones para regresar -->
    <div class="buttons">
        <a href="Menu.html">
            <button type="button">
                <img src="imagenes/salir2.png" alt="Página Principal" style="width: 20px; vertical-align: middle;"> Regresar a la Página Principal
            </button>
        </a>
        
        <a href="registro_productos.php">
            <button type="button">
                <img src="imagenes/salir.png" alt="Registro Producto" style="width: 20px; vertical-align: middle;"> Registrar Nuevo Producto
            </button>
        </a>
    </div>
</body>
</html>
