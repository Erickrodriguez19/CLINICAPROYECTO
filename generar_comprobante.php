<?php
require_once 'conexion.php';
require 'reporte/FPDF/fpdf.php';
require_once __DIR__ . '/helpers/NumeroALetras.php'; // Asegúrate de que la ruta sea correcta

define('MONEDA', 'S/');
define('MONEDA_LETRA', 'soles');
define('MONEDA_DECIMAL', 'centimos');

// Parámetros de conexión a la base de datos
$dsn = "mysql:host=localhost;dbname=clinica;charset=utf8";
$usuario = "root";
$contrasena = "";

try {
    // Crear la conexión usando PDO
    $conexion = new PDO($dsn, $usuario, $contrasena);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}

$n_cita = isset($_GET['n_cita']) ? $_GET['n_cita'] : '';

if (!filter_var($n_cita, FILTER_SANITIZE_STRING)) {
    echo "ID de cita no válido";
    exit;
}

// Consultar la cita en base al número de cita
$sqlCita = "SELECT n_cita, fecha_registro, servicio, especialidad, medico, fecha_cita, costo, codigo, nombres, otros, total_cancelar
            FROM citas WHERE n_cita = :n_cita LIMIT 1";
$stmtCita = $conexion->prepare($sqlCita);
$stmtCita->execute(['n_cita' => $n_cita]);

if ($stmtCita->rowCount() == 0) {
    echo 'No se encontraron datos de la cita';
    exit;
}

$row_cita = $stmtCita->fetch(PDO::FETCH_ASSOC);
$total = number_format($row_cita['total_cancelar'], 2, '.', ',');

$pdf = new FPDF('P', 'mm', array(70, 135));
$pdf->AddPage();
$pdf->SetMargins(5, 5, 5);
$pdf->SetFont('Arial', 'B', 9);

$pdf->Image('imagenes/CITAS.jpg.png', 3, 5, 15);

$pdf->Ln(7);
$pdf->MultiCell(70, 5, 'CLINICA DE ESPECIALIDADES', 0, 'C');
$pdf->Ln(1);

$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(17, 5, 'Cita N: ', 0, 0, 'L');
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(53, 5, $row_cita['n_cita'], 0, 1, 'L');

$pdf->Cell(70, 2, '-------------------------------------------------------', 0, 1, 'L');

$pdf->Cell(30, 5, 'Descripcion', 0, 0, 'L');
$pdf->Cell(15, 5, 'Costo', 0, 1, 'C');

$pdf->Cell(70, 2, '-------------------------------------------------------', 0, 1, 'L');

$pdf->SetFont('Arial', '', 8);

// Detalles de la cita
$pdf->Cell(30, 5, 'Servicio: ' . $row_cita['servicio'], 0, 1, 'L');
$pdf->Cell(30, 5, 'Especialidad: ' . $row_cita['especialidad'], 0, 1, 'L');
$pdf->Cell(30, 5, 'Medico: ' . $row_cita['medico'], 0, 1, 'L');
$pdf->Cell(30, 5, 'Fecha de Cita: ' . $row_cita['fecha_cita'], 0, 1, 'L');

$pdf->Ln(3);

$pdf->Cell(30, 5, 'Paciente: ' . $row_cita['nombres'], 0, 1, 'L');
$pdf->Cell(30, 5, 'Codigo: ' . $row_cita['codigo'], 0, 1, 'L');
$pdf->Cell(30, 5, 'Otros: ' . $row_cita['otros'], 0, 1, 'L');

$pdf->Ln();

$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(60, 5, sprintf('Total a Cancelar: %s %s', MONEDA, $total), 0, 1, 'R');
$pdf->Ln(2);

$pdf->SetFont('Arial', '', 8);
$pdf->MultiCell(70, 5, 'Son ' . strtolower(NumeroALetras::convertir($total, MONEDA_LETRA, MONEDA_DECIMAL)), 0, 'L');

$pdf->Ln();
$pdf->Cell(35, 5, 'Fecha: ' . $row_cita['fecha_registro'], 0, 1, 'C');
$pdf->Ln();

$pdf->MultiCell(60, 5, '| Gracias por su preferencia |', 0, 'C');

$conexion = null;
$pdf->Output();
?>
