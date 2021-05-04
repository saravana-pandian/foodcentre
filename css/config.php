<?php
session_start();
define('SETURL', 'http://localhost/foodcentre/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'foodcentre');


//excute quere and set data in data base
$conn=mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());  //database connect
$db_select=mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

?>