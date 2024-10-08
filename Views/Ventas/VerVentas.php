<?php
require_once "Assets/pdf/fpdf.php";

// Inicialización del total
$total = 0.00;

// Creación del PDF en formato A6 (105x148 mm)
$pdf = new FPDF('P', 'mm', array(105 , 148));
$pdf->AddPage();
$pdf->setFont('Arial', 'B', 14);
$pdf->setTitle("Reporte de Venta");

// Verificación y carga de la imagen del logo
$logo_path = base_url().'Assets/img/logo.jpg';
if (file_exists($logo_path)) {
    $pdf->image($logo_path, 70, 5, 30, 30, 'JPG');
} else {
    $pdf->SetTextColor(255, 0, 0);
    $pdf->Cell(90, 5, 'Logo no disponible', 0, 1, 'C');
    $pdf->SetTextColor(0, 0, 0);
}

// Validación de los datos de configuración
if (!empty($config)) {
    $pdf->setFont('Arial', 'B', 10);
    $pdf->Cell(50, 5, utf8_decode($config['nombre'] ?? 'Nombre no disponible'), 0, 1, 'L');
    
    $pdf->Cell(20, 5, utf8_decode("RUC"), 0, 0, 'L');
    $pdf->setFont('Arial', '', 10);
    $pdf->Cell(50, 5, utf8_decode($config['ruc'] ?? 'N/A'), 0, 1, 'L');
    
    $pdf->setFont('Arial', 'B', 10);
    $pdf->Cell(20, 5, utf8_decode("Teléfono"), 0, 0, 'L');
    $pdf->setFont('Arial', '', 10);
    $pdf->Cell(50, 5, utf8_decode($config['telefono'] ?? 'N/A'), 0, 1, 'L');
    
    $pdf->setFont('Arial', 'B', 10);
    $pdf->Cell(20, 5, utf8_decode("Dirección"), 0, 0, 'L');
    $pdf->setFont('Arial', '', 10);
    $pdf->Cell(50, 5, utf8_decode($config['direccion'] ?? 'N/A'), 0, 1, 'L');
} else {
    $pdf->SetTextColor(255, 0, 0);
    $pdf->Cell(90, 5, 'Error: Configuración no disponible', 0, 1, 'C');
    $pdf->SetTextColor(0, 0, 0);
}

// Espaciado
$pdf->Ln();

// Validación y datos del cliente
if (!empty($cliente)) {
    $pdf->setFont('Arial', 'B', 10);
    $pdf->Cell(80, 8, utf8_decode("Datos del cliente"), 0, 1, 'C');
    
    $pdf->SetTextColor(255, 0, 0);
    $pdf->Cell(20, 5, 'Ruc/Dni', 0, 0, 'L');
    $pdf->Cell(50, 5, 'Nombre', 0, 0, 'L');
    $pdf->Cell(30, 5, utf8_decode('Teléfono'), 0, 1, 'L');
    $pdf->SetTextColor(0, 0, 0);
    
    // Validaciones de los datos del cliente
    $ruc_cliente = !empty($cliente['ruc']) ? utf8_decode($cliente['ruc']) : 'N/A';
    $nombre_cliente = !empty($cliente['nombre']) ? utf8_decode($cliente['nombre']) : 'N/A';
    $telefono_cliente = !empty($cliente['telefono']) ? utf8_decode($cliente['telefono']) : 'N/A';
    
    $pdf->Cell(20, 5, $ruc_cliente, 0, 0, 'L');
    $pdf->Cell(50, 5, $nombre_cliente, 0, 0, 'L');
    $pdf->Cell(30, 5, $telefono_cliente, 0, 1, 'L');
} else {
    $pdf->SetTextColor(255, 0, 0);
    $pdf->Cell(90, 5, 'Error: Datos del cliente no disponibles', 0, 1, 'C');
    $pdf->SetTextColor(0, 0, 0);
}

// Espaciado
$pdf->Ln(10);

// Encabezados de la tabla de productos
$pdf->setFont('Arial', '', 9);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(45, 5, utf8_decode('Descripción'), 1, 0, 'L', 1);
$pdf->Cell(10, 5, 'Cant.', 1, 0, 'L', 1);
$pdf->Cell(15, 5, 'Precio', 1, 0, 'L', 1);
$pdf->Cell(20, 5, 'Sub Total', 1, 1, 'L', 1);

// Verificación de datos de compras
if (!empty($data)) {
    foreach ($data as $compras) {
        // Validaciones de los campos de productos
        $descripcion = !empty($compras['producto']) ? utf8_decode($compras['producto']) : 'Producto no disponible';
        $cantidad = is_numeric($compras['cantidad']) && $compras['cantidad'] > 0 ? $compras['cantidad'] : 'N/A';
        $precio = is_numeric($compras['precio']) && $compras['precio'] > 0 ? number_format($compras['precio'], 2) : 'N/A';
        
        $subtotal = is_numeric($compras['cantidad']) && is_numeric($compras['precio']) ? $compras['cantidad'] * $compras['precio'] : 0;
        $total += $subtotal;

        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(45, 5, $descripcion, 0, 0, 'L');
        $pdf->Cell(10, 5, $cantidad, 0, 0, 'L');
        $pdf->Cell(15, 5, $precio, 0, 0, 'L');
        $pdf->Cell(20, 5, number_format($subtotal, 2, '.', ','), 0, 1, 'L');
    }
} else {
    $pdf->SetTextColor(255, 0, 0);
    $pdf->Cell(90, 5, 'Error: No hay productos en la compra', 0, 1, 'C');
    $pdf->SetTextColor(0, 0, 0);
}

// Espaciado y total
$pdf->Ln();
$pdf->Cell(90, 5, 'Total S/.' . number_format($total, 2, '.', ','), 0, 1, 'R');

// Generar salida del PDF
$pdf->Output();
?>
