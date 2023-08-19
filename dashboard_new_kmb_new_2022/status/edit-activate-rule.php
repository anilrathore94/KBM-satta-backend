<?php
include('../config.php');

$id = $_GET['id']; 

$select = mysqli_fetch_array(mysqli_query($con,"SELECT status FROM activate_rule WHERE id='".$id."'"));

if($select['status'] == '0'){
    mysqli_query($con,"UPDATE activate_rule SET `status` = '1' WHERE id='".$id."'");
mysqli_close($con);
}else{
 mysqli_query($con,"UPDATE activate_rule SET `status` = '0' WHERE id='".$id."'");
mysqli_close($con);   
}

?>
<script>
window.location ="../activate-rule.php";
</script>