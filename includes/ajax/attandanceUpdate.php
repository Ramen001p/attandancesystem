<?php 

require('../connection/config.php');
session_start();
// $defaultTime = defaultTime();
//     foreach ($defaultTime as $dt) {
//         # code...
//         $dtDepart = $dt['defaultDepart'];
//     }
 $date = date("Y-m-d");
 $empID = $_SESSION['dbemailId'];
 date_default_timezone_set("Asia/Calcutta");  
  $currentTime = date('H:i:s');
//   if ($currentTime <= $dtDepart) {
//     $status = "OnTime";
// } else {
//     $status = "Overtime";
// }

 $query = $conn->prepare("UPDATE `attandance` SET `departTime`= ? WHERE `relatedEmpId`= ? AND `date` = ?");
 $query->bind_param('sis',$currentTime,$empID,$date);
 if($query->execute()){
    echo "Data Update Successfully";
} else {
    echo "failed";
} 

?>