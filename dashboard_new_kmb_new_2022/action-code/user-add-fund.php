<?php include('../config.php');

$amount = $_REQUEST['user_amount'];
$receiver = $_REQUEST['user_id'];
$date = date('Y-m-d');
$time = date("H:i:s");


    $check_receiver = mysqli_query($con,"SELECT * FROM user_info WHERE id='$receiver'");
    if(mysqli_num_rows($check_receiver) > 0){
        $receiver_detail = mysqli_fetch_array($check_receiver);
        
        //receiver update
        $mobile = $receiver_detail['phone'];
        $receiver_wallet = $receiver_detail['wallet'];
        $receiver_amount = $receiver_wallet + $amount;
        $received_amount = "+".$amount;
        $receiver_remark = "Points Added By Admin ";
        $update_receiver = mysqli_query($con,"UPDATE user_info SET wallet = '$receiver_amount' WHERE id='$receiver'");
        $history_receiver = mysqli_query($con,"INSERT INTO `wallet_history`( `status`, `date`, `time`, `amount`, `updated_amount`, `remark`, `phone_number`) VALUES ('1','$date','$time','$received_amount','$receiver_amount','$receiver_remark','$mobile')") ;
        
    }

?>
<script>
    alert("Funds Added Successfully!!");
    window.location = "../view-user.php?id=<?php echo $receiver;?>";
</script>