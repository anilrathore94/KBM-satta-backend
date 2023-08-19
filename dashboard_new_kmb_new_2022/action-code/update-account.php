<?php include('../config.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $ac_name = mysqli_real_escape_string($con,$_POST['ac_name']);
    $ac_number = mysqli_real_escape_string($con,$_POST['ac_number']);
    $ifsc_code = mysqli_real_escape_string($con,$_POST['ifsc_code']);

    
    $update = mysqli_query($con,"UPDATE `admin_settings` SET `ac_name`='$ac_name',`ac_number`='$ac_number',`ifsc_code`='$ifsc_code'");
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