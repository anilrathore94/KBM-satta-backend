<?php include('../dashboard/config.php');

$new_password = $_REQUEST['new_password'];
$pnumber = $_REQUEST['phone_number'];


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

echo json_encode($result);
?>