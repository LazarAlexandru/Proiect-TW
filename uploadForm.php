<?php

session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title> upload page</title>
    <link rel="stylesheet" href="./stylel.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <form action="upload.php" method="post" enctype="multipart/form-data">
    
        <div class="box">
        <a href="myCoins.php" class="link_back">BACK TO MY COINS</a>
            <label for="fileToUpload">First face of coin:</label><br>
            <input type="file" name="fileToUpload" id="fileToUpload" class="email">
            <label for="fileToUpload1">Second face of coin:</label><br>
            <input type="file" name="fileToUpload1" id="fileToUpload1" class="email">

            <label for="name">Coin name:</label><br>
            <input type="name" name="name" class="email" />

            <label for="country">Country:</label><br>
            <input type="country" name="country" class="email" />

            <label for="year">Year:</label><br>
            <input type="year" name="year" class="email" />

            <label for="composition">Composition:</label><br>
            <input type="composition" name="composition" class="email" />

            <label for="weight">Weight:</label><br>
            <input type="weight" name="weight" class="email" />

            <label for="diameter">Diameter:</label><br>
            <input type="diameter" name="diameter" class="email" />


            <input type="submit" value="UPLOAD" name="submit" class="btnUpload">
        </div>
    </form>

</body>

</html>