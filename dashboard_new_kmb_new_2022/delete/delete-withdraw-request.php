<?php
include('../config.php');

$id = $_GET['id']; 

   $delete =  mysqli_query($con,"DELETE FROM `user_withdraw_request` WHERE id='".$id."'");


?>
<script>
window.location ="../withdraw-request.php";
</script>