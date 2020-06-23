<?php
$con = mysqli_connect("localhost", "root", "ParolamySQL0", "database");
if (!$con) {
    die(' Please Check Your Connection' . mysqli_error($con));
} else {

    header('Content-type: text/csv');
    header('Content-Disposition: attachment; filename="statistics.csv"');
    header('Pragma: no-cache');
    header('Expires: 0');
     
    // create a file pointer connected to the output stream
    $file = fopen('php://output', 'w');

    $line = 'MOST POPULAR COINS';
    fputcsv($file, array($line));
    fputcsv($file, array('NAME', 'COUNTRY', 'YEAR', 'COMPOSITION', 'WEIGHT(g)','DIAMETER(mm)'));
    $query = "select * from coins order by no_add desc limit 5";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($file, array( $row['name'] , $row['country']  , $row['year']  , $row['composition'] , $row['weight'] , $row['diameter'] ));
            
    }

  

    $line = 'TOP 3 MOST SEARCHED COINS';
    fputcsv($file, array($line));
    fputcsv($file, array('NAME', 'COUNTRY', 'YEAR', 'COMPOSITION', 'WEIGHT(g)','DIAMETER(mm)'));
    $query = "select * from coins order by no_src desc limit 3";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($file, array( $row['name'] , $row['country']  , $row['year']  , $row['composition'] , $row['weight'] , $row['diameter'] ));
            
    }


    $line = 'THE OLDEST COIN';
    fputcsv($file, array($line));
    fputcsv($file, array('NAME', 'COUNTRY', 'YEAR', 'COMPOSITION', 'WEIGHT(g)','DIAMETER(mm)'));
    $query = "select * from coins order by year asc limit 1";
    $result = mysqli_query($con, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($file, array( $row['name'] , $row['country']  , $row['year']  , $row['composition'] , $row['weight'] , $row['diameter'] ));
            
    }


    $line = 'THE NEWEST COIN';
    fputcsv($file, array($line));
    fputcsv($file, array('NAME', 'COUNTRY', 'YEAR', 'COMPOSITION', 'WEIGHT(g)','DIAMETER(mm)'));
    $query = "select * from coins order by year desc limit 1";
    $result = mysqli_query($con, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($file, array( $row['name'] , $row['country']  , $row['year']  , $row['composition'] , $row['weight'] , $row['diameter'] ));
            
    }


    $line = 'COIN INFO';
    fputcsv($file, array($line));
    fputcsv($file, array('average weight of coins', 'the smallest weight of a coin', 'the heaviest weight of a coin'));
    $query = "select avg(weight),min(weight),max(weight) from coins";
    $result = mysqli_query($con, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($file, array( $row['avg(weight)'] , $row['min(weight)']  , $row['max(weight)']));
            
    }

    fputcsv($file, array('average diameter of coins', 'the smallest diameter of a coin', 'the largest diameter of a coin'));
    $query = "select avg(diameter),min(diameter),max(diameter) from coins";
    $result = mysqli_query($con, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($file, array( $row['avg(diameter)'] , $row['min(diameter)']  , $row['max(diameter)']));
            
    }

    exit();
    
}
?>