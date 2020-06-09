<?php
if(isset($_POST['submit'])){
$name=$_POST['name'];
$email=$_POST['email'];
$msg=$_POST['msg'];
//$name=$_POST['name'];

$to='skydubz9@gmail.com';
$subject='Form submission';
$message="Name:".$name."\n"."Email:".$email."\n"."Wrote the following: "."\n\n".$msg;
$headers="From:".$email;
if(mail($to,$subject,$message,$headers)){
echo "<h1>Sent successfull"." ".$name.",we will contact you soon!</h1>";

}else{
    echo "error";
}

}

?>