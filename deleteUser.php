<?php
$id = $_GET['id'];
$con = mysqli_connect("localhost", "root", "ParolamySQL0", "database");


if (!$con) {
    die(' Please Check Your Connection' . mysqli_error($con));
} else {


    $query = "delete from users where id = ?";
    $statement = $con ->prepare($query);
    $statement -> bind_param("i",$id);

    if ($statement -> execute()) {
        header("Location:users.php");
    } else {
        echo "failed to delete";
    }
}
