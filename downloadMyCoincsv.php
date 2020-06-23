<?php
$id = $_GET['id'];
$name = $_GET['name'];
$idUser = $_GET['idUser'];
$nmfile = $name . ".csv";


header('Content-type: text/csv');
header("Content-Disposition: attachment; filename=$nmfile");
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


    $query = "select * from users_coins where id_coin = ? and id_user = ?";
    $statement = $con ->prepare($query);
    $statement -> bind_param("ii",$id,$idUser);

    $statement -> execute();

    $result = $statement-> get_result();

    if (mysqli_num_rows($result) == 0) {
        $txt = "no coins";
        fputcsv($file, array($txt));
    } else {
        while ($row = $result -> fetch_assoc()) {
            fputcsv($file, array( $row['name'] , $row['country']  , $row['year']  , $row['composition'] , $row['weight'] , $row['diameter'] ));
            
        }}
    }
 
exit();

?>