<?php
include('../config.php');

$id = $_GET['id']; 

$select = mysqli_fetch_array(mysqli_query($con,"SELECT status FROM notice WHERE id='".$id."'"));

if($select['status'] == '0'){
    mysqli_query($con,"UPDATE notice SET `status` = '1' WHERE id='".$id."'");
}else{
 mysqli_query($con,"UPDATE notice SET `status` = '0' WHERE id='".$id."'");
}

?>
<script>
window.location ="../notice-management.php";
</script>