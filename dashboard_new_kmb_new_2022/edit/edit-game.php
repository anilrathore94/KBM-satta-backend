<?php include('../config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $games_name=mysqli_real_escape_string($con, $_POST['game_name']);
    $open_time=mysqli_real_escape_string($con, date('h:i a', strtotime($_POST['open_time'])));
    
    $insert=mysqli_query($con, "UPDATE starline_game_name SET open_time='$open_time' WHERE games_name='$games_name'");
    
    if($insert){ ?>
     <script>
     alert('Game Updated Successfully');
     window.location='../starline-game-name.php';
     </script>
     
    <?php }else{
    echo mysqli_error($con);
    ?>
       <script>
     alert('Game Updation Failed');
     window.location='../starline-game-name.php';
     </script> 
    <?php }
}
?>