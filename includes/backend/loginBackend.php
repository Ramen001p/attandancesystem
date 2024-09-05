<?php 
require("../connection/config.php");
require("../function/attandaceSystem.php");

 $email=$_POST['email'];
login($email);
?>