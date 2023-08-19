<?php include('../config.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = mysqli_real_escape_string($con,$_POST['user_id']);
    $security_pin = mysqli_real_escape_string($con,$_POST['security_pin']);

    
    $update = mysqli_query($con,"UPDATE `user_info` SET `m_pin`='$security_pin' WHERE id='$id'");
    if($update){
        ?>
        <script>alert('Security Pin Updated Successfully!!');
        window.location = '../view-user.php?id=<?php echo $id?>';</script>
        <?php
    }else{
        ?>
        <script>alert('Some Error Occured! Try Again Later!!');
        window.location = '../view-user.php?id=<?php echo $id?>';</script>
        <?php
    }
}
?>