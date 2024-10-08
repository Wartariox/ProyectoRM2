<?php
require_once "Assets/pdf/fpdf.php";
$total = 0.00;
$pdf = new FPDF('P', 'mm', array(105, 148));
$pdf->AddPage();
$pdf->setFont('Arial', 'B', 14);
$pdf->setTitle("Reporte de Compra");

// Validación de la imagen, asegurando que el archivo exista
$logo = base_url().'Assets/img/logo.jpg';
if (file_exists($logo)) {
    $pdf->image($logo, 70, 5, 30, 30, 'JPG');
} else {
    // Opcionalmente, se puede agregar un logotipo por defecto si el archivo no existe
    $pdf->Cell(50, 5, "Logo no disponible", 0, 1, 'C');
}

// Validación para nombre
$pdf->setFont('Arial', 'B', 10);
$pdf->Cell(50, 5, utf8_decode(!empty($alert['nombre']) ? $alert['nombre'] : 'Nombre no disponible'), 0, 1, 'L');

// Validación para RUC
$pdf->Cell(20, 5, utf8_decode("Ruc"), 0, 0, 'L');
$pdf->setFont('Arial', '', 10);
$pdf->Cell(50, 5, utf8_decode(!empty($alert['ruc']) ? $alert['ruc'] : 'RUC no disponible'), 0, 1, 'L');

// Validación para teléfono
$pdf->setFont('Arial', 'B', 10);
$pdf->Cell(20, 5, utf8_decode("Teléfono"), 0, 0, 'L');
$pdf->setFont('Arial', '', 10);
$pdf->Cell(50, 5, utf8_decode(!empty($alert['telefono']) ? $alert['telefono'] : 'Teléfono no disponible'), 0, 1, 'L');

// Validación para dirección
$pdf->setFont('Arial', 'B', 10);
$pdf->Cell(20, 5, utf8_decode("Dirección"), 0, 0, 'L');
$pdf->setFont('Arial', '', 10);
$pdf->Cell(50, 5, utf8_decode(!empty($alert['direccion']) ? $alert['direccion'] : 'Dirección no disponible'), 0, 1, 'L');

$pdf->Ln();
$pdf->setFont('Arial', 'B', 10);
$pdf->Cell(80, 8, utf8_decode("Detalle de los Productos"), 0, 1, 'C');
$pdf->setFont('Arial', 'B', 10);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(45, 5, utf8_decode('Descripción'), 1, 0, 'L', 1);
$pdf->Cell(10, 5, 'Cant.', 1, 0, 'L', 1);
$pdf->Cell(15, 5, 'Precio', 1, 0, 'L', 1);
$pdf->Cell(20, 5, 'Sub Total', 1, 1, 'L', 1);

// Validación de los productos y cálculo del subtotal y total
foreach ($data as $compras) {
    $producto = !empty($compras['producto']) ? utf8_decode($compras['producto']) : 'Producto no disponible';
    $cantidad = isset($compras['cantidad']) && is_numeric($compras['cantidad']) ? $compras['cantidad'] : 0;
    $precio = isset($compras['precio']) && is_numeric($compras['precio']) ? number_format($compras['precio'], 2, '.', ',') : '0.00';
    $subtotal = $cantidad * (float)$precio;
    $total += $subtotal;

    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(45, 5, $producto, 1, 0, 'L');
    $pdf->Cell(10, 5, $cantidad, 1, 0, 'L');
    $pdf->Cell(15, 5, $precio, 1, 0, 'L');
    $pdf->Cell(20, 5, number_format($subtotal, 2, '.', ','), 1, 1, 'L');
}

$pdf->Ln();
$pdf->Cell(90, 5, 'Total S/.'. number_format($total, 2, '.', ','), 0, 1, 'R');

$pdf->Output();
?>
