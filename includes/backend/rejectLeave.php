<?php 
require("../connection/config.php");
require("../function/attandaceSystem.php");
if(isset($_GET['leave'])){
    $leaveID = $_GET['leave'];
    $status="Reject";
    leaveApproved($status,$leaveID);

}
?>