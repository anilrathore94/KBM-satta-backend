<?php
include('../config.php');

$id = $_POST['id']; 

$select = mysqli_fetch_array(mysqli_query($con,"SELECT status FROM user_info WHERE id='".$id."'"));

if($select['status'] == '0'){
    mysqli_query($con,"UPDATE user_info SET `status` = '1' WHERE id='".$id."'");
}else{
 mysqli_query($con,"UPDATE user_info SET `status` = '0' WHERE id='".$id."'");
}

?>