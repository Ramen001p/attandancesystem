<?php 
require('includes/connection/config.php');

if(isset($_GET['q'])){
    $search = $_GET['q'];

$store_skill = array();
$sql = "SELECT `skill_id`, `skills_name` FROM `skills` WHERE `skills_name` LIKE '%$search%' ";
$result = $conn->query($sql) or die($conn->error);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // echo "<pre>";
        // print_r($row);
        // echo "</pre>";
        $store_skill[] = array(
                "id" => $row['skill_id'],
                "name" => $row['skills_name']
            );
    }

}
echo json_encode($store_skill);
}else{
}
   
	
    