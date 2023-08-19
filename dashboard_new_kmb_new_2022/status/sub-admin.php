<?php
include('../config.php');

$id = $_GET['id']; 

$select = mysqli_fetch_array(mysqli_query($con,"SELECT status FROM sub_admin WHERE id='".$id."'"));

if($select['status'] == '0'){
    mysqli_query($con,"UPDATE sub_admin SET `status` = '1' WHERE id='".$id."'");
}else{
 mysqli_query($con,"UPDATE sub_admin SET `status` = '0' WHERE id='".$id."'");
}

?>
<script>
window.location ="../sub-admin-management.php";
</script>