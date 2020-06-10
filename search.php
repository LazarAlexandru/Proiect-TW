<?php

$name = $_POST['nameS'];
$country = $_POST['countryS'];
$year = $_POST['yearS'];
header("Location:catalog.php?name=$name&country=$country&year=$year");
?>