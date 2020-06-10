<?php
header('Content-Type:application/json');
define('DB_HOST','127.0.0.1');
define('DB_USERNAME','root');
//define('DB_PASSWORD','ParolamySQL0');
define('DB_PASSWORD','Mariusmar3');
define('DB_NAME','database');


$mysqli=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);


if (!$mysqli) {
    die(' Please Check Your Connection' . mysqli_error($mysqli));
} 


$query = "SELECT * FROM coins";
$result = mysqli_query($mysqli, $query);

$data=array();
foreach($result as $row){
    $data[]=$row;
}

$result->close();
$mysqli->close();

print json_encode($data);
function averagediameter(){
    $con=OpenCon();
    $result=$con->query('SELECT avg(diameter) FROM coins');
    return $result;
}

function averageweight(){
    $con=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
    $result=$con->query('SELECT avg(wieght) FROM coins');
    $result2=$result->fetch_all();
    if(count($result2)<=0){
        echo"error";
        return -1;
    }else{
        return $result2[0][0];
    }
}
?>