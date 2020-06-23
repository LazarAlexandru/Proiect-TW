

<?php

header('Content-type: text/csv');
header('Content-Disposition: attachment; filename="catalog.csv"');
header('Pragma: no-cache');
header('Expires: 0');
 
// create a file pointer connected to the output stream
$file = fopen('php://output', 'w');
 
// send the column headers
fputcsv($file, array('NAME', 'COUNTRY', 'YEAR', 'COMPOSITION', 'WEIGHT(g)','DIAMETER(mm)'));
 
$con = mysqli_connect("localhost", "root", "ParolamySQL0", "database");


if (!$con) {
    die(' Please Check Your Connection' . mysqli_error($con));
} else {


    $query = "select * from coins";

    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 0) {
        $txt = "no coins";
        fputcsv($file, array($txt));
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            fputcsv($file, array( $row['name'] , $row['country']  , $row['year']  , $row['composition'] , $row['weight'] , $row['diameter'] ));
            
        }}
    }
 
exit();






?>