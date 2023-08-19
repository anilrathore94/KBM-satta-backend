<?php include('../dashboard/config.php');

$phone_number = $_REQUEST['phone_number'];
$amount = $_REQUEST['amount'];
$trans_details = $_REQUEST['trans_detail'];
$date = date('Y-m-d');
$base64Image = $_REQUEST['image'];

$image = time().'.jpg';
    $imageDir = $_SERVER['DOCUMENT_ROOT'] . "/image/";
    
    //Set image whole path here 
    $filePath = $imageDir . $image;
file_put_contents($filePath,base64_decode($base64Image));



if($trans_details == "OTHER"){
    $sql = "INSERT INTO `user_fund_request`(`username`, `points`, `amount`, `trans_details`, `receipe_image`, `date`, `status`) VALUES ('$phone_number',' ','$amount','$trans_details','$image','$date','0')";
$insert=mysqli_query($con, $sql);
$receiver = $_REQUEST['phone_number'];;
$date = date('Y-m-d');
$time = date("H:i:s");
$today = date('Y-m-d h:i:s A');
    $request_insert = mysqli_query($con,"INSERT INTO `user_auto_deposite`(`username`, `transaction_note`, `amount`, `txt_date`, `status`) VALUES ('$phone_number','$trans_details','$amount','$today','0')");
}else{
    $sql = "INSERT INTO `user_fund_request`(`username`, `points`, `amount`, `trans_details`, `receipe_image`, `date`, `status`) VALUES ('$phone_number',' ','$amount','$trans_details','$image','$date','1')";
$insert=mysqli_query($con, $sql);
$receiver = $_REQUEST['phone_number'];;
$date = date('Y-m-d');
$time = date("H:i:s");
$today = date('Y-m-d h:i:s A');
    $check_receiver = mysqli_query($con,"SELECT * FROM user_info WHERE phone='$receiver'");
    if(mysqli_num_rows($check_receiver) > 0){
        $receiver_detail = mysqli_fetch_array($check_receiver);
        
        //receiver update
        $receiver_wallet = $receiver_detail['wallet'];
        $receiver_amount = $receiver_wallet + $amount;
        $received_amount = "+".$amount;
        $receiver_remark = "Points Added By ".$trans_details;
        // $update_receiver = mysqli_query($con,"UPDATE user_info SET wallet = '$receiver_amount' WHERE phone='$receiver'");
        // $history_receiver = mysqli_query($con,"INSERT INTO `wallet_history`( `status`, `date`, `time`, `amount`, `updated_amount`, `remark`, `phone_number`) VALUES ('1','$date','$time','$received_amount','$receiver_amount','$receiver_remark','$receiver')") ;
        $request_insert = mysqli_query($con,"INSERT INTO `user_auto_deposite`(`username`, `transaction_note`, `amount`, `txt_date`, `status`) VALUES ('$phone_number','$trans_details','$received_amount','$today','1')");
        
         $check_receiver = mysqli_query($con,"SELECT * FROM user_info WHERE phone='$receiver'");
    if(mysqli_num_rows($check_receiver) > 0){
        $receiver_detail = mysqli_fetch_array($check_receiver);
        
        //receiver update
        $receiver_wallet = $receiver_detail['wallet'];
        $receiver_amount = $receiver_wallet + $amount;
        $received_amount = "+".$amount;
        $receiver_remark = "Points Added By UPI";
        $update_receiver = mysqli_query($con,"UPDATE user_info SET wallet = '$receiver_amount' WHERE phone='$receiver'");
        $history_receiver = mysqli_query($con,"INSERT INTO `wallet_history`( `status`, `date`, `time`, `amount`, `updated_amount`, `remark`, `phone_number`) VALUES ('1','$date','$time','$received_amount','$receiver_amount','$receiver_remark','$receiver')") ;
    }
        
    }
}

 





   
if($insert){
    
   $result = array(
        'success' => '1',
        'msg' => 'Points Added Successfully!!'
        );
}
else{
     $result = array(
        'success' => '0',
        'msg' => 'Some Error Occured! Try Again Later!!'
        );
     
}


echo json_encode($result);
?>