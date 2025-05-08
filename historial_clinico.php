<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial Clínico</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <h1>Historial Clínico del Paciente</h1>
    <form action="guardar_historial.php" method="POST" enctype="multipart/form-data">
        <label for="nombres">Nombres:</label>
        <input type="text" id="nombres" name="nombres" required>

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required>

        <label for="dni">DNI:</label>
        <input type="text" id="dni" name="dni" required>

        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required>

        <label for="hora">Hora:</label>
        <input type="time" id="hora" name="hora" required>

        <label for="atencion">Atención:</label>
        <input type="text" id="atencion" name="atencion" required>

        <label for="medico">Médico:</label>
        <input type="text" id="medico" name="medico" required>

        <label for="receta">Receta:</label>
        <textarea id="receta" name="receta"></textarea>

        <label for="proximo_control">Próximo control:</label>
        <input type="date" id="proximo_control" name="proximo_control">

        <label for="alergico">¿Es alérgico a algún medicamento?</label>
        <select id="alergico" name="alergico">
            <option value="No">No</option>
            <option value="Sí">Sí</option>
        </select>

        <label for="examen">Adjuntar exámenes (análisis, ecografías):</label>
        <input type="file" id="examen" name="examen[]" multiple>
        

        <button type="submit">Guardar Historial</button>
        <br><br>
        <a href="listar_historial.php" class="boton">Ver Lista de Historial Clínico</a> 
        <button type="button" onclick="window.location.href='Menu.html';"><img src="imagenes/salir3.png" alt="Salir"> Salir</button>
        </div>

    </form>
</body>
</html>
