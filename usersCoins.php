<?php
session_start();
if (isset($_SESSION['Admin'])) {

?>


    <!DOCTYPE html>
    <html>

    <head>
        <title> users coins page</title>
        <link rel="stylesheet" href="./styleCoins.css" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>

        <header>
            <nav class="menu">
                <ul class="menu_items">

                    <li class="menu_item"><a href="adminPage.php">MAIN PAGE</a></li>
                    <li class="menu_item"><a href="allCoins.php">COINS</a></li>
                    <li class="menu_item"><a href="users.php">USERS</a></li>
                    <li class="selected_item">USERS COINS</li>


                    <?php if (isset($_SESSION['Admin'])) { ?>
                        <li class="menu_item">
                            <?php echo '<a href="logout.php?logout">Logout</a>'; ?>
                        </li>
                    <?php } ?>

                </ul>
            </nav>

        </header>



        <?php
        $con = mysqli_connect("localhost", "root", "ParolamySQL0", "database");


        if (!$con) {
            die(' Please Check Your Connection' . mysqli_error($con));
        } else {


            $query = "select * from users";
            $statement = $con->prepare($query);

            $statement->execute();

            $result = $statement->get_result();

        ?>
            <div class="main">
                <form>
                    <select class="select" name="users" onchange="showUser(this.value)">
                        <option value="">Select an user:</option>
                        <?php

                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $row['id']; ?>"> <?php echo $row['username']; ?> </option>
                        <?php } ?>

                    </select>
                </form>
            </div>
            <br>
            <div id="txtHint"><b>User's coins will be listed here...</b></div>


        <?php } ?>

    </body>


    <script>
        function showUser(str) {
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "getuser.php?id=" + str, true);
                xmlhttp.send();
            }
        }
    </script>

    </html>

<?php

} else
    echo "access denied!";

?>