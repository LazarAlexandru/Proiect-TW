<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="./styleCoins.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <div class="main">

        <div class="coins">
            <ul class="all_coins">


                <?php
                $id = $_GET['id'];
                $con = mysqli_connect("localhost", "root", "ParolamySQL0", "database");


                if (!$con) {
                    die(' Please Check Your Connection' . mysqli_error($con));
                } else {


                    $query = "select * from users_coins where id_user = ?";
                    $statement = $con->prepare($query);
                    $statement -> bind_param("i",$id);
                    $statement->execute();

                    $result = $statement->get_result();

                    if (mysqli_num_rows($result) == 0) { 
                ?>

                        <p>no coins!</p>
                        <?php
                    } else {
                        while ($row = $result->fetch_assoc()) {
                           

                        ?>

                            <li class="coin">
                                <ul class="coin_prop">
                                    <li>
                                        <div class="coin_photos">
                                            <img src=coins/users_coins/<?php echo $row['face1']; ?> alt="coin photo">
                                            <img src=coins/users_coins/<?php echo $row['face2']; ?> alt="coin photo">
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

</html>
