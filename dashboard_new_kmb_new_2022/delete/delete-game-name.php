<?php
include('../config.php');

$id = $_GET['id']; 

$select = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM game_time WHERE id='".$id."'"));
$delete_week = mysqli_query($con,"DELETE FROM game_time WHERE game = '$select[game]'");

?>
<script>
window.location ="../game-name.php";
</script>