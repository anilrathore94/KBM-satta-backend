<?php
include('../config.php');

$id = $_GET['id']; 

$select = mysqli_fetch_array(mysqli_query($con,"SELECT status FROM user_fund_request WHERE id='".$id."'"));

if($select['status'] == '0'){
    mysqli_query($con,"UPDATE user_fund_request SET `status` = '1' WHERE id='".$id."'");
mysqli_close($con);
}else{
 mysqli_query($con,"UPDATE user_fund_request SET `status` = '0' WHERE id='".$id."'");
mysqli_close($con);   
}

?>
<script>
window.location ="../fund-request-management.php";
</script>