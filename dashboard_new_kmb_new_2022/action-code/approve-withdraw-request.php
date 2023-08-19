<?php include('../config.php');
     $id = mysqli_real_escape_string($con,$_GET['id']);
     $remark = mysqli_real_escape_string($con,$_POST['remark']);
     $date = date('Y-m-d');
     $time = date("h:i:sa");
     
     $select_request = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `user_withdraw_request` WHERE `id` = '$id'"));
     
     $phone_number = $select_request['username'];
     
     $amount = $select_request['points'];
     
     $select_user = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `user_info` WHERE `phone` = '$phone_number'"));
     
     $wallet = $select_user['wallet'];
     
     $updated_amount = $wallet - $amount;
     
     
     
     if($updated_amount >= 0){
     
     if(!$_FILES['file']['name']){
         
         $receipt = "";
     }else{
         
         $loc = $_SERVER['DOCUMENT_ROOT']."game-admin/uploads/image/receipt/";
         $ext = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
         $receipt = time()."-receipt.".$ext;
         move_uploaded_file($_FILES['file']['tmp_name'],$loc.$receipt);
     }
     
     $wallet_remark = $amount . "₹ Transferred to your Account!";
     
     $am = "-".$amount;
     
     $deduct_amount = mysqli_query($con,"UPDATE `user_info` SET `wallet`='$updated_amount' WHERE `phone` = '$phone_number'");
     
     $transaction = mysqli_query($con,"INSERT INTO `wallet_history`(`status`, `date`, `time`, `amount`, `updated_amount`, `remark`, `phone_number`) VALUES ('1','$date','$time','$am','$updated_amount','$wallet_remark','$phone_number')");
     
     $update_status = mysqli_query($con,"UPDATE `user_withdraw_request` SET `receipe_image`='$receipt',`remark`='$remark',`status`='1' WHERE id = '$id'");
     
     if($update_status){
         ?>
         <script>
             alert('Withdraw Request Accepted Successfully!');
             window.location = '../withdraw-request-management.php';
         </script>
         <?php
     }
     }else{
          ?>
         <script>
             alert('Insufficient Fund in Wallet!');
             window.location = '../withdraw-request-management.php';
         </script>
         <?php
     }
 
?>