<?php include('../config.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $user_name = mysqli_real_escape_string($con,$_POST['user_name']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $date = date('Y-m-d h:i:s a');
    
    $insert = mysqli_query($con,"INSERT INTO `sub_admin`(`name`, `email`, `user_name`, `password`, `wallet`, `status`,`date`) VALUES ('$name','$email','$user_name','$password','0','1','$date')");
    if($insert){
        ?>
        <script>alert('Sub Admin Added Successfully!!');
        window.location = '../sub-admin-management.php';</script>
        <?php
    }else{
        ?>
        <script>alert('Some Error Occured! Try Again Later!!');
        window.location = '../sub-admin-management.php';</script>
        <?php
    }
}
?>