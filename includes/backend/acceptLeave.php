<?php 
require("../connection/config.php");
require("../function/attandaceSystem.php");
if(isset($_GET['leave'])){
    $leaveID = $_GET['leave'];
    $status="Accept";
    leaveApproved($status,$leaveID);
    header('location:')

}
?>