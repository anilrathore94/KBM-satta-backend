<?php
include('../config.php');

$id = $_GET['id']; 

   $delete =  mysqli_query($con,"DELETE FROM starline_game_name WHERE id='".$id."'");


?>
<script>
window.location ="../starline-game-name.php";
</script>