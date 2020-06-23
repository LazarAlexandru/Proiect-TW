<?php
session_start();
if (isset($_SESSION['Admin'])) {

?>


<!DOCTYPE html>
<html>

<head>
    <title> all coins page</title>
    <link rel="stylesheet" href="./styleCoins.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>

    <header>
        <nav class="menu">
            <ul class="menu_items">

                <li class="menu_item"><a href="adminPage.php">MAIN PAGE</a></li>
                <li class="selected_item">COINS</li>
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
            <ul class="all_coins">


                <?php
                $con = mysqli_connect("localhost", "root", "ParolamySQL0", "database");


                if (!$con) {
                    die(' Please Check Your Connection' . mysqli_error($con));
                } else {


                    $query = "select * from coins";

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
                                                Name : <?php echo $row['name']; ?>
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
                                    <li><a href="deleteCoin.php?id= <?php echo $row['id'] ; ?>" class="btnDelete" >DELETE</a> </li>


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

</html>

<?php

} else
echo "access denied!";

?>