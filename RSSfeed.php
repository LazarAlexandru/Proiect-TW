
<?php


$begin = "<?xml version='1.0' encoding='UTF-8'?>
        <rss version='2.0'>
        <channel> 
        <title> NUMAX feed </title>
        <link> http://localhost/tw/Proiect-TW-master/catalog.php </link>
        <description> Click to see our catalog of coins </description>
        <language>en-us </language>
        <item>
        <title> Most popular coins </title>
        <link> http://localhost/tw/Proiect-TW-master/statistics.php </link>
        <description>";
$descr = "";
$con = mysqli_connect("localhost", "root", "ParolamySQL0", "database");


if (!$con) {
    die(' Please Check Your Connection' . mysqli_error($con));
} else {

    $query = "select * from coins order by no_add desc limit 3";

    $result = mysqli_query($con, $query);

    while ($row = mysqli_fetch_assoc($result)) {


        $descr .= "<span>";

        $descr .= "<span>" . "Name: " . $row['name'] . "</span>";
        $descr .= "<span>" . "Country: " . $row['country'] . "</span>";
        $descr .= "<span>" . "Year: " . $row['year'] . "</span>";

        $descr .= "</span>";
    }
}
$end = "</description>
        </item>
        </channel>
        </rss>";

$content = $begin . $descr . $end;

file_put_contents("rss.xml", $content);



?>
