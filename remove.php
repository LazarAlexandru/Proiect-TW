<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript">
        function updateRSS() {

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "RSSfeed.php", true);
            xmlhttp.send();
            window.location.replace("myCollection.php");
        }
    </script>
</head>

<body>

    <?php
    session_start();
    if (isset($_SESSION['User'])) {
        $idUser = $_SESSION['UserId'];
    }

    $idCoin = $_GET['id'];
    $con = mysqli_connect("localhost", "root", "ParolamySQL0", "database");


    if (!$con) {
        die(' Please Check Your Connection' . mysqli_error($con));
    } else {

        $update_query = "update coins set no_add = no_add - 1  where id = ?";
        $statement = $con->prepare($update_query);
        $statement->bind_param("i", $idCoin);
        $statement->execute();

        $query = "delete from collections where id_user = ? and id_coin = ?";
        $statement = $con->prepare($query);
        $statement->bind_param("ii", $idUser, $idCoin);
        if ($statement->execute()) {

            echo "<script type='text/javascript'> updateRSS(); </script>";
        }
    }

    ?>

</body>

</html>