<?php
include('../config.php');

$id = $_POST['id']; 
$response = $_POST['response'];

if($response === "1"){

$select = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user_auto_deposite WHERE id='".$id."'"));

$receiver = $select['username'];
$amount = $select['amount'];
$request_date = $select['txt_date'];
$date = date('Y-m-d');
$time = date('H:i:s');

$check_receiver = mysqli_query($con,"SELECT * FROM user_info WHERE phone='$receiver'");
    if(mysqli_num_rows($check_receiver) > 0){
        $receiver_detail = mysqli_fetch_array($check_receiver);
        
        //receiver update
        $receiver_wallet = $receiver_detail['wallet'];
        $receiver_amount = $receiver_wallet + $amount;
        $received_amount = $amount;
        $receiver_remark = "Points Added By UPI Requested on ".$request_date;
        $update_receiver = mysqli_query($con,"UPDATE user_info SET wallet = '$receiver_amount' WHERE phone='$receiver'");
        $history_receiver = mysqli_query($con,"INSERT INTO `wallet_history`( `status`, `date`, `time`, `amount`, `updated_amount`, `remark`, `phone_number`) VALUES ('1','$date','$time','$received_amount','$receiver_amount','$receiver_remark','$receiver')") ;
    }
    
}
$update = mysqli_query($con,"UPDATE user_auto_deposite SET `status` = '$response' WHERE id='".$id."'");


?>