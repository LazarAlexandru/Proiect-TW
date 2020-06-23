<?php
require('fpdf/fpdf.php');

$con = mysqli_connect("localhost", "root", "ParolamySQL0", "database");
if (!$con) {
    die(' Please Check Your Connection' . mysqli_error($con));
} else {
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 10);
   


    $line = "MOST POPULAR COINS ";
    $pdf->Cell(5, 10, $line);
    $pdf->Ln();
   

    $query = "select * from coins order by no_add desc limit 5";
    $result = mysqli_query($con, $query);
    $i = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $pdf->Cell(5, 5, $i);
        $pdf->Ln();

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
      

        //if($i % 2 == 0) {$pdf->AddPage();}
        $i = $i + 1;
    }


    $pdf->AddPage();
    $line = "TOP 3 MOST SEARCHED COINS ";
    $pdf->Cell(5, 10, $line);
    $pdf->Ln();
   

    $query = "select * from coins order by no_src desc limit 3";
    $result = mysqli_query($con, $query);
    $i = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $pdf->Cell(5, 5, $i);
        $i = $i + 1;
        $pdf->Ln();

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
     
    }

    $pdf->Ln(); $pdf->Ln();
    $line = "THE OLDEST COIN ";
    $pdf->Cell(5, 10, $line);
    $pdf->Ln();
    $query = "select * from coins order by year asc limit 1";
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
    }


  
    $line = "THE NEWEST COIN";
    $pdf->Cell(5, 10, $line);
    $pdf->Ln();
    $query = "select * from coins order by year desc limit 1";
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
    }

    $pdf->Ln();
    $line = "COIN INFO";
    $pdf->Cell(5, 10, $line);
    $pdf->Ln();
    $query = "select avg(weight) from coins";
    $result = mysqli_query($con, $query);
    $rez = mysqli_fetch_assoc($result);
    $avg = $rez['avg(weight)'];
    $txt = "average weight of coins: $avg";
    $pdf->Cell(5, 5, $txt);
    $pdf->Ln();


    $query = "select weight from coins order by weight asc limit 1";
    $result = mysqli_query($con, $query);
    $rez = mysqli_fetch_assoc($result);
    $min = $rez['weight'];
    $txt = "the smallest weight of a coin: $min ";
    $pdf->Cell(5, 5, $txt);
    $pdf->Ln();


    $query = "select weight from coins order by weight desc limit 1";
    $result = mysqli_query($con, $query);
    $rez = mysqli_fetch_assoc($result);
    $max = $rez['weight'];
    $txt = "the heaviest weight of a coin: $max";
    $pdf->Cell(5, 5, $txt);
    $pdf->Ln();


    $query = "select avg(diameter) from coins";
    $result = mysqli_query($con, $query);
    $rez = mysqli_fetch_assoc($result);
    $avg = $rez['avg(diameter)'];
    $txt = "average diameter of coins: $avg";
    $pdf->Cell(5, 5, $txt);
    $pdf->Ln();


    $query = "select diameter from coins order by diameter asc limit 1";
    $result = mysqli_query($con, $query);
    $rez = mysqli_fetch_assoc($result);
    $min = $rez['diameter'];
    $txt = "the smallest diameter of a coin: $min";
    $pdf->Cell(5, 5, $txt);
    $pdf->Ln();


    $query = "select diameter from coins order by diameter desc limit 1";
    $result = mysqli_query($con, $query);
    $rez = mysqli_fetch_assoc($result);
    $max = $rez['diameter'];
    $txt = "the largest diameter of a coin: $max";
    $pdf->Cell(5, 5, $txt);
    $pdf->Ln();

    $pdf->Output("D","Statistics.pdf");
}
