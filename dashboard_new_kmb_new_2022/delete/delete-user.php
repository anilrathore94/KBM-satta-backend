<?php
include('../config.php');

$id = $_GET['id']; 

   $delete =  mysqli_query($con,"DELETE FROM user_info WHERE id='".$id."'");


?>
<script>
window.location ="../user-management.php";
</script>