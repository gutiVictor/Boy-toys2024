<?php

require('./fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->Image('LOGO-BOY-TOYS.png', 5, 13, 20); // Logo de la empresa
        $this->SetFont('Arial', 'B', 19);
        $this->Cell(25);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(140, 25, utf8_decode('FORMATO: EMPAQUE DE TIENDA 2024'), 1, 1, 'C', 0);
        $this->Ln(3);

        $this->SetFont('Arial', 'B', 10);
        $this->SetTextColor(0, 0, 0);

        // Subtítulo
        $this->Cell(0, 10, utf8_decode('Por Favor diligencie todos los datos con las diferentes referencias que desea solicitar y observaciones que tenga al respecto.'), 0, 1, 'C');
        $this->Ln(5);

        // Información general
        $this->SetFont('Arial', '', 10);

        $this->Cell(40, 10, utf8_decode('FECHA INICIAL EMPAQUE:'), 1, 0);
        $this->Cell(40, 10, '12/07/24', 1, 0);
        $this->Cell(30, 10, utf8_decode('HORA INICIAL:'), 1, 0);
        $this->Cell(30, 10, '2:50 PM', 1, 1);

        $this->Cell(40, 10, utf8_decode('FECHA FINAL EMPAQUE:'), 1, 0);
        $this->Cell(40, 10, '15/07/24', 1, 0);
        $this->Cell(30, 10, utf8_decode('HORA FINAL:'), 1, 0);
        $this->Cell(30, 10, '5:00 PM', 1, 1);

        $this->Cell(40, 10, utf8_decode('RESPONSABLE EMPAQUE:'), 1, 0);
        $this->Cell(70, 10, '', 1, 0);
        $this->Cell(40, 10, utf8_decode('REVISADO POR:'), 1, 0);
        $this->Cell(40, 10, '', 1, 1);

        $this->Cell(40, 10, utf8_decode('NOMBRE DEL CLIENTE:'), 1, 0);
        $this->Cell(70, 10, 'Boy Toys La Tebaida', 1, 0);
        $this->Cell(40, 10, utf8_decode('NIT/CC:'), 1, 0);
        $this->Cell(40, 10, '900637945-1', 1, 1);

        $this->Cell(40, 10, utf8_decode('DIRECCIÓN:'), 1, 0);
        $this->Cell(70, 10, 'Km 10 vía la Tebaida', 1, 0);
        $this->Cell(40, 10, utf8_decode('CIUDAD:'), 1, 0);
        $this->Cell(40, 10, 'Armenia', 1, 1);

        $this->Cell(40, 10, utf8_decode('TELÉFONO:'), 1, 0);
        $this->Cell(70, 10, '322 2703045', 1, 0);
        $this->Cell(40, 10, utf8_decode('# PEDIDO:'), 1, 0);
        $this->Cell(40, 10, 'TAT-231', 1, 1);

        $this->Ln(10);

        // Campos de la tabla
        $this->SetFont('Arial', 'B', 11);
        $this->SetFillColor(228, 100, 0); // color de fondo
        $this->SetTextColor(255, 255, 255); // color de texto
        $this->SetDrawColor(163, 163, 163); // color de borde

        $this->Cell(50, 10, utf8_decode('REFERENCIA'), 1, 0, 'C', 1);
        $this->Cell(80, 10, utf8_decode('DESC. ITEM'), 1, 0, 'C', 1);
        $this->Cell(30, 10, utf8_decode('CANTIDAD'), 1, 0, 'C', 1);
        $this->Cell(30, 10, utf8_decode('NUMERO DE CAJA'), 1, 1, 'C', 1);
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
        $hoy = date('d/m/Y');
        $this->Cell(0, 10, utf8_decode($hoy), 0, 0, 'R');
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); // color de borde

// Agregar datos de ejemplo a la tabla
$referencias = [
    ["TON 1963", "Carro construcción", 24, 1],
    ["TON 1962", "Carro construcción", 24, 1],
    ["TON 1943", "Tapete", 10, 1],
    ["TON 1080", "Tiro al blanco", 48, 2],
    ["TON 1966", "Sonajero", 20, 3],
    ["TON 1714", "Trompo", 15, 3],
];

foreach ($referencias as $ref) {
    $pdf->Cell(50, 10, utf8_decode($ref[0]), 1, 0, 'C', 0);
    $pdf->Cell(80, 10, utf8_decode($ref[1]), 1, 0, 'C', 0);
    $pdf->Cell(30, 10, utf8_decode($ref[2]), 1, 0, 'C', 0);
    $pdf->Cell(30, 10, utf8_decode($ref[3]), 1, 1, 'C', 0);
}

$pdf->Output('Prueba.pdf', 'I'); // nombreDescarga, Visor (I->visualizar - D->descargar)

?>
