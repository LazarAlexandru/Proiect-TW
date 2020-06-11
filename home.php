<?php
session_start();

?>

<Home html>
    <html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <title>HOME</title>
        <link rel="stylesheet" href="home.css">
        <meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0">

        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://unpkg.com/ionicon@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
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



        <div class="welcome-text">
            <h1>We love coins</h1>
            <img src="coin_wall.png">
        </div>

       
        <div>
            <p> Compass is a knowledgeable and active participant in the rare coin and currency field. We’ve been involved in collecting and trading in coins and paper money for many years, and have the necessary expertise to evaluate numismatic material
                in a wide variety of fields. In areas where our expertise is not as strong, we associate with partners across the country who help us to identify and evaluate the more obscure material. The growth of online resources, and the extraordinary
                capabilities of digital photography have taken much of the guesswork and mystery out of pricing numismatic material.
            </p>
            <p class="p2">
                ◙Ancients –Greek, Persian, Roman and Byzantine<br> ◙Foreign coins both modern and old, Medieval European. <br> ◙Chinese coins and paper money is a focus area.<br> ◙Foreign paper money, old and new. Chinese paper money especially sought.<br> ◙ US coinage and paper money of all kinds – pennies through $1000 bills. Large size currency is a specialty of ours, as well as silver dollars. Proof sets, mint sets, tokens, commemoratives, and bullion issues.<br> ◙Mint errors and currency
                printing errors.<br> ◙Always buying 90% and 40% silver coins.<br> ◙ Private mint bullion issues.</p>
        </div>
     
        <div class="container">
            <div class="image-gallery">

<a href="images/img-1.png" class="img-1">
<i class="icon-expand"></i>
</a>

<a href="images/img-2.jpg" class="img-2">
<i class="icon-expand"></i>
</a>

<a href="images/img-3.jpg" class="img-3">
<i class="icon-expand"></i>
</a> 

<a href="images/img-4.jpg" class="img-4">
<i class="icon-expand"></i>
</a>

<a href="images/img-5.jpg" class="img-5">
<i class="icon-expand"></i>
</a>

<a href="images/img-6.jpg" class="img-6">
<i class="icon-expand"></i>
</a>

<a href="images/img-7.jpg" class="img-7">
<i class="icon-expand"></i>
</a>

<a href="images/img-8.jpg" class="img-8">
<i class="icon-expand"></i>
</a>



            </div>
        </div>
<?php

?>
<div>
    <title>Database chart</title>


</div>
    </body>