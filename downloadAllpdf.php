<?php
require('fpdf/fpdf.php');

$con = mysqli_connect("localhost", "root", "ParolamySQL0", "database");
if (!$con) {
    die(' Please Check Your Connection' . mysqli_error($con));
} else {
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 10);
    

    $query = "select * from coins";
    $result = mysqli_query($con, $query);
  
    while ($row = mysqli_fetch_assoc($result)) {
     

        $face1 = $row['face1'];
        $face2 = $row['face2'];

        $pdf->Image("coins/$face1", null, null, 25, 25);
        $pdf->Image("coins/$face2", null, null, 25, 25);

        $txt = "NAME: " . $row['name'];
        $pdf->Cell(5, 5, $txt);
        $pdf->Ln();
        $txt = "COUNTRY: " .  $row['country'];
        $pdf->Cell(5, 5, $txt);
        $pdf->Ln();
        $txt = "YEAR: " .  $row['year'];
        $pdf->Cell(5, 5, $txt);
        $pdf->Ln();
        $txt = "COMPOSITION: " .  $row['composition'];
        $pdf->Cell(5, 5, $txt);
        $pdf->Ln();
        $txt = "WEIGHT: " .  $row['weight']."g";
        $pdf->Cell(5, 5, $txt);
        $pdf->Ln();
        $txt = "DIAMETER: " .  $row['diameter']."mm";
        $pdf->Cell(5, 5, $txt);
        $pdf->Ln();
        $pdf->Cell(5, 5, "************************************************");
        $pdf->Ln();
        $pdf->Ln();
       
    }

    
    $pdf->Output("D","Catalog.pdf");
}
