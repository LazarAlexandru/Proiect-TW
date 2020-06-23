<?php
session_start();
if (isset($_SESSION['Admin'])) {

?>


<!DOCTYPE html>
<html>

<head>
    <title> users page</title>
    <link rel="stylesheet" href="./styleCoins.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>

    <header>
        <nav class="menu">
            <ul class="menu_items">

                <li class="menu_item"><a href="adminPage.php">MAIN PAGE</a></li>
                <li class="menu_item"><a href="allCoins.php"> COINS</a></li>
                <li class="selected_item">USERS</li>
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


                    $query = "select * from users";

                    $result = mysqli_query($con, $query);
                    if (mysqli_num_rows($result) == 0) { ?>

                        <p class="paragraf">no users!</p>
                        <?php
                    } else {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id_user = $row['id'];
                            $query1 = "select count(*) from users_coins where id_user=$id_user";
                            $result1 = mysqli_query($con, $query1);
                            $row1 = mysqli_fetch_assoc($result1);
                            $no_coins = $row1['count(*)'];
                           

                        ?>

                            <li class="coin">
                                <ul class="coin_prop">
                                   
                                    <li>
                                        <div class="coin_info">
                                            <span>
                                                username : <?php echo $row['username']; ?>
                                            </span>

                                            <span>
                                                email : <?php echo $row['email']; ?>
                                            </span>

                                            <span>
                                                number of coins : <?php echo $no_coins; ?>
                                            </span>
                                            
                                        </div>
                                    </li>
                                    <br>
                                    <li><a href="deleteUser.php?id= <?php echo $row['id'] ; ?>" class="btnDelete" >DELETE</a> </li>
                                    


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