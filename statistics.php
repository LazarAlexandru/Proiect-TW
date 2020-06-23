<?php
session_start();

?>


<!DOCTYPE html>
<html>

<head>
    <title> statistics page</title>
    <link rel="stylesheet" href="./styleCoins.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <script>
        function getVote(int) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("poll").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "poll_vote.php?vote=" + int, true);
            xmlhttp.send();
        }
    </script>
</head>

<body>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>

    <header>
        <nav class="menu">
            <ul class="menu_items">
                <li class="menu_item"><a href="home.php">HOME</a></li>
                <li class="menu_item"><a href="catalog.php"> CATALOG</a></li>
                <?php if (isset($_SESSION['User'])) { ?>
                    <li class="menu_item">
                        <?php echo '<a href="myCoins.php">MY COINS</a>'; ?>
                    </li>
                    <li class="menu_item">
                        <?php echo '<a href="myCollection.php">MY COLLECTION</a>'; ?>
                    </li>
                <?php } ?>
                <li class="selected_item">STATISTICS</li>
                <li class="menu_item"><a href="index.php">CONTACT</a></li>


                <?php if (isset($_SESSION['User'])) { ?>
                    <li class="menu_item">
                        <?php echo '<a href="logout.php?logout">Logout</a>'; ?>
                    </li>
                <?php } ?>

                <?php if (!isset($_SESSION['User'])) { ?>
                    <li class="menu_item">
                        <?php echo '<a href="loginPage.php">Login</a>'; ?>
                    </li>
                <?php } ?>

            </ul>
        </nav>

    </header>

    <div class="main">
        <br>
        <a href="downloadStatcsv.php" class="back">DOWNLOAD(csv)</a>
        <a href="downloadStatPdf.php" class="back">DOWNLOAD(PDF)</a>

        <br>

        <div class="coins">



            <div>
                <br>
                <p class="paragraf"><strong> MOST POPULAR COINS </strong></p>
                <ul class="all_coins">


                    <?php
                    $con = mysqli_connect("localhost", "root", "ParolamySQL0", "database");


                    if (!$con) {
                        die(' Please Check Your Connection' . mysqli_error($con));
                    } else {


                        $query = "select * from coins order by no_add desc limit 5";

                        $result = mysqli_query($con, $query);



                        if (mysqli_num_rows($result) == 0) { ?>

                            <p>no coins!</p>
                            <?php
                        } else {
                            while ($row = mysqli_fetch_assoc($result)) {
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


                                    </ul>
                                </li>

                    <?php
                            }
                        }
                    } ?>

                </ul>
            </div>


            <div>
                <br>
                <p class="paragraf"><strong> TOP 3 MOST SEARCHED COINS </strong></p>
                <ul class="all_coins">


                    <?php


                    $query = "select * from coins order by no_src desc limit 3";

                    $result = mysqli_query($con, $query);



                    if (mysqli_num_rows($result) == 0) { ?>

                        <p>no coins!</p>
                        <?php
                    } else {
                        while ($row = mysqli_fetch_assoc($result)) {
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


                                </ul>
                            </li>

                    <?php
                        }
                    }
                    ?>

                </ul>
            </div>



            <div class="old_new_coin">
                <div>
                    <p class="paragraf"><strong>THE OLDEST COIN</strong></p>
                    <ul class="all_coins">


                        <?php

                        $query = "select * from coins order by year asc limit 1";

                        $result = mysqli_query($con, $query);



                        if (mysqli_num_rows($result) == 0) { ?>

                            <p>no coins!</p>
                            <?php
                        } else {
                            while ($row = mysqli_fetch_assoc($result)) {
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


                                    </ul>
                                </li>

                        <?php
                            }
                        }
                        ?>

                    </ul>
                </div>
                <div>
                    <p class="paragraf"><strong>THE NEWEST COIN</strong></p>
                    <ul class="all_coins">


                        <?php

                        $query = "select * from coins order by year desc limit 1";

                        $result = mysqli_query($con, $query);



                        if (mysqli_num_rows($result) == 0) { ?>

                            <p>no coins!</p>
                            <?php
                        } else {
                            while ($row = mysqli_fetch_assoc($result)) {
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


                                    </ul>
                                </li>

                        <?php
                            }
                        }
                        ?>

                    </ul>
                </div>
                <div>
                    <p class="paragraf"></p>
                    <div class="coin">

                        <ul>
                            <li>COIN INFO</li>


                            <?php
                            $query = "select avg(weight),min(weight),max(weight) from coins";
                            $result = mysqli_query($con, $query);
                            $rez = mysqli_fetch_assoc($result);
                            $avg = $rez['avg(weight)'];
                            $min = $rez['min(weight)'];
                            $max = $rez['max(weight)'];
                            ?>

                            <li>* average weight of coins: <?php echo $avg . " g"; ?> </li>
                            <li>* the smallest weight of a coin: <?php echo $min . " g"; ?> </li>
                            <li>* the heaviest weight of a coin: <?php echo $max . " g"; ?> </li>

                            <?php
                            $query = "select avg(diameter),min(diameter),max(diameter) from coins";
                            $result = mysqli_query($con, $query);
                            $rez = mysqli_fetch_assoc($result);
                            $avg = $rez['avg(diameter)'];
                            $min = $rez['min(diameter)'];
                            $max = $rez['max(diameter)'];
                            ?>

                            <li>* average diameter of coins: <?php echo $avg . " mm"; ?> </li>
                            <li>* the smallest diameter of a coin: <?php echo $min . " mm"; ?> </li>
                            <li>* the largest diameter of a coin: <?php echo $max . " mm"; ?> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <br>
        <p class="paragraf"></p>
        <br>
        <div class="form_box">
            <p class="paragraf">FEEDBACK</p>
            <br>
            <div id="poll">
                <h3>Do you like our app ?</h3>
                <form>
                    Yes: <input type="radio" name="vote" value="0" onclick="getVote(this.value)"><br>
                    No: <input type="radio" name="vote" value="1" onclick="getVote(this.value)">
                </form>
            </div>
        </div>
    </div>


</body>

</html>