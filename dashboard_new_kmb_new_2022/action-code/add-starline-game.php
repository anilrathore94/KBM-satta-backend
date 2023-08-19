<?php include('../config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $games_name=mysqli_real_escape_string($con, $_POST['game_name']);
    $games_hindi=mysqli_real_escape_string($con, $_POST['game_name_hindi']);
    $open_time=mysqli_real_escape_string($con, date('h:i a', strtotime($_POST['open_time'])));
    
    $insert=mysqli_query($con, "insert into starline_game_name (games_name, games_name_hindi, open_time, game_status, market_status) value('$games_name', '$games_hindi', '$open_time', '0','0')");
    
    if($insert){ ?>
     <script>
     alert('Game Added Successfully');
     window.location='../starline-game-name.php';
     </script>
     
    <?php }else{
     ?>
       <script>
     alert('Game Added Failed');
     window.location='../starline-game-name.php';
     </script> 
    <?php }
}
?>