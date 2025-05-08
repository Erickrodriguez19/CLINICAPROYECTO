<?php
include 'conexion.php'; // Archivo de conexión PDO

// Consultar todas las citas de la base de datos, incluyendo los nuevos campos
$stmt = $conexion->query("SELECT * FROM citas");
$citas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Citas</title>
    <link rel="stylesheet" href="css/estilos.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url('imagenes/fondo.png'); /* Cambia la URL a la ubicación de tu imagen */
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .contenedor {
            max-width: 1300px;
            margin: 20px auto;
            padding: 20px;
            background-color: rgba(244, 244, 244, 0.9); /* Fondo semitransparente */
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s;
        }

        .contenedor:hover {
            transform: scale(1.01);
        }

        h2 {
            text-align: center;
            color: #320bdf; /* Color del encabezado */
            margin-bottom: 30px;
        }

        table {
            width: 200%;
            border-collapse: collapse;
            margin-top: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 20px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn-ver {
            padding: 5px 10px;
            background-color: #d32f2f;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        .btn-ver:hover {
            background-color: #45a049;
        }

        .btn-regresar {
            padding: 10px 15px;
            background-color: #2196F3;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            margin-top: 10px;
        }

        .btn-regresar:hover {
            background-color: #1976D2;
        }

        button {
            padding: 10px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            display: inline-block;
        }

        button:hover {
            background-color: #d32f2f;
        }

        footer {
            text-align: center;
            padding: 10px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <h2>Lista de Citas Registradas</h2>
        
        <table>
            <thead>
                <tr>
                    <th>N° Cita</th>
                    <th>Fecha Registro</th>
                    <th>Servicio</th>
                    <th>Especialidad</th>
                    <th>Médico</th>
                    <th>Fecha Cita</th>
                    <th>Costo</th>
                    <th>Código Paciente</th>
                    <th>Nombres Paciente</th>
                    <th>Otros</th>
                    <th>Total a Cancelar</th>
                    <th>Comprobante</th>
                    <th>Eliminar Cita</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($citas as $cita): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($cita['n_cita']); ?></td>
                        <td><?php echo htmlspecialchars($cita['fecha_registro']); ?></td>
                        <td><?php echo htmlspecialchars($cita['servicio']); ?></td>
                        <td><?php echo htmlspecialchars($cita['especialidad']); ?></td>
                        <td><?php echo htmlspecialchars($cita['medico']); ?></td>
                        <td><?php echo htmlspecialchars($cita['fecha_cita']); ?></td>
                        <td><?php echo htmlspecialchars($cita['costo']); ?></td>
                        <td><?php echo htmlspecialchars($cita['codigo']); ?></td>
                        <td><?php echo htmlspecialchars($cita['nombres']); ?></td>
                        <td><?php echo htmlspecialchars($cita['otros']); ?></td>
                        <td><?php echo htmlspecialchars($cita['total_cancelar']); ?></td>
                        <td>
                            <a href="ver_cita.php?n_cita=<?php echo urlencode($cita['n_cita']); ?>" class="btn-ver">Ver / Editar</a>
                        </td>
                        <td>
                            <a href="eliminar_cita.php?n_cita=<?php echo urlencode($cita['n_cita']); ?>" class="btn-eliminar" onclick="return confirm('¿Estás seguro de que deseas eliminar esta cita?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div>
            <a href="regionedicion.html" class="btn-regresar">Registrar nueva cita</a>
            <button type="button" onclick="window.location.href='Menu.html';">
                <img src="imagenes/salir3.png" alt="Salir" style="vertical-align: middle;"> Salir
            </button>
        </div>
    </div>
     
    <footer>
        <p>© 2024 Plataforma Interactiva. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
