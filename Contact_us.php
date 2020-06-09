<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <title> Contact us</title>
    <link rel="stylesheet" href="./Contact_us.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>
    <header>
        <nav class="menu">
            <ul class="menu_items">
                <li class="menu_item"><a href="home.php">HOME</li>
                <li class="menu_item"><a href="catalog.php">CATALOG</li>

                <?php if (isset($_SESSION['User'])) { ?>
                    <li class="menu_item">
                        <?php echo '<a href="myCoins.php">MY COINS</a>'; ?>
                    </li>
                <?php } ?>

                <li class="selected_item">CONTACT</li>
                
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

    <h1>CONTACT US</h1>

    <form>

        <div class="box">
            <label for="text">Your Name:</label><br>
            <input type="text" name="email" class="edittext" placeholder="Your name" />

            <label for="email">Your email:</label><br>
            <input type="email" name="email" class="edittext" placeholder="Your email" />

            <label for="text">Your Phone:</label><br>
            <input type="text" name="phone" class="edittext" placeholder="Your phone">
            <label for="textarea">Your Message:</label><br>
            <textarea class="edittext" name="message" placeholder="Your Message"></textarea>
            <button type="submit" class="btnSEND"> SEND </button>
        </div>

    </form>
</body>

</html>