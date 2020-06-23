<!DOCTYPE html>
<html>

<head>
    <title> register page</title>
    <link rel="stylesheet" href="./stylel.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>
    <header>
        <nav class="menu">
            <ul class="menu_items">
                <li class="menu_item"><a href="home.php">HOME</a></li>
                <li class="menu_item"><a href="catalog.php">CATALOG</a></li>
                <li class="menu_item"><a href="statistics.php">STATISTICS</a></li>
                <li class="menu_item"><a href="index.php">CONTACT</a></li>
            </ul>
        </nav>
    </header>

    <h1>SIGN UP</h1>


    <form name="registerForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

        <div class="box">
            <label for="email">email:</label><br>
            <input type="email" id="email" name="email" class="email" />
            <?php if (isset($_POST['Signup'])) { ?>
                <span class="error"> <?php echo verifyEmail(); ?></span>
                <br>
            <?php
            }
            ?>

            <label for="password">password:</label><br>
            <input type="password" id="password" name="password" class="password" />
            <label for="password">confirm password:</label><br>
            <input type="password" name="confpassword" class="password" />
            <?php if (isset($_POST['Signup'])) { ?>
                <span class="error"> <?php echo verifyPassword(); ?></span>
                <br>
            <?php
            }
            ?>
            <label for="username">username:</label><br>
            <input type="text" id="username" name="username" class="email" />
            <button type="submit" value="Signup" name="Signup" class="btnSIGNUP"> SIGN UP </button>
        </div>

    </form>


</body>

</html>

<?php
function verifyEmail()
{

    $con = mysqli_connect("localhost", "root", "ParolamySQL0", "database");


    if (!$con) {
        die(' Please Check Your Connection' . mysqli_error($con));
    } else {
        if (isset($_POST['Signup'])) {

            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            
            $query = "select * from users where email = ?";
            $statement = $con ->prepare($query);
            $statement -> bind_param("s",$email);

            $statement -> execute();
            $result = $statement-> get_result();

            if (mysqli_num_rows($result) > 0) { //  if ($result -> mysqli_num_rows() == 0) { 
                return "You already have an account!<a href='loginPage.php'>Login</a>";
            } else {
                if (verifyPassword() == "") {
                    $hashed_pass =  password_hash($password, PASSWORD_BCRYPT);

                    $sql = "insert into users (email,password,username) VALUES (?,?,?)";
                    $statement = $con->prepare($sql);
                    $statement->bind_param("sss", $email, $hashed_pass, $username);

                    if ($statement->execute()) {
                        header("Location: loginPage.php");
                        exit;
                    }
                }
            }
        } else
            return "";
    }
}

function verifyPassword()
{

    $con = mysqli_connect("localhost", "root", "ParolamySQL0", "database");


    if (!$con) {
        die(' Please Check Your Connection' . mysqli_error($con));
    } else {
        if (isset($_POST['Signup'])) {
            $password = $_POST['password'];
            $conf_pass =  $_POST['confpassword'];

            if ($password != $conf_pass) {
                return "Passwords do not match!";
            } else
                if (strlen($password) < 8) {
                return "Password too short(minimum 8 characters)";
            } else {

                return "";
            }
        } else
            return "";
    }
}


?>