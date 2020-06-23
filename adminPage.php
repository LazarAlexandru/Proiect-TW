<?php
session_start();

if (isset($_SESSION['Admin'])) {

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title> admin page</title>
        <link rel="stylesheet" href="./styleCoins.css" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>

        <header>
            <nav class="menu">
                <ul class="menu_items">

                    <li class="selected_item">MAIN PAGE</li>
                    <li class="menu_item"><a href="allCoins.php">COINS</a></li>
                    <li class="menu_item"><a href="users.php">USERS</a></li>
                    <li class="menu_item"><a href="usersCoins.php">USERS COINS</a></li>



                    <?php if (isset($_SESSION['Admin'])) { ?>
                        <li class="menu_item">
                            <?php echo '<a href="logout.php?logout">Logout</a>'; ?>
                        </li>
                    <?php } ?>


                </ul>
            </nav>

        </header>

        <div class="main">


            <div class="coins">



                <?php
                $con = mysqli_connect("localhost", "root", "ParolamySQL0", "database");


                if (!$con) {
                    die(' Please Check Your Connection' . mysqli_error($con));
                } else {


                    $query = "select count(*) from coins";
                    $result = mysqli_query($con, $query);
                    $row = mysqli_fetch_assoc($result);

                    $query1 = "select count(id) from users";
                    $result1 = mysqli_query($con, $query1);
                    $row1 = mysqli_fetch_assoc($result1);

                    $query2 = "select count(*) from users_coins";
                    $result2 = mysqli_query($con, $query2);
                    $row2 = mysqli_fetch_assoc($result2);



                ?>

                    <div class="form_box">
                        <ul class="coin_prop">

                            <li>
                                <div class="coin_info">
                                    <span>
                                        number of coins from catalog: <?php echo $row['count(*)']; ?>
                                    </span>

                                    <span>
                                        number of users : <?php echo $row1['count(id)']; ?>
                                    </span>

                                    <span>
                                        number of users coins : <?php echo $row2['count(*)']; ?>
                                    </span>

                                </div>
                            </li>


                        </ul>
                    </div>

                <?php

                }
                ?>


            </div>
            <br>

            <p class="paragraf">UPLOAD A NEW COIN</p>

            <br>
            <form action="uploadNewCoin.php" method="post" enctype="multipart/form-data">

                <div class="form_box">

                    <label for="fileToUploadC">First face of coin:</label>
                    <input type="file" name="fileToUploadC" id="fileToUploadC" class="inputForm">
                    <label for="fileToUploadC1">Second face of coin:</label>
                    <input type="file" name="fileToUploadC1"  id="fileToUploadC1" class="inputForm">

                    <label for="nameC">Coin name:</label>
                    <input type="text" name="nameC" id="nameC" class="inputForm" />

                    <label for="countryC">Country:</label>
                    <input type="text" name="countryC" id="countryC" class="inputForm" />

                    <label for="yearC">Year:</label>
                    <input type="number" name="yearC"  id="yearC" class="inputForm" />

                    <label for="compositionC">Composition:</label>
                    <input type="text" name="compositionC" id="compositionC" class="inputForm" />

                    <label for="weightC">Weight(g):</label>
                    <input type="doubleval" name="weightC" id="weightC" class="inputForm" />

                    <label for="diameterC">Diameter(mm):</label>
                    <input type="doubleval" name="diameterC" id="diameterC" class="inputForm" />


                    <input type="submit" value="UPLOAD" name="submitCoin" class="btnUpload">
                </div>
            </form>


        </div>



    </body>

    </html>

<?php

} else
echo "access denied!";

?>