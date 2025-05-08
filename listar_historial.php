<?php
require 'conexion.php';

$historiales = []; // Inicializamos la variable de historiales

try {
    // Manejar la búsqueda por DNI
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dni_busqueda'])) {
        $dni_busqueda = $_POST['dni_busqueda'];

        // Consulta para obtener el historial clínico de la base de datos filtrando por DNI
        $stmt = $conexion->prepare("SELECT id, nombres, apellidos, dni, fecha, hora, atencion, medico, receta, proximo_control, alergico FROM historial_pacientes WHERE dni = :dni ORDER BY fecha DESC, hora DESC");
        $stmt->execute([':dni' => $dni_busqueda]);
        $historiales = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        // Si no se ha realizado una búsqueda, obtenemos todos los historiales
        $stmt = $conexion->prepare("SELECT id, nombres, apellidos, dni, fecha, hora, atencion, medico, receta, proximo_control, alergico FROM historial_pacientes ORDER BY fecha DESC, hora DESC");
        $stmt->execute();
        $historiales = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}

// Manejar la eliminación de un historial clínico
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar_id'])) {
    $eliminar_id = $_POST['eliminar_id'];
    
    try {
        // Consulta para eliminar el historial clínico
        $stmt_eliminar = $conexion->prepare("DELETE FROM historial_pacientes WHERE id = :id");
        $stmt_eliminar->execute([':id' => $eliminar_id]);
        
        // Redireccionar a la misma página para evitar reenvíos de formulario
        header("Location: listar_historial.php");
        exit;
    } catch (Exception $e) {
        die("Error al eliminar el historial: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Historiales Clínicos</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <h1>Listado de Historiales Clínicos</h1>

    <div class="buttons"><br>
        <button onclick="window.location.href='historial_clinico.php'">
            <img src="imagenes/regresar.png" alt="Regresar"> Regresar
        </button>
        <button onclick="window.location.href='Menu.html'">
            <img src="imagenes/salir2.png" alt="Menú Principal"> Menú 
        </button>
    </div>
<br>
    <!-- Formulario de búsqueda por DNI -->
    <div>
        <form method="POST">
            <label for="dni_busqueda">Buscar por DNI:</label>
            <input type="text" id="dni_busqueda" name="dni_busqueda" required>
            <button type="submit">Buscar</button>
        </form>
    </div>

    <?php if (count($historiales) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>DNI</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Atención</th>
                    <th>Médico</th>
                    <th>Receta</th>
                    <th>Próximo Control</th>
                    <th>Alérgico</th>
                    <th>Exámenes Adjuntos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($historiales as $historial): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($historial['nombres']); ?></td>
                        <td><?php echo htmlspecialchars($historial['apellidos']); ?></td>
                        <td><?php echo htmlspecialchars($historial['dni']); ?></td>
                        <td><?php echo htmlspecialchars($historial['fecha']); ?></td>
                        <td><?php echo htmlspecialchars($historial['hora']); ?></td>
                        <td><?php echo htmlspecialchars($historial['atencion']); ?></td>
                        <td><?php echo htmlspecialchars($historial['medico']); ?></td>
                        <td><?php echo htmlspecialchars($historial['receta']); ?></td>
                        <td><?php echo htmlspecialchars($historial['proximo_control']); ?></td>
                        <td><?php echo htmlspecialchars($historial['alergico']); ?></td>
                        <td>
                            <?php
                            // Obtener los archivos adjuntos de la tabla examenes usando el id correcto
                            $stmt_examen = $conexion->prepare("SELECT archivo FROM examenes WHERE historial_id = :historial_id");
                            $stmt_examen->execute([':historial_id' => $historial['id']]);
                            $examenes = $stmt_examen->fetchAll(PDO::FETCH_ASSOC);

                            if (count($examenes) > 0) {
                                foreach ($examenes as $examen) {
                                    echo '<a href="' . htmlspecialchars($examen['archivo']) . '" target="_blank">Ver Examen</a><br>';
                                }
                            } else {
                                echo "No hay exámenes adjuntos";
                            }
                            ?>
                        </td>
                        <td>
                            <form method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este historial?');">
                                <input type="hidden" name="eliminar_id" value="<?php echo htmlspecialchars($historial['id']); ?>">
                                <button type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hay historiales clínicos registrados.</p>
    <?php endif; ?>
</body>
</html>
