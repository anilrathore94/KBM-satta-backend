<?php
include('../config.php');

$id = $_GET['id']; 

$select = mysqli_fetch_array(mysqli_query($con,"SELECT game_status FROM starline_game_name WHERE id='".$id."'"));

if($select['game_status'] == '0'){
    mysqli_query($con,"UPDATE starline_game_name SET `game_status` = '1' WHERE id='".$id."'");
}else{
 mysqli_query($con,"UPDATE starline_game_name SET `game_status` = '0' WHERE id='".$id."'");
 
}

?>
<script>
    window.location = '../starline-game-name.php';
</script>