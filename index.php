<?php
session_start();

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Feedback Form</title>
    <style type="text/css" media="screen">
        body {
            background-image: url("background.jpg");
            font-family: 'Open Sans', sans-serif;
            text-align: center;
            background: darkgray;
        }
        
        a {
            text-decoration: none;
        }
        
        .edittext {
            background: #ecf0f1;
            border: #ccc 1px solid;
            border-bottom: #ccc 2px solid;
            padding: 15px 10px;
            width: 250px;
            margin-bottom: 10px;
            color: darkgray;
            font-size: 1em;
            border-radius: 4px;
        }
        
        .btnSEND {
            background: #2c3e50;
            width: 125px;
            color: white;
            border-radius: 4px;
            border: darkslategray 2px solid;
            padding-top: 10px;
            padding-bottom: 5px;
            margin-top: 35px;
            margin-bottom: 10px;
            font-weight: 800;
            font-size: 1em;
        }
        
        .menu {
            background-color: lightblue;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        
        .menu_item {
            display: inline-block;
            margin: auto;
            padding-right: 15px;
        }
        
        .menu_item:hover {
            transform: scale(1.10);
            transition-duration: 0.75s;
        }
        
        .selected_item {
            color: indigo;
            font-size: 1.3em;
            font-weight: bold;
            display: inline-block;
            margin: auto;
            padding-right: 15px;
        }
        
        h1 {
            margin-top: 3em;
            font-size: 2em;
            color: floralwhite;
            font-style: inherit;
        }
        
        .edittext:hover {
            box-shadow: 0 0 10px 4px #2c3e50;
        }
        
        textarea.edittext {
            resize: none;
            height: 120px;
        }
        
        .btnSEND:hover {
            box-shadow: 0 2px 10px 6px #2c3e50;
            background: #2980b9;
        }
        
        .info {
            width: 100%;
            padding: 7px;
            text-shadow: 1px 1px 1px #222;
            color: #fff;
            font-size: 20px;
        }
        
        .box {
            margin: auto 10px;
            margin-top: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        
        .form-box {
            padding: 20px;
            background-color: #eee;
        }
        
        label {
            color: black;
            font-size: 18px;
        }
        
        .inp,
        .msg-box {
            width: 100%;
            padding: 10px;
            margin-top: 4px;
            margin-bottom: 5px;
            border-radius: 5px;
            border: 2px solid #dc143c;
            font-weight: bold;
            color: #dc143c;
            border-right: 15px solid #dc143c;
            border-left: 15px solid #dc143c;
            resize: none;
        }
        
        .msg-box {
            height: 80px;
        }
        
        .inp:focus,
        .msg-box:focus {
            outline: none;
            border: 2px solid navy;
            border-right: 15px solid navy;
            border-left: 15px solid navy;
        }
        
        .sub-btn {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            margin-top: 5px;
            border: none;
            background: linear-gradient(#dc143c, #800000);
            cursor: pointer;
            color: #fff;
            font-size: 20px;
            text-shadow: 1px 1px 1px #444;
        }
        
        .sub-btn:hover {
            background: linear-gradient(#800000, #dc143c);
            opacity: 0.8;
            transition: all ease-out 0.2s;
        }
        
        .sub-btn:focus {
            outline: none;
        }
        
        @media(max-width: 720px) {
            .main {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <header>
    <nav class="menu">
            <ul class="menu_items">
                <li class="menu_item"><a href="home.php">HOME</a></li>
                <li class="menu_item"><a href="catalog.php">CATALOG </a> </li>

                <?php if (isset($_SESSION['User'])) { ?>
                    <li class="menu_item">
                        <?php echo '<a href="myCoins.php">MY COINS </a>'; ?>
                    </li>
                <?php } ?>

                <li class="selected_item"> CONTACT </li>

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
    <div class="main">
        <div class="info">Give Your Feedback!</div>
        <form action="mail_handler.php" method="post" name="form" class="box">
            <label for="name">Name</label><br>
            <input type="text" name="name" class="edittext" placeholder="Enter Your Name" required><br>
            <label for="email">Email ID</label><br>
            <input type="email" name="email" class="edittext" placeholder="Enter Your Email" required><br>
            <label for="phone">Phone</label><br>
            <input type="tel" name="phone" class="edittext" placeholder="Enter Your Phone" required><br>
            <label for="message">Message</label><br>
            <textarea name="msg" class="edittext" placeholder="Enter Your Message Here..." required></textarea><br>
            <input type="submit" name="submit" value="Send" class="btnSEND">
        </form>
    </div>
</body>

</html>