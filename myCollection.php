<?php
session_start();
if (isset($_SESSION['User'])) {
    $idUser = $_SESSION['UserId'];

?>

    <!DOCTYPE html>
    <html>

    <head>
        <title> my collection </title>
        <link rel="stylesheet" href="./styleCoins.css" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>

        <header>
            <nav class="menu">
                <ul class="menu_items">
                    <li class="menu_item"><a href="home.php">HOME</a></li>
                    <li class="menu_item"><a href="catalog.php">CATALOG</a></li>
                    <li class="menu_item"><a href="myCoins.php">MY COINS</a></li>
                    <li class="selected_item">MY COLLECTION</li>
                    <li class="menu_item"><a href="statistics.php">STATISTICS</a></li>
                    <li class="menu_item"><a href="index.php">CONTACT</a></li>

                    <?php if (isset($_SESSION['User'])) { ?>
                        <li class="menu_item">
                            <?php echo '<a href="logout.php?logout">Logout</a>'; ?>
                        </li>
                    <?php } ?>



                </ul>
            </nav>

        </header>


        <div class="main">

            <div class="coins">

                <ul class="all_coins">


                    <?php
                    $con = mysqli_connect("localhost", "root", "ParolamySQL0", "database");


                    if (!$con) {
                        die(' Please Check Your Connection' . mysqli_error($con));
                    } else {


                        $query = "select * from coins join collections on coins.id = collections.id_coin where id_user=?";
                        $statement = $con->prepare($query);
                        $statement->bind_param("i", $idUser);

                        $statement->execute();

                        $result = $statement->get_result();



                        if (mysqli_num_rows($result) == 0) { //  if ($result -> mysqli_num_rows() == 0) { 
                    ?>

                            <p>you don't have coins! Add one</p>
                            <?php
                        } else {
                            while ($row = $result->fetch_assoc()) {
                            ?>

                                <li class="coin">
                                    <ul class="coin_prop">
                                        <li>
                                            <div class="coin_photos">
                                                <img src=coins/<?php echo $row['face1']; ?> alt="coin photo">
                                                <img src=coins/<?php echo $row['face2']; ?> alt="coin photo">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="coin_info">
                                                <span>
                                                    Name : <?php echo $row['name'];
                                                            $num = $row['name']; ?>
                                                </span>

                                                <span>
                                                    Country : <?php echo $row['country']; ?>
                                                </span>

                                                <span>
                                                    Year : <?php echo $row['year']; ?>
                                                </span>
                                                <span>
                                                    <?php echo $row['composition']; ?> | <?php echo $row['weight'] . " g"; ?> | <?php echo $row['diameter'] . " mm"; ?>
                                                </span>
                                            </div>
                                        </li>
                                        <br>
                                        <li> <a href="remove.php?id= <?php echo $row['id']; ?> " class="back1">REMOVE</a> </li>
                                        <br>
                                        <li><a href="downloadCoincsv.php?id= <?php echo $row['id']; ?>&name=<?php echo $row['name']; ?> " class="back1">DOWNLOAD(csv)</a>

                                            <a href="downloadCoinpdf.php?id= <?php echo $row['id']; ?>&name=<?php echo $row['name']; ?> " class="back1">DOWNLOAD(PDF)</a></li>



                                    </ul>
                                </li>

                    <?php
                            }
                        }
                    } ?>

                </ul>
            </div>
        </div>



    </body>

    <script>
        function updateRSS() {

            var xmlhttp = new XMLHttpRequest();

            xmlhttp.open("GET", "RSSfeed.php", true);
            xmlhttp.send();

        }
    </script>

    </html>
<?php

}
?>