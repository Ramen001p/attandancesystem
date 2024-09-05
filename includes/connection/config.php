<?php 
$conn = new mysqli("localhost","root","","common_attendancesystem");
if(!$conn){
    die("Error".$conn->error);
}
?>