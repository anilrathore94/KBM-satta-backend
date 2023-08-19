<?php include('../dashboard/config.php');

$pnumber = $_REQUEST['phone_number'];

$check = mysqli_query($con,"SELECT * FROM user_info WHERE phone = '$pnumber'");

if(mysqli_num_rows($check) > 0){
    //otp generate
    $otp = mt_rand(1000, 9999);
   $result = array(
        'success' => '1',
        'otp' => $otp,
        'msg' => "otp sent!"
        );

}else{
    $result = array(
        'success' => '0',
        'msg' => 'User Not Found!'
        );
}


echo json_encode($result);
?>