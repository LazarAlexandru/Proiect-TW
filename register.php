<?php require_once('register1.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <title> Register</title>
    <link rel="stylesheet" href="./style.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>
    <header>
        <nav class="menu">
            <ul class="menu_items">
                <li class="menu_item"><a href="index.html">HOME</li>
                <li class="menu_item"><a href="catalog.html">CATALOG</li>
            <li class="menu_item"><a href="#">MY COINS</a></li>
                <li class="menu_item"><a href="#">ABOUT US</a></li>
                <li class="menu_item"><a href="#">CONTACT</a></li>
            </ul>
        </nav>
    </header>

    <h1>REGISTER</h1>

    <form method="post" action="register.php">
        <div class="box">
            <label for="username">username</label><br>
            <input type="username" name="username" class="email" />
            <label for="password">password</label><br>
            <input type="password" name="password" class="password" />
            <label for="email">email</label><br>
            <input type="email" name="email" class="email" />
            <button type="submit" name="register" class="btnLOGIN"> Submit </button>
        </div>
    </form>
    <div>
    <?php
    if(isset($_POST['register'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $email=$_POST['email'];
        if ($username == null || $password==null || $email==null){
            echo "Please fill all the dates!";
            header("register.php");
        }else{
            $sql="INSERT INTO users (username,password,email) VALUES (?,?,?)";
            $stmt=$db->prepare($sql);
            $result=$stmt->execute([$username,$password,$email]);
            if($result){
                 echo 'User created!';
            }
            else{
                echo 'There were errors while saving the data!';
            }
        }    
    }
    ?>
</div>
</body>

</html>