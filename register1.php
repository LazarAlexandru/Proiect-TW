<?php
session_start();
$dbname = 'numax';
$dbuser = 'root';
$dbpass = '';
$dbhost = 'localhost';
$db = new PDO('mysql:host=localhost;dbname='.$dbname.';charset=utf8',$dbuser,$dbpass);
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);