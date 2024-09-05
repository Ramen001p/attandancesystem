<?php
session_start(); 
 include("../connection/config.php");
 global $conn;

 function insertIntoEmployeelist($name, $designation, $phone, $email, $address, $gender, $bloodgroup, $department, $img, $dob, $doj, $start_date, $end_date, $arr_skill, $maritalstatus) {
    global $conn;

    $rows = loginCount($email);

    if ($rows == 1) {
        $_SESSION['error'] = "<div class='text-center' style='margin: 10px 0; color:#54B4D3; font-size:16px;'>You are already a member. Please login now.</div>";
        header('location:../../pages-sign-in.php');
        exit; 
    } else {
        $stmt = $conn->prepare("INSERT INTO `Employee_list`(`empName`, `empDesignation`, `empPhone`, `empEmail`, `empAddress`, `empGender`, `empBloodgroup`, `empDepartment`, `empImg`, `empDateOfBirth`, `empDateOfJoin`, `internshipStart`, `internshipEnd`, `maritalstatus`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        
        if ($stmt === false) {
            die("Error in preparing statement: " . $conn->error);
        }

        $stmt->bind_param('ssssssssssssss', $name, $designation, $phone, $email, $address, $gender, $bloodgroup, $department, $img, $dob, $doj, $start_date, $end_date, $maritalstatus);

        if ($stmt->execute() === false) {
            die("Error in executing statement: " . $stmt->error);
        }

        $last_id = $conn->insert_id;

        foreach ($arr_skill as $skill_id) {
            $stmt = $conn->prepare("INSERT INTO `selected_skill`(`relatedEmpId`, `relatedSkill_Id`) VALUES (?,?)");
            if ($stmt === false) {
                die("Error in preparing statement: " . $conn->error);
            }
            $stmt->bind_param('ii', $last_id, $skill_id);
            if ($stmt->execute() === false) {
                die("Error in executing statement: " . $stmt->error);
            }
        }

        $_SESSION['error'] = "<div class='text-center' style='margin: 10px 0;color:#5cb85c; font-size:16px;'>You are a member now. Please login.</div>";
        header('location:../../pages-sign-in.php');
    }
}



function displayEmp(){
    global $conn;
     $empID=$_SESSION['dbemailId'];
    $query = $conn->prepare("SELECT * FROM `Employee_list` WHERE `empID`= ?");
    $query->bind_param('i',$empID);
    $query->execute();
    $result = $query->get_result();
    
    return $result->fetch_all(MYSQLI_ASSOC);
}

function login($email){
    global $conn;
    $rows = loginCheck($email);
    foreach ($rows as $rows) {
        # code...
        $dbemail = $rows['empEmail'];
        $empId = $rows['empID'];
        $admin = $rows['admin'];
        $_SESSION['empName'] = $rows['empName'];
        $_SESSION['dbemailId'] = $empId;
        $_SESSION['email'] = $dbemail;
        $_SESSION['admin'] = $admin;
        
        
    }
    if($email == $dbemail){
        otpStore();
        // header("location: ../../otp-confirmation.php?id=$empId && email=$dbemail && ad=$admin");
        // $_SESSION['error'] = "<div class='text-center' style='margin: 10px 0;color:#14A44D; font-size:16px;'>A OTP has been sent to $dbemail  </div>";
       
    }else{
        $_SESSION['error']="
        <div class=' text-center' style='margin: 10px 0; color:#DC4C64; font-size:16px;' >
        You are not registered yet please Register  </div>";
        header('location:../../pages-sign-in.php');
    }
}

function loginCheck($email){
    global $conn;
    $query = $conn->prepare("SELECT * FROM `Employee_list` WHERE `empEmail`= ?");
    $query->bind_param('s',$email);
    $query->execute();
    $result = $query->get_result();
    
    return $result->fetch_all(MYSQLI_ASSOC);
}
function loginCount($email){
    global $conn;
    $query = $conn->prepare("SELECT * FROM `Employee_list` WHERE `empEmail`= ?");
    $query->bind_param('s',$email);
    $query->execute();
    $result = $query->get_result();
    
    return $result->num_rows;
}
function otpStore(){
    global $conn;
    $empId=$_SESSION['dbemailId'];
    $dbemail=$_SESSION['email'];
    $admin=$_SESSION['admin'];
    echo $otp = rand(100000, 999999);
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $sql = $conn->prepare("INSERT INTO `otpGenerator`(`relatedEmpId`, `otpcode`, `loginIpaddress`) VALUES (?, ?, ?)");
    $sql->bind_param('iis', $empId, $otp, $ip_address); 
    if($sql->execute()){
        otpUpdate();
        header("location: ../../otp-confirmation.php?id=$empId && email=$dbemail && ad=$admin");
        $_SESSION['error'] = "<div class='text-center' style='margin: 10px 0;color:#14A44D; font-size:16px;'>A OTP has been sent to $dbemail  </div>";
    }else{
        die($conn->error);
    }
       
   
}

function otpCheck($otp){
    global $conn;
     
  $empID = $_SESSION['dbemailId'];
 $query = $conn->prepare("SELECT * FROM `otpGenerator` WHERE `relatedEmpId`= ? AND `otpcode`=? ORDER BY `otpID` DESC");
    $query->bind_param('ii',$empID,$otp);
    $query->execute();
    $result=$query->get_result();
   $count = $result->num_rows;
   while($row = $result->fetch_assoc()){
         $status = $row['status'];
   }
   if($count==1){
    
        if($status == 'Active'){
            
                // $_SESSION['error']="<div class=' text-center border ' style='padding: 20px;margin: 10px 0;background:#54B4D3; color:white; font-size:16px;' >
            //          Login Successfull </div>";
            $status = "used";
            $stmt=$conn->prepare("UPDATE `otpGenerator` SET `status`= ? WHERE `relatedEmpId`= ? AND `otpcode`=?;");
            $stmt->bind_param('sii',$status,$empID,$otp);
            if($stmt->execute()==true){
                    if($_SESSION['admin'] == 'true'){
                        header('location:../../admin_dashboard.php');
                    }else{
                        header('location:../../home.php');
                    }
                
            }else{
                die($conn->error);
            }
        }else{
            $_SESSION['error']="<div class=' text-center  ' style='margin: 10px 0;color:#DC4C64; font-size:16px;' >
            Invalid OTP, Please check your OTP </div>";
            header('location: ../../otp-confirmation.php');
        }
    
   }else{
    $_SESSION['error']="<div class=' text-center  ' style='margin: 10px 0;color:#DC4C64; font-size:16px;' >
           Invalid OTP, Please check your OTP $empId </div>";
           header('location: ../../otp-confirmation.php');
   }
}

function otpUpdate(){
    global $conn;
    $tenMinutesAgo = date('Y-m-d H:i:s', strtotime('-10 minutes'));
    
    $status = "expired";
    $stmt = $conn->prepare("UPDATE `otpGenerator` SET `status` = ? WHERE `status`='active' AND `loginTime` <= ?");
    $stmt->bind_param('ss', $status, $tenMinutesAgo);
    $stmt->execute();
}
function skillDisplay($conn){
    $query = $conn->prepare("SELECT * FROM skills");
    $query->execute();
    $result = $query->get_result();
    
    return $result->fetch_all(MYSQLI_ASSOC);
}


function attandanceCheck($conn){
    $empID = $_SESSION['dbemailId'];
    $date = date("Y-m-d");
    $query = $conn->prepare("SELECT * FROM `attandance` WHERE `relatedEmpId`= ? AND `date` = ?");
    $query->bind_param('is',$empID,$date);
    if($query->execute()){
        $result=$query->get_result();
        return $result->num_rows; 
    }else{
        die($conn->error);
    }

    
}

function displaySkill(){
    global $conn;
    $empID = $_SESSION['dbemailId'];
    $query = $conn->prepare("SELECT `selected_skill`.`relatedSkill_Id`,`skills`.`skills_name` FROM `selected_skill` LEFT JOIN `skills` ON `selected_skill`.`relatedSkill_Id`=`skills`.`skill_id` WHERE   `selected_skill`.`relatedEmpId`= ?");
    $query->bind_param('i',$empID);
    if($query->execute()){
        $result=$query->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }else{
        die($conn->error);
    }
}
function displayAttandance(){
    global $conn;
    $empID = $_SESSION['dbemailId'];
    $month = date('m');
    $query = $conn->prepare("SELECT  `arivalTime`, `departTime`, `date`, `status` FROM `attandance` WHERE `relatedEmpId`= ? AND MONTH(date)=?");
    $query->bind_param('ii',$empID,$month);
    if($query->execute()){
        $result=$query->get_result();
        $count = $result->num_rows;
        return $result->fetch_all(MYSQLI_ASSOC);
    }else{
        die($conn->error);
    }
}
function countAttandance(){
    global $conn;
    $empID = $_SESSION['dbemailId'];
    $month = date('m');
    $query = $conn->prepare("SELECT  `arivalTime`, `departTime`, `date`, `status` FROM `attandance` WHERE `relatedEmpId`= ? AND MONTH(date)=?");
    $query->bind_param('ii',$empID,$month);
    if($query->execute()){
        $result=$query->get_result();
        return $result->num_rows;
    }else{
        die($conn->error);
    }
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

function leaveApply($newstart_date,$newend_date,$reason){
    global $conn;
    $empID = $_SESSION['dbemailId'];

    $sql = $conn->prepare("INSERT INTO `leaveRequest`(`relatedEmpId`, `leavestartDate`, `leaveendDate`, `reason`) VALUES (?,?,?,?)");
    $sql->bind_param('isss', $empID, $newstart_date, $newend_date,$reason); 
    if($sql->execute()){
        ?>
            <script>alert('Leave Request Sent Successfully')</script>
        <?php
        header('location:../../home.php');
        
    }else{
        die($conn->error);
    }
    
}

function employeeCount(){
    global $conn;
    $query = $conn->prepare("SELECT * FROM `Employee_list`");
    $query->execute();
    $result = $query->get_result();
    return $result->num_rows;
}
function leaveApproved($status,$leaveID){
    global $conn;
    $stmt = $conn->prepare("UPDATE `leaveRequest` SET `leaveStatus`=? WHERE `leaveID`=?");
    $stmt->bind_param('si', $status, $leaveID);
    if($stmt->execute()==true){
        header('location: ../../adminLeaverequest.php');
    }else{
        die($conn->error);
    }
}
function countLeaves(){
    global $conn;
    $query = $conn->prepare("SELECT * FROM `leaveRequest` WHERE leaveStatus = 'pending'");
    $query->execute();
    $result = $query->get_result();
    return $result->num_rows;
}


?> 
