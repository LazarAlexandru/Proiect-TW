<?php
session_start();

?>


<!DOCTYPE html>
<html>

<head>
    <title> home page</title>
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


            <ul class="menu-items">
                <li class="selected_item">HOME</li>
                <li class="menu_item"><a href="catalog.php">CATALOG</a></li>

                <?php if (isset($_SESSION['User'])) { ?>
                    <li class="menu_item">
                        <?php echo '<a href="myCoins.php">MY COINS</a>'; ?>
                    </li>
                    <li class="menu_item">
                        <?php echo '<a href="myCollection.php">MY COLLECTION</a>'; ?>
                    </li>
                <?php } ?>
                <li class="menu_item"><a href="statistics.php">STATISTICS</a></li>
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
        <div class="welcome">
            <h1>WE LOVE COINS </h1>
        </div>
    </div>

    <div class="info">

        <p class="prinfo"> <b><strong> Compass is a knowledgeable and active participant in the rare coin and currency field. We’ve been involved in collecting and trading in coins and paper money for many years, and have the necessary expertise to evaluate numismatic material
                    in a wide variety of fields. In areas where our expertise is not as strong, we associate with partners across the country who help us to identify and evaluate the more obscure material. The growth of online resources, and the extraordinary
                    capabilities of digital photography have taken much of the guesswork and mystery out of pricing numismatic material.</strong> </b></p>
    </div>
    <br>
    <div class="info">

        <p class="prinfo"> <b><strong>
                    ◙Ancients –Greek, Persian, Roman and Byzantine<br> ◙Foreign coins both modern and old, Medieval European. <br> ◙Chinese coins and paper money is a focus area.<br> ◙Foreign paper money, old and new. Chinese paper money especially sought.<br> ◙ US coinage and paper money of all kinds – pennies through $1000 bills. Large size currency is a specialty of ours, as well as silver dollars. Proof sets, mint sets, tokens, commemoratives, and bullion issues.<br> ◙Mint errors and currency
                    printing errors.<br> ◙Always buying 90% and 40% silver coins.<br> ◙ Private mint bullion issues.
                </strong> </b></p>
    </div>

<br>

    <div class="coins">
        <ul class="gallery">
            <li> <img src="images/img-1.jpg" alt="coin photo" class="imgg"></li>
            <li> <img src="images/img-2.jpg" alt="coin photo" class="imgg"></li>
            <li> <img src="images/img-3.jpg" alt="coin photo" class="imgg"></li>
            <li> <img src="images/img-4.jpg" alt="coin photo" class="imgg"></li>
            <li> <img src="images/img-5.jpg" alt="coin photo" class="imgg"></li>
            <li> <img src="images/img-8.jpg" alt="coin photo" class="imgg"></li>
            <li> <img src="images/img-62.jpg" alt="coin photo" class="imgg"></li>
  
        </ul>
    </div>


    <br><br>
    <div class="form_box">
        <p class="paragraf">YOUR FEEDBACK</p>
        <br>
        <div id="poll">
            <h3>Do you like our app ?</h3>
            <form>
                Yes: <input type="radio" name="vote" value="0" onclick="getVote(this.value)"><br>
                No: <input type="radio" name="vote" value="1" onclick="getVote(this.value)">
            </form>
        </div>
    </div>
</body>


</html>