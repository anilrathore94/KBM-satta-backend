<?php
include('../config.php');

$id = $_POST['id']; 

$select = mysqli_fetch_array(mysqli_query($con,"SELECT betting_status FROM user_info WHERE id='".$id."'"));

if($select['betting_status'] == '1'){
    mysqli_query($con,"UPDATE user_info SET `betting_status` = '0' WHERE id='".$id."'");
mysqli_close($con);
}else{
 mysqli_query($con,"UPDATE user_info SET `betting_status` = '1' WHERE id='".$id."'");
mysqli_close($con);   
}
?>