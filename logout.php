<?php 
session_start();
session_unset();
session_destroy();
header('location:pages-sign-in.php');
$_SESSION['error'] = "<div class='text-center border' style='padding: 20px;margin: 10px 0;background:#14A44D; color:white; font-size:16px;'>Logout successfully</div>";
?>