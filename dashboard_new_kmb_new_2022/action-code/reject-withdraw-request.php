<?php include('../config.php');
    $id = mysqli_real_escape_string($con,$_GET['id']);
    $remark = mysqli_real_escape_string($con,$_POST['remark']);
    
    $update = mysqli_query($con,"UPDATE user_withdraw_request SET status = '-1', remark = '$remark' WHERE id='$id'");
    
    if($update){
        ?>
         <script>
             alert('Withdraw Request Rejected!');
             window.location = '../withdraw-request-management.php';
         </script>
         <?php
    }
?>