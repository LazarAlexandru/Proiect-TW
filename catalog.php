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
    <a href="catalog.php" class="back">SHOW ALL COINS</a>
        <form name="searchForm" action="search.php" method="post">
            <div class="search_box">
                <div class="search">
                    <label class="search_label">Search by:</label>

                    <ul class="search_items">

                        <li class="search_item">
                            <label for="name">Name:</label>
                            <input type="text" name="nameS" placeholder="10 Lei">
                        </li>

                        <li class="search_item">
                            <label for="country">Country:</label>
                            <input type="text" name="countryS" placeholder="Romania">
                        </li>

                        <li class="search_item">
                            <label for="year">Year:</label>
                            <input type="number" name="yearS" placeholder="1918">
                        </li>

                    </ul>
                    <button type="submit" class="search_button">SEARCH</button>


                </div>
                
            </div>
        </form>
        <div class="coins">
            <ul class="all_coins">


                <?php
                $con = mysqli_connect("localhost", "root", "ParolamySQL0", "database");


                if (!$con) {
                    die(' Please Check Your Connection' . mysqli_error($con));
                } else {


                    $query = "select * from coins";
                    $name = "";
                    $country = "";
                    $year = 0;


                    if (isset($_GET['name']) && !empty($_GET['name']) && isset($_GET['country']) &&  !empty($_GET['country']) && isset($_GET['year']) && !empty($_GET['year'])) {

                        $name = $_GET['name'];
                        $country = $_GET['country'];
                        $year = $_GET['year'];
                        $query = "select * from coins where name = '$name' and country = '$country' and year = $year ";
                    } else
                     if (isset($_GET['name']) && !empty($_GET['name']) && isset($_GET['country']) &&  !empty($_GET['country'])) {
                        $name = $_GET['name'];
                        $country = $_GET['country'];
                        $query = "select * from coins where name = '$name' and country = '$country' ";
                    } else
                    if (isset($_GET['name']) && !empty($_GET['name']) && isset($_GET['year']) &&  !empty($_GET['year'])) {
                        $name = $_GET['name'];
                        $year = $_GET['year'];
                        $query = "select * from coins where name = '$name' and year = $year ";
                    } else
                   if (isset($_GET['country']) &&  !empty($_GET['country']) && isset($_GET['year']) &&  !empty($_GET['year'])) {

                        $country = $_GET['country'];
                        $year = $_GET['year'];
                        $query = "select * from coins where  country = '$country' and year = $year";
                    } else
                    if (isset($_GET['name']) && !empty($_GET['name'])) {
                        $name = $_GET['name'];
                        $query = "select * from coins where name = '$name' ";
                    } else
                    if (isset($_GET['country']) && !empty($_GET['country'])) {

                        $country = $_GET['country'];

                        $query = "select * from coins where country = '$country' ";
                    } else
                    if (isset($_GET['year']) && !empty($_GET['year'])) {
                        $year = $_GET['year'];
                        $query = "select * from coins where year = $year";
                    }

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
                                                <?php echo $row['composition']; ?> | <?php echo $row['weight']; ?> | <?php echo $row['diameter']; ?>
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
    </div>



</body>

</html>

