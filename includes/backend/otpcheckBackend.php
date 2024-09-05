<?php 
require("../connection/config.php");
require("../function/attandaceSystem.php");

 $otp=$_POST['otp'];
otpCheck($otp);
?>