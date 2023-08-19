<?php
include('../config.php');

$id = $_GET['id']; 


mysqli_query($con,"DELETE FROM notice WHERE id='".$id."'");
mysqli_close($con);
header("Location: ../notice-management.php");
?>