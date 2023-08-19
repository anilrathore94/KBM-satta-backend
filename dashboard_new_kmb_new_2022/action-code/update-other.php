<?php include('../config.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $alert_message = mysqli_real_escape_string($con,$_POST['alert_message']);
    $market_open_time = mysqli_real_escape_string($con,$_POST['market_open_time']);

    
    $update = mysqli_query($con,"UPDATE `admin_settings` SET `alert_message`='$alert_message', `market_open_time`='$market_open_time'");
    if($update){
        ?>
        <script>alert('Details Updated Successfully!!');
        window.location = '../main-settings.php';</script>
        <?php
    }else{
        echo mysqli_error($con);
        ?>
        <script>alert('Some Error Occured! Try Again Later!!');
        window.location = '../main-settings.php';</script>
        <?php
    }
}
?>