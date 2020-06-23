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
                    <li class="menu_item">
                        <?php echo '<a href="myCollection.php">MY COLLECTION</a>'; ?>
                    </li>
                <?php } ?>
                <li class="menu_item"><a href="statistics.php"> STATISTICS</a></li>
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

        <a href="downloadAllcsv.php" class="back">DOWNLOAD ALL COINS(csv)</a>
        <a href="downloadAllpdf.php" class="back">DOWNLOAD ALL COINS(PDF)</a>
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
                    <br><br>
                    <a href="catalog.php" class="back1">SHOW ALL COINS</a>


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
                    $statement = $con->prepare($query);

                    $name = "";
                    $country = "";
                    $year = 0;


                    if (isset($_GET['name']) && !empty($_GET['name']) && isset($_GET['country']) &&  !empty($_GET['country']) && isset($_GET['year']) && !empty($_GET['year'])) {

                        $name = $_GET['name'];
                        $country = $_GET['country'];
                        $year = $_GET['year'];

                        $query = "select * from coins where name = ? and country = ? and year = ? ";
                        $statement = $con->prepare($query);
                        $statement->bind_param("ssi", $name, $country, $year);
                    } else
                     if (isset($_GET['name']) && !empty($_GET['name']) && isset($_GET['country']) &&  !empty($_GET['country'])) {
                        $name = $_GET['name'];
                        $country = $_GET['country'];

                        $query = "select * from coins where name = ? and country = ? ";
                        $statement = $con->prepare($query);
                        $statement->bind_param("ss", $name, $country);
                    } else
                    if (isset($_GET['name']) && !empty($_GET['name']) && isset($_GET['year']) &&  !empty($_GET['year'])) {
                        $name = $_GET['name'];
                        $year = $_GET['year'];

                        $query = "select * from coins where name = ? and year = ? ";
                        $statement = $con->prepare($query);
                        $statement->bind_param("si", $name, $year);
                    } else
                   if (isset($_GET['country']) &&  !empty($_GET['country']) && isset($_GET['year']) &&  !empty($_GET['year'])) {

                        $country = $_GET['country'];
                        $year = $_GET['year'];

                        $query = "select * from coins where  country = ? and year = ?";
                        $statement = $con->prepare($query);
                        $statement->bind_param("si", $country, $year);
                    } else
                    if (isset($_GET['name']) && !empty($_GET['name'])) {
                        $name = $_GET['name'];

                        $query = "select * from coins where name = ? ";
                        $statement = $con->prepare($query);
                        $statement->bind_param("s", $name);
                    } else
                    if (isset($_GET['country']) && !empty($_GET['country'])) {
                        $country = $_GET['country'];

                        $query = "select * from coins where country = ? ";
                        $statement = $con->prepare($query);
                        $statement->bind_param("s", $country);
                    } else
                    if (isset($_GET['year']) && !empty($_GET['year'])) {
                        $year = $_GET['year'];
                        $query = "select * from coins where year = ?";
                        $statement = $con->prepare($query);
                        $statement->bind_param("i", $year);
                    }

                    $statement->execute();

                    $result = $statement->get_result();



                    if (mysqli_num_rows($result) == 0) { //  if ($result -> mysqli_num_rows() == 0) { 
                ?>

                        <p>no coins!</p>
                        <?php
                    } else {
                        while ($row = $result->fetch_assoc()) {
                            if (isset($_GET['search'])) {
                                $id = $row['id'];
                                $update_query = "update coins set no_src = no_src + 1  where id = $id";
                                $result1 = mysqli_query($con, $update_query);
                            }

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
                                    <?php if (isset($_SESSION['User'])) {
                                        $idUser = $_SESSION['UserId'];
                                        $query2 = "select * from collections where id_user = ? and id_coin = ?";
                                        $statement2 = $con->prepare($query2);
                                        $statement2->bind_param("ii", $idUser, $row['id']);

                                        $statement2->execute();

                                        $result2 = $statement2->get_result();



                                        if (mysqli_num_rows($result2) == 0) {
                                    ?>
                                            <br>
                                            <li> <a href="add.php?id= <?php echo $row['id']; ?> " class="back1">ADD TO COLLECTION</a> </li>
                                    <?php }
                                    } ?>
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