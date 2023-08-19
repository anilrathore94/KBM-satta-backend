<?php include('../config.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $upi_payment_id = mysqli_real_escape_string($con,$_POST['upi_payment_id']);

    
    $update = mysqli_query($con,"UPDATE `admin_settings` SET `upi_payment_id`='$upi_payment_id'");
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