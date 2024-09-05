<?php
require("../connection/config.php");
require("../function/attandaceSystem.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['fname']);
    $designation = trim($_POST['designation']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $address = trim($_POST['address']);
    $gender = trim($_POST['gender']);
    $bloodgroup = trim($_POST['blood']);
    $department = trim($_POST['department']);
    $newdob = trim($_POST['dob']);
    $newdoj = trim($_POST['joining_date']);
    $maritalstatus = trim($_POST['status']);
    $internship = trim($_POST['daterange']);
    $skill = htmlspecialchars($_POST['skill']);
    $img = $_FILES['image']['name'];
    $arr_skill= explode(",",$skill);
    list($newstart_date, $newend_date) = explode(' - ', $internship);
    $start_date = date("Y-m-d", strtotime($newstart_date));
    $end_date = date("Y-m-d", strtotime($newend_date));
    $dob = date("Y-m-d", strtotime($newdob));
    $doj = date("Y-m-d", strtotime($newdoj));
    insertIntoEmployeeList($name,$designation,$phone,$email,$address,$gender,$bloodgroup,$department,$img,$dob,$doj,$start_date,$end_date,$arr_skill,$maritalstatus);

//     insertIntoEmployeeList($name,$designation,$phone,$email,$address,$gender,$bloodgroup,$department,$img,$dob,$doj,$start_date,$end_date,$arr_skill,$maritalstatus);
// if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
//         $img = $_FILES['image']['name'];
//         $targetDirectory = "../../assets/img/employeeImg/";
//         $targetFile = $targetDirectory . basename($img);
        
//         if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
//             insertIntoEmployeeList($name,$designation,$phone,$email,$address,$gender,$bloodgroup,$department,$img,$dob,$doj,$start_date,$end_date,$arr_skill,$maritalstatus);
            
//         } else {
//             die("Error: There was a problem uploading your image.");
//         }
//     } else {
//         die("Error: No file uploaded or an invalid file was uploaded.");
//     }
// } else {
//     die("Error: Invalid request.");
}

?>
