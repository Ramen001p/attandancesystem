<?php 
require("../connection/config.php");
require("../function/attandaceSystem.php");

if(isset($_POST['aparture'])){
    attandance($conn);
}
if(isset($_POST['departure'])){
    attandanceUpdate($conn);
}

?>