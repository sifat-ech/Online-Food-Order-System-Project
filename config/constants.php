
<?php
ob_start();


//start session
session_start();

//create constant to store non repeating value
define('SITEURL','http://localhost/FOOD_ORDER/');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','food-order');

//3.save in database
$conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error($conn));
$db_select=mysqli_select_db($conn,DB_NAME) or die(mysqli_error($conn));


?>