<?php include('../dashboard/config.php');

$old_password = $_REQUEST['old_password'];
$new_password = $_REQUEST['new_password'];
$pnumber = $_REQUEST['phone_number'];

$check = mysqli_query($con,"SELECT * FROM user_info WHERE phone = '$pnumber' AND password = '$old_password'");

if(mysqli_num_rows($check) > 0){
    $insert = mysqli_query($con,"UPDATE  user_info SET password = '$new_password' WHERE phone = '$pnumber'");

if($insert){
   $result = array(
        'success' => '1',
        'msg' => 'Password Updated Successfully'
        );
}
else{
     $result = array(
        'success' => '0',
        'msg' => 'Some Error Occured! Try Again Later'
        );
     
}
}else{
    $result = array(
        'success' => '0',
        'msg' => 'Old Password does not match!'
        );
}


echo json_encode($result);
?>