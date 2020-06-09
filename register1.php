<?php
session_start();
$dbname = 'database';
$dbuser = 'root';
$dbpass = 'ParolamySQL0';
$dbhost = 'localhost';
$db = new PDO('mysql:host=localhost;dbname='.$dbname.';charset=utf8',$dbuser,$dbpass);
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);