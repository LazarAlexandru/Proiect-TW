<!DOCTYPE html>
<html>

<head>
    <title> login page</title>
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

    <h1>SIGN IN</h1>


    <form name="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

        <div class="box">
            <label for="email">email:</label><br>
            <input type="email" id="email" name="email" class="email" />
            <?php if (isset($_POST['Login'])) { ?>
                <span class="error"> <?php echo verifyEmail(); ?></span>
                <br>
            <?php
            }
            ?>

            <label for="password">password:</label><br>
            <input type="password" id="password" name="password" class="password" />
            <?php if (isset($_POST['Login'])) { ?>
                <span class="error"> <?php echo verifyPassword(); ?></span>
                <br>
            <?php
            }
            ?>
            <button type="submit" value="Login" on action="isEmpty();" name=Login class="btnLOGIN"> Login </button>
            <a href="registerPage.php" class="btnSIGNUP">Sign Up</a>  
            <a href="loginAdmin.php" class="btnSIGNUP">Login as admin</a>  
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
        if (isset($_POST['Login'])) {

            $email = $_POST['email'];


            $query = "select * from users where email = ?";
            $statement = $con ->prepare($query);
            $statement -> bind_param("s",$email);

            $statement -> execute();
            $result = $statement-> get_result();

            if (mysqli_num_rows($result) == 0) //  if ($result -> mysqli_num_rows() == 0) { 

                return "Empty/Invalid email! If you don't have an account yet, register first!";

            else
                return "";
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
        if (isset($_POST['Login'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];
      

            $query1 = "select * from users where email = ?";
            $statement = $con ->prepare($query1);
            $statement -> bind_param("s",$email);

            $statement -> execute();
            $result = $statement-> get_result();

            $row1 = $result -> fetch_assoc();
            $pass = $row1['password'];
            if(!password_verify($password,$pass)){
                return "Empty/Wrong password!";
            } else {
                session_start();
                $_SESSION['User'] = $row1['username'];
                $_SESSION['UserId'] = $row1['id'];
                header("Location: home.php");
                exit;
            }
        } else
            return "";
    }
}


?>