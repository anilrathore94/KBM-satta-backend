<?php
include('../config.php');

$id = $_GET['id']; 
$select = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM starline_result_chart WHERE id = '$id'"));
$game_name = $select['game_name'];
$open_pana = $select['open_panna'];
$open_digit = $select['open_digit'];
$date = $select['date'];
$select_win = mysqli_query($con,"SELECT * FROM starline_winning_report WHERE game_name='".$game_name."' AND date='".$date."' AND (pana ='$open_pana' OR digit='$open_digit')");

while($sel = mysqli_fetch_array($select_win)){
$username = $sel['username'];
$amount = $sel['winning_points'];
$receiver = $username;
    $time = date("H:i:s");


    $check_receiver = mysqli_query($con,"SELECT * FROM user_info WHERE phone='$username'");
    if(mysqli_num_rows($check_receiver) > 0){
        $receiver_detail = mysqli_fetch_array($check_receiver);
        
        //receiver update
        $receiver_wallet = $receiver_detail['wallet'];
        $receiver_amount = $receiver_wallet - $amount;
        $received_amount = "-".$amount;
        $receiver_remark = "Points Deducted By Admin due to starline result change";
        $update_receiver = mysqli_query($con,"UPDATE user_info SET wallet = '$receiver_amount' WHERE phone='$receiver'");
       // $history_receiver = mysqli_query($con,"INSERT INTO `wallet_history`( `status`, `date`, `time`, `amount`, `updated_amount`, `remark`, `phone_number`) VALUES ('1','$date','$time','$received_amount','$receiver_amount','$receiver_remark','$receiver')") ;
        
        $delete_wallet = mysqli_query($con,"DELETE FROM wallet_history WHERE date = '$date' AND amount = '$amount' AND phone_number = '$receiver'");
        
    }


   $delete_win =  mysqli_query($con,"DELETE FROM starline_winning_report WHERE game_name='".$game_name."' AND date='".$date."' AND (pana ='$open_pana' OR digit='$open_digit')");
}
       $delete = mysqli_query($con,"DELETE FROM starline_result_chart WHERE id='".$id."'");
   


?>
<script>
window.location ="../starline-decleare-result.php";
</script>