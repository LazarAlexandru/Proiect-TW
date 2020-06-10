<?php

$name = $_POST['nameSC'];
$country = $_POST['countrySC'];
$year = $_POST['yearSC'];
header("Location:myCoins.php?name=$name&country=$country&year=$year");
?>