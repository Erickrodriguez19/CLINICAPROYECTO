<?php
include 'conexion.php'; // Archivo de conexión PDO

// Verificar que se haya enviado el parámetro n_cita
if (isset($_GET['n_cita'])) {
    $n_cita = $_GET['n_cita'];

    // Consultar los datos de la cita especificada
    $stmt = $conexion->prepare("SELECT * FROM citas WHERE n_cita = :n_cita");
    $stmt->bindParam(':n_cita', $n_cita);
    $stmt->execute();
    $cita = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si la cita existe
    if (!$cita) {
        echo "Cita no encontrada.";
        exit;
    }
} else {
    echo "No se ha proporcionado un número de cita.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver/Editar Cita</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .contenedor {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #4CAF50;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #333;
        }

        input[type="text"],
        input[type="datetime-local"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .botones {
            text-align: center;
        }

        .botones button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            margin: 5px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .botones button:hover {
            background-color: #45a049;
        }

        .botones button[type="button"] {
            background-color: #f44336;
        }

        .botones button[type="button"]:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <h2>Detalles de la Cita</h2>
        <form action="actualizar_cita.php" method="POST">
            <input type="hidden" name="n_cita" value="<?php echo htmlspecialchars($cita['n_cita']); ?>">

            <label for="fecha_registro">Fecha de Registro:</label>
            <input type="datetime-local" id="fecha_registro" name="fecha_registro" value="<?php echo htmlspecialchars($cita['fecha_registro']); ?>" required>

            <label for="servicio">Servicio:</label>
            <input type="text" id="servicio" name="servicio" value="<?php echo htmlspecialchars($cita['servicio']); ?>" required>

            <label for="especialidad">Especialidad:</label>
            <input type="text" id="especialidad" name="especialidad" value="<?php echo htmlspecialchars($cita['especialidad']); ?>" required>

            <label for="medico">Médico:</label>
            <input type="text" id="medico" name="medico" value="<?php echo htmlspecialchars($cita['medico']); ?>" required>

            <label for="fecha_cita">Fecha de Cita:</label>
            <input type="datetime-local" id="fecha_cita" name="fecha_cita" value="<?php echo htmlspecialchars($cita['fecha_cita']); ?>" required>

            <label for="costo">Costo:</label>
            <input type="number" id="costo" name="costo" step="0.01" value="<?php echo htmlspecialchars($cita['costo']); ?>" required>

            <label for="codigo">Código Paciente:</label>
            <input type="text" id="codigo" name="codigo" value="<?php echo htmlspecialchars($cita['codigo']); ?>" required>

            <label for="nombres">Nombres Paciente:</label>
            <input type="text" id="nombres" name="nombres" value="<?php echo htmlspecialchars($cita['nombres']); ?>" required>

            <label for="otros">Otros:</label>
            <input type="text" id="otros" name="otros" value="<?php echo htmlspecialchars($cita['otros']); ?>">

            <label for="total_cancelar">Total a Cancelar S/:</label>
            <input type="number" id="total_cancelar" name="total_cancelar" step="0.01" value="<?php echo htmlspecialchars($cita['total_cancelar']); ?>">

            <div class="botones">
            <button type="submit">Guardar Cambios</button>
            <button type="button" onclick="window.location.href='lista_citas.php';">Regresar</button>
            <button type="button" onclick="window.location.href='generar_comprobante.php?n_cita=<?php echo htmlspecialchars($cita['n_cita']); ?>'">Generar Comprobante de Pago</button>
            </div>

        </form>
    </div>
</body>
</html>
