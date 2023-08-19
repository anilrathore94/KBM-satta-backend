<?php include('../config.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $min_deposite = mysqli_real_escape_string($con,$_POST['min_deposite']);
    $max_deposite = mysqli_real_escape_string($con,$_POST['max_deposite']);
    $min_withdrawal = mysqli_real_escape_string($con,$_POST['min_withdrawal']);
    $max_withdrawal = mysqli_real_escape_string($con,$_POST['max_withdrawal']);
    $min_transfer = mysqli_real_escape_string($con,$_POST['min_transfer']);
    $max_transfer = mysqli_real_escape_string($con,$_POST['max_transfer']);
    $min_bid_amt = mysqli_real_escape_string($con,$_POST['min_bid_amt']);
    $max_bid_amt = mysqli_real_escape_string($con,$_POST['max_bid_amt']);
    $Dragon_bonus = mysqli_real_escape_string($con,$_POST['Dragon_bonus']);
    $withdraw_open_time = mysqli_real_escape_string($con,$_POST['withdraw_open_time']);
    $withdraw_close_time = mysqli_real_escape_string($con,$_POST['withdraw_close_time']);
    
    $update = mysqli_query($con,"UPDATE `admin_settings` SET `min_deposite`='$min_deposite',`max_deposite`='$max_deposite',`min_withdrawal`='$min_withdrawal',`max_withdrawal`='$max_withdrawal',`min_transfer`='$min_transfer',`max_transfer`='$max_transfer',`min_bid_amt`='$min_bid_amt',`max_bid_amt`='$max_bid_amt',`Dragon_bonus`='$Dragon_bonus',`withdraw_open_time`='$withdraw_open_time',`withdraw_close_time`='$withdraw_close_time'");
    if($update){
        ?>
        <script>alert('Details Updated Successfully!!');
        window.location = '../main-settings.php';</script>
        <?php
    }else{
        ?>
        <script>alert('Some Error Occured! Try Again Later!!');
        window.location = '../main-settings.php';</script>
        <?php
    }
}
?>