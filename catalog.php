<?php
session_start();

?>


<!DOCTYPE html>
<html>

<head>
    <title> catalog page</title>
    <link rel="stylesheet" href="./styleCoins.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>

    <header>
        <nav class="menu">
            <ul class="menu_items">
                <li class="menu_item"><a href="home.php">HOME</a></li>
                <li class="selected_item">CATALOG</li>
                <?php if (isset($_SESSION['User'])) { ?>
                    <li class="menu_item">
                        <?php echo '<a href="myCoins.php">MY COINS</a>'; ?>
                    </li>
                <?php } ?>

                <li class="menu_item"><a href="Contact_us.php">CONTACT</a></li>

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
        <div class="search_box">
            <div class="search">
                <label class="search_label">Search by:</label>

                <ul class="search_items">

                    <li class="search_item">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" placeholder="10 Lei">
                    </li>

                    <li class="search_item">
                        <label for="country">Country:</label>
                        <input type="text" name="country" id="country" placeholder="Romania">
                    </li>

                    <li class="search_item">
                        <label for="year">Year:</label>
                        <input type="number" name="year" id="year" placeholder="1918">
                    </li>

                </ul>
                <button class="search_button">SEARCH</button>
            </div>

        </div>
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
                                            <img src=<?php echo $row['face1']; ?> alt="coin photo">
                                            <img src=<?php echo $row['face2']; ?> alt="coin photo">
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
                                                <?php echo $row['composition']; ?> | <?php echo $row['weight']; ?> | <?php echo $row['diameter']; ?>
                                            </span>
                                        </div>
                                    </li>

                                    <br>
                                    <li>
                                        <?php
                                        if (isset($_SESSION['User'])) {
                                        ?>
                                            <form method="POST">
                                                <input type="submit" id=<?php echo $num; ?> class="button" name="add" value="add coin" /></form>

                                        <?php
                                            if (isset($_POST['add'])) {
                                                addCoinToCol($row['id']);
                                            }
                                        }
                                        ?>
                                    </li>
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
function addCoinToCol($idCoin)
{
    $id_user = $_SESSION['UserId'];
    $con = mysqli_connect("localhost", "root", "ParolamySQL0", "database");


    if (!$con) {
        die(' Please Check Your Connection' . mysqli_error($con));
    } else {
        $query = "insert into users_coins values($id_user,$idCoin)";
        mysqli_query($con, $query);
    }
}
?>