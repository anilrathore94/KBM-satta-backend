<?php include('../config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id = mysqli_real_escape_string($con,$_POST['id']);
    $game_name=mysqli_real_escape_string($con, $_POST['game_name']);
    $sunday_open_time=mysqli_real_escape_string($con, date('h:i a', strtotime($_POST['sunday_open_time'])));
    $sunday_close_time=mysqli_real_escape_string($con, date('h:i a', strtotime($_POST['sunday_close_time'])));
    $sunday_status=mysqli_real_escape_string($con,$_POST['sunday_status']);
    
    $update_sunday=mysqli_query($con, "UPDATE game_time SET open_time='$sunday_open_time', close_time='$sunday_close_time', status='$sunday_status' WHERE game='$game_name' AND day = 'Sunday'");
    
    $monday_open_time=mysqli_real_escape_string($con, date('h:i a', strtotime($_POST['monday_open_time'])));
    $monday_close_time=mysqli_real_escape_string($con, date('h:i a', strtotime($_POST['monday_close_time'])));
    $monday_status=mysqli_real_escape_string($con,$_POST['monday_status']);
    
    $update_monday=mysqli_query($con, "UPDATE game_time SET open_time='$monday_open_time', close_time='$monday_close_time', status='$monday_status' WHERE game='$game_name' AND day = 'Monday'");
    
    $tuesday_open_time=mysqli_real_escape_string($con, date('h:i a', strtotime($_POST['tuesday_open_time'])));
    $tuesday_close_time=mysqli_real_escape_string($con, date('h:i a', strtotime($_POST['tuesday_close_time'])));
    $tuesday_status=mysqli_real_escape_string($con,$_POST['tuesday_status']);
    
    $update_tuesday=mysqli_query($con, "UPDATE game_time SET open_time='$tuesday_open_time', close_time='$tuesday_close_time', status='$tuesday_status' WHERE game='$game_name' AND day = 'Tuesday'");
    
    $wednesday_open_time=mysqli_real_escape_string($con, date('h:i a', strtotime($_POST['wednesday_open_time'])));
    $wednesday_close_time=mysqli_real_escape_string($con, date('h:i a', strtotime($_POST['wednesday_close_time'])));
    $wednesday_status=mysqli_real_escape_string($con,$_POST['wednesday_status']);
    
    $update_wednesday=mysqli_query($con, "UPDATE game_time SET open_time='$wednesday_open_time', close_time='$wednesday_close_time', status='$wednesday_status' WHERE game='$game_name' AND day = 'Wednesday'");
    
    $thursday_open_time=mysqli_real_escape_string($con, date('h:i a', strtotime($_POST['thursday_open_time'])));
    $thursday_close_time=mysqli_real_escape_string($con, date('h:i a', strtotime($_POST['thursday_close_time'])));
    $thursday_status=mysqli_real_escape_string($con,$_POST['thursday_status']);
    
    $update_thursday=mysqli_query($con, "UPDATE game_time SET open_time='$thursday_open_time', close_time='$thursday_close_time', status='$thursday_status' WHERE game='$game_name' AND day = 'Thursday'");
    
    $friday_open_time=mysqli_real_escape_string($con, date('h:i a', strtotime($_POST['friday_open_time'])));
    $friday_close_time=mysqli_real_escape_string($con, date('h:i a', strtotime($_POST['friday_close_time'])));
    $friday_status=mysqli_real_escape_string($con,$_POST['friday_status']);
    
    $update_friday=mysqli_query($con, "UPDATE game_time SET open_time='$friday_open_time', close_time='$friday_close_time', status='$friday_status' WHERE game='$game_name' AND day = 'Friday'");
    
    $saturday_open_time=mysqli_real_escape_string($con, date('h:i a', strtotime($_POST['saturday_open_time'])));
    $saturday_close_time=mysqli_real_escape_string($con, date('h:i a', strtotime($_POST['saturday_close_time'])));
    $saturday_status=mysqli_real_escape_string($con,$_POST['saturday_status']);
    
    $update_saturday=mysqli_query($con, "UPDATE game_time SET open_time='$saturday_open_time', close_time='$saturday_close_time', status='$saturday_status' WHERE game='$game_name' AND day = 'Saturday'");
    
    if($update_saturday){ ?>
     <script>
     alert('Game Updated Successfully');
     window.location='../edit-week-game.php?id=<?php echo $id;?>';
     </script>
     
    <?php }else{
    echo mysqli_error($con);
    ?>
       <script>
     alert('Game Updation Failed');
     window.location='../edit-week-game.php?id=<?php echo $id;?>';
     </script> 
    <?php }
}
?>