<?php 
require('../connection/config.php');
require('../function/attandaceSystem.php');


$defaultTime = defaultTime();
    foreach ($defaultTime as $dt) {
        # code...
        $dtArrive = $dt['defaultArrival'];
    }
    // $empID = $_POST['EmpID'];
    $empID = $_SESSION['dbemailId'];
    date_default_timezone_set("Asia/Calcutta");  
    $currentTime = date('H:i:s'); 
    // date('h:i A', strtotime($currentTime));
    if ($currentTime <= $dtArrive) {
        $status = "OnTime";
    } else {
        $status = "Late";
    }

    $date = date("Y-m-d");
    $sql = $conn->prepare("INSERT INTO `attandance`( `relatedEmpId`, `arivalTime`, `date`, `status`) VALUES (?, ?, ?, ?)");
    $sql->bind_param('isss', $empID, $currentTime, $date, $status); 
    if($sql->execute()){
        echo "data inserted";
    } else {
        echo "failed";
    } 

?>
