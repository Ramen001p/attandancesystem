<?php 
session_start(); 
include("../../connection/config.php");
global $conn;


function displayEmployee($Employeeid){
    global $conn;
    $query = $conn->prepare("SELECT * FROM `Employee_list` WHERE `empID`= ?");
    $query->bind_param('i',$Employeeid);
    $query->execute();
    $result = $query->get_result();
    
    return $result->fetch_all(MYSQLI_ASSOC);
}
function EmployeedisplaySkill($Employeeid){
    global $conn;
    $query = $conn->prepare("SELECT `selected_skill`.`relatedSkill_Id`,`skills`.`skills_name` FROM `selected_skill` LEFT JOIN `skills` ON `selected_skill`.`relatedSkill_Id`=`skills`.`skill_id` WHERE   `selected_skill`.`relatedEmpId`= ?");
    $query->bind_param('i',$Employeeid);
    if($query->execute()){
        $result=$query->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }else{
        die($conn->error);
    }
}
function employeeCountAttandance($Employeeid){
    global $conn;
    $month = date('m');
    $query = $conn->prepare("SELECT  `arivalTime`, `departTime`, `date`, `status` FROM `attandance` WHERE `relatedEmpId`= ? AND MONTH(date)=?");
    $query->bind_param('ii',$Employeeid,$month);
    if($query->execute()){
        $result=$query->get_result();
        return $result->num_rows;
    }else{
        die($conn->error);
    }
}
function totalCurrentDay(){
    $currentYear= date('Y');
    $currentmonth= date('m');
     $currentDay= date('d');
    $totalDay=cal_days_in_month(CAL_GREGORIAN,$currentmonth,$currentYear);
   $exclude_days = array('Saturday','Sunday');
   $totalCount=0;
   for($i=1;$i<=$currentDay;$i++){
       $date = strtotime("$currentYear-$currentmonth-$i");
       $dayofWeek = date('l',$date);
       if(!in_array($dayofWeek,$exclude_days)){
           $totalCount++;
       }
   }
   return $totalCount;
}
function defaultTime(){
    global $conn;
    $query = $conn->prepare("SELECT * FROM `defaultTimeTable`");
    if($query->execute()){
        $result=$query->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }else{
        die($conn->error);
    }
}
function displayEmployeeAttandance($Employeeid){
    global $conn;
    $month = date('m');
    $query = $conn->prepare("SELECT  `arivalTime`, `departTime`, `date`, `status` FROM `attandance` WHERE `relatedEmpId`= ? AND MONTH(date)=?");
    $query->bind_param('ii',$Employeeid,$month);
    if($query->execute()){
        $result=$query->get_result();
        $count = $result->num_rows;
        return $result->fetch_all(MYSQLI_ASSOC);
    }else{
        die($conn->error);
    }
}


?>