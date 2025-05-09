<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayuda - Clínica Salud</title>
    <link rel="stylesheet" href="css/estilos-ayuda.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
            position: relative;
        }

        h1 {
            margin: 0;
        }

        /* Botón de salir */
        .btn-salir {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #f44336;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 1em;
        }

        .btn-salir i {
            margin-right: 5px;
        }

        .btn-salir:hover {
            background-color: #d32f2f;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .section-title {
            font-size: 1.5em;
            margin-top: 20px;
            color: #4CAF50;
        }

        p, li {
            line-height: 1.6;
        }

        ul {
            padding-left: 20px;
        }

        /* Estilo del formulario */
        form {
            margin-top: 20px;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        .contact-info p, .social-media p {
            margin: 5px 0;
            font-size: 1.1em;
        }

        .social-media a {
            color: #4CAF50;
            font-size: 1.5em;
            margin: 0 10px;
            text-decoration: none;
        }

        .social-media a:hover {
            color: #45a049;
        }

        footer {
            background-color: #f4f4f9;
            color: #333;
            padding: 10px;
            text-align: center;
            font-size: 0.9em;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<header>
    <h1>Centro de Ayuda - Clínica NOVA SALUD</h1>
    <a href="Menu.html" class="btn-salir"><i class="fas fa-arrow-left"></i> Salir</a>
</header>

<div class="container">
    <section>
        <h2 class="section-title"><i class="fas fa-info-circle"></i> Información General</h2>
        <p>Bienvenido al Centro de Ayuda de nuestra clínica. Aquí encontrarás información sobre los servicios que ofrecemos, cómo acceder a ellos, y cómo contactarnos para resolver cualquier duda o inquietud.</p>
    </section>

    <section>
        <h2 class="section-title"><i class="fas fa-question-circle"></i> Preguntas Frecuentes</h2>
        <ul>
            <li><strong>¿Cómo puedo registrarme como paciente?</strong><br> Puedes registrarte directamente en la recepción de nuestra clínica o a través de nuestro sistema de registro en línea en la página principal.</li>
            <li><strong>¿Cuáles son los horarios de atención?</strong><br> Nuestra clínica está abierta de lunes a viernes de 8:00 am a 6:00 pm, y los sábados de 9:00 am a 2:00 pm. Cerramos los domingos y días festivos.</li>
            <li><strong>¿Ofrecen consultas de emergencia?</strong><br> Sí, contamos con un servicio de atención de emergencia las 24 horas para situaciones urgentes.</li>
            <li><strong>¿Qué servicios médicos están disponibles?</strong><br> Ofrecemos atención en medicina general, pediatría, ginecología, cardiología, odontología, y muchas otras especialidades. Para más información, visita nuestra sección de Servicios Médicos en la página principal.</li>
            <li><strong>¿Puedo hacer una cita en línea?</strong><br> Sí, ofrecemos un sistema de citas en línea donde puedes programar tus consultas de manera rápida y sencilla.</li>
        </ul>
    </section>

    <section>
        <h2 class="section-title"><i class="fas fa-phone-alt"></i> Contacto</h2>
        <div class="contact-info">
            <p><strong>Teléfono:</strong> +1 (555) 123-4567</p>
            <p><strong>Email:</strong> <a href="mailto:info@clinicasalud.com">info@clinicasalud.com</a></p>
            <p><strong>Dirección:</strong> Calle de la Salud #123, Ciudad, País</p>
        </div>
    </section>

    <section class="social-media">
        <h2 class="section-title"><i class="fas fa-share-alt"></i> Conéctate con Nosotros</h2>
        <p>Síguenos en nuestras redes sociales para más información y novedades:</p>
        <a href="https://facebook.com/clinicasalud" target="_blank"><i class="fab fa-facebook"></i></a>
        <a href="https://twitter.com/clinicasalud" target="_blank"><i class="fab fa-twitter"></i></a>
        <a href="https://instagram.com/clinicasalud" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://linkedin.com/company/clinicasalud" target="_blank"><i class="fab fa-linkedin"></i></a>
    </section>
</div>

<footer>
    <p>© 2025 Clínica Salud. Todos los derechos reservados.</p>
</footer>

</body>
</html>
