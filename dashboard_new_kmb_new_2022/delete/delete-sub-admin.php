<?php
include('../config.php');

$id = $_GET['id']; 


mysqli_query($con,"DELETE FROM sub_admin WHERE id='".$id."'");
mysqli_close($con);
header("Location: ../sub-admin-management.php");
?>