<?php include('../dashboard/config.php');

$user_name = $_REQUEST['user_name'];
$user_phone = $_REQUEST['user_phone'];
$user_password = $_REQUEST['user_password'];
$user_mpin = $_REQUEST['user_mpin'];
$user_email = $_REQUEST['user_email'];
$token_id = $_REQUEST['token_id'];
$date = date('Y-m-d');
$time = date('h:i:sa');
$today = date('Y-m-d h:i:sa');

$check = mysqli_query($con,"SELECT * FROM user_info WHERE phone = '$user_phone'");
if(mysqli_num_rows($check)>0){
    $result = array(
        'success' => '0',
        'msg' => 'You are Already Signed Up!!'
        );
     
}else{
    $select_activation = mysqli_fetch_array(mysqli_query($con,"SELECT status from activate_rule"));
    if($select_activation['status'] === "1"){
        $status = '1';
    }else{
        $status = '0';
    }
    $limits = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM admin_settings"));

    $bonus = $limits['Dragon_bonus'];
    $sql = "INSERT INTO user_info (name, phone, password,m_pin,email,wallet,date,status,transfer_status) VALUE('$user_name', '$user_phone', '$user_password','$user_mpin','$user_email','$bonus','$today','$status','0')";
$insert=mysqli_query($con, $sql);
if($insert){
    if($bonus === "0"){
        
    }else{
        $wallet_entry = mysqli_query($con,"INSERT INTO `wallet_history`(`status`, `date`, `time`, `amount`, `updated_amount`, `remark`, `phone_number`) VALUES ('1','$date','$time','$bonus','$bonus','Welcome Bonus','$user_phone')");
    }
    
    $check_token = mysqli_query($con,"SELECT * FROM device_token WHERE mobile = '$user_phone'");
    if(mysqli_num_rows($check_token)>0){
        $update = mysqli_query($con,"UPDATE device_token SET token_id = '$token_id' WHERE mobile = '$user_phone'");
    }else{
        $insert_token = mysqli_query($con,"INSERT INTO device_token (mobile,token_id,status) VALUES ('$user_phone','$token_id','1')");
    }
   $result = array(
        'success' => '1',
        'msg' => 'Registered Successfully'
        );
}
else{
     $result = array(
        'success' => '0',
        'msg' => 'Some Error Occured! Try Again Later!!'
        );
     
}
}

echo json_encode($result);
?>