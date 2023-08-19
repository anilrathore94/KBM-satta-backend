<?php
include('../config.php');

$id = $_GET['id']; 


mysqli_query($con,"DELETE FROM slider_images WHERE id='".$id."'");
mysqli_close($con);
header("Location: ../slider-images-management.php");
?>