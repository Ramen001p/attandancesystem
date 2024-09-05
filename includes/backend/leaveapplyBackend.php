<?php 

require("../connection/config.php");
require("../function/attandaceSystem.php");

 $leaverange =$_POST['leaverange'];
 $reason =$_POST['reason'];
 list($start_date, $end_date) = explode(' - ', $leaverange);
$newstart_date = date("Y-m-d", strtotime($start_date));
$newend_date = date("Y-m-d", strtotime($end_date));

 leaveApply($newstart_date,$newend_date,$reason);
?>