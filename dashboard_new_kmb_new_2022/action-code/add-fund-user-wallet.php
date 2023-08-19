<?php include('../config.php');

$amount = $_REQUEST['amount'];
$receiver = $_REQUEST['user'];
$date = date('Y-m-d');
$time = date("H:i:s");


    $check_receiver = mysqli_query($con,"SELECT * FROM user_info WHERE phone='$receiver'");
    if(mysqli_num_rows($check_receiver) > 0){
        $receiver_detail = mysqli_fetch_array($check_receiver);
        
        //receiver update
        $receiver_wallet = $receiver_detail['wallet'];
        $receiver_amount = $receiver_wallet + $amount;
        $received_amount = "+".$amount;
        $receiver_remark = "Points Added By Admin ";
        $update_receiver = mysqli_query($con,"UPDATE user_info SET wallet = '$receiver_amount' WHERE phone='$receiver'");
        $history_receiver = mysqli_query($con,"INSERT INTO `wallet_history`( `status`, `date`, `time`, `amount`, `updated_amount`, `remark`, `phone_number`) VALUES ('1','$date','$time','$received_amount','$receiver_amount','$receiver_remark','$receiver')") ;
        
    }

?>
<script>
    alert("Points Added Successfully!!");
    window.location = "../add-fund-user-wallet.php";
</script>