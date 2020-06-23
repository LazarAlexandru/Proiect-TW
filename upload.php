<?php
session_start();
$target_dir = "coins/users_coins/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$target_file1 = $target_dir . basename($_FILES["fileToUpload1"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));

$idUser = $_SESSION['UserId'];
$face1 = basename($_FILES["fileToUpload"]["name"]);
$face2 = basename($_FILES["fileToUpload1"]["name"]);
$name = $_POST['name'];
$country = $_POST['country'];
$year = $_POST['year'];
$composition = $_POST['composition'];
$weight = $_POST['weight'];
$diameter = $_POST['diameter'];

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  $check1 = getimagesize($_FILES["fileToUpload1"]["tmp_name"]);
  if($check !== false && $check1 !== false) {
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}



// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your files was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) && move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file1)) {
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
if($uploadOk==1){
$con = mysqli_connect("localhost", "root", "ParolamySQL0", "database");


                if (!$con) {
                    die(' Please Check Your Connection' . mysqli_error($con));
                } else {
                  $query = "insert into users_coins(id_user,name,country,year,composition,weight,diameter,face1,face2) values(?,?,?,?,?,?,?,?,?)";
                  $statement = $con ->prepare($query);
                  $statement->bind_param("issisddss",$idUser,$name,$country,$year,$composition,$weight,$diameter,$face1,$face2);
                  if($statement->execute()){
        
                  header("Location:myCoins.php");
                }
              else
              echo "no insert:   "   .mysqli_error($con) ;
              }}

