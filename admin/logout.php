<?php
include('../config/constants.php');
//destroy session

session_destroy();

//redirect to login

header('location:'.SITEURL.'admin/login.php');


?>