<?php
include('../config.php');

$id = $_POST['id']; 

$select = mysqli_fetch_array(mysqli_query($con,"SELECT transfer_status FROM user_info WHERE id='".$id."'"));

if($select['transfer_status'] == '0'){
    mysqli_query($con,"UPDATE user_info SET `transfer_status` = '1' WHERE id='".$id."'");
mysqli_close($con);
}else{
 mysqli_query($con,"UPDATE user_info SET `transfer_status` = '0' WHERE id='".$id."'");
mysqli_close($con);   
}
?>