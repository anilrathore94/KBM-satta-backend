<?php include('../dashboard/config.php');

$amount = $_REQUEST['amount'];
$receiver = $_REQUEST['receiver'];
$sender = $_REQUEST['sender'];
$date = date('Y-m-d');
$time = date("H:i:s");

$limits = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM admin_settings"));

$min_limit = $limits['min_transfer'];
$max_limit = $limits['max_transfer'];

if($amount <= $max_limit && $amount >= $min_limit){

if($receiver === $sender){
    $result = array(
        'success' => '0',
        'msg' => 'You Cannot transfer fund to yourself!!'
        );
}else{
    $sender_check = mysqli_query($con,"SELECT * FROM user_info WHERE phone='$sender'");

    if(mysqli_num_rows($sender_check) > 0){
    
    $sender_detail = mysqli_fetch_array($sender_check);
    
    $transfer_status = $sender_detail['transfer_status'];
    
    if($transfer_status === "0"){
        $result = array(
            'success' => '0',
            'msg' => 'You are not allowed to transfer fund!!'
            );
    }else{
        $sender_wallet = $sender_detail['wallet'];
    
        if($amount > $sender_wallet){
            $result = array(
                'success' => '0',
                'msg' => 'Insufficient points!!'
                );
        }else{
            $check_receiver = mysqli_query($con,"SELECT * FROM user_info WHERE phone='$receiver'");
            if(mysqli_num_rows($check_receiver) > 0){
                $receiver_detail = mysqli_fetch_array($check_receiver);
                
                //sender update
                $sender_amount = $sender_wallet - $amount;
                $sent_amount = "-".$amount;
                $sender_remark = "Points Transferred to ".$receiver;
                $update_sender = mysqli_query($con,"UPDATE user_info SET wallet = '$sender_amount' WHERE phone='$sender'");
                $history_sender = mysqli_query($con,"INSERT INTO `wallet_history`( `status`, `date`, `time`, `amount`, `updated_amount`, `remark`, `phone_number`) VALUES ('1','$date','$time','$sent_amount','$sender_amount','$sender_remark','$sender')") ;
                
                //receiver update
                $receiver_wallet = $receiver_detail['wallet'];
                $receiver_amount = $receiver_wallet + $amount;
                $received_amount = "+".$amount;
                $receiver_remark = "Points Transferred from ".$sender;
                $update_receiver = mysqli_query($con,"UPDATE user_info SET wallet = '$receiver_amount' WHERE phone='$receiver'");
                $history_receiver = mysqli_query($con,"INSERT INTO `wallet_history`( `status`, `date`, `time`, `amount`, `updated_amount`, `remark`, `phone_number`) VALUES ('1','$date','$time','$received_amount','$receiver_amount','$receiver_remark','$receiver')") ;
                
                $result = array(
                'success' => '1',
                'msg' => 'Points Transferred Successfully!!'
                );
            }else{
                $result = array(
                'success' => '0',
                'msg' => 'Receiver Not Found!!'
                );
            }
        }
    }
    
    }else{
        $result = array(
            'success' => '0',
            'msg' => 'Sender Not Found!!'
            );
    }
}

}else{
    $result = array(
                'success' => '0',
                'msg' => 'Limit does not match!!'
                );
}
echo json_encode($result);
?>