<?php include('../config.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $app_link = mysqli_real_escape_string($con,$_POST['app_link']);
    $content = mysqli_real_escape_string($con,$_POST['content']);
    
    $update = mysqli_query($con,"UPDATE `admin_settings` SET `app_link`='$app_link',`content`='$content'");
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