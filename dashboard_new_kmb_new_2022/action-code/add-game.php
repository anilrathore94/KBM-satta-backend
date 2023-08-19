<?php include('../config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $games_name=mysqli_real_escape_string($con, $_POST['game_name']);
    $open_time=mysqli_real_escape_string($con, date('h:i a', strtotime($_POST['open_time'])));
    $close_time=mysqli_real_escape_string($con, date('h:i a', strtotime($_POST['close_time'])));
    
    $insert_sunday = mysqli_query($con,"INSERT INTO `game_time`(`game`, `day`, `open_time`, `close_time`, `status`) VALUES ('$games_name','Sunday','$open_time','$close_time','1')");
    $insert_monday = mysqli_query($con,"INSERT INTO `game_time`(`game`, `day`, `open_time`, `close_time`, `status`) VALUES ('$games_name','Monday','$open_time','$close_time','1')");
    $insert_tuesday = mysqli_query($con,"INSERT INTO `game_time`(`game`, `day`, `open_time`, `close_time`, `status`) VALUES ('$games_name','Tuesday','$open_time','$close_time','1')");
    $insert_wednesday = mysqli_query($con,"INSERT INTO `game_time`(`game`, `day`, `open_time`, `close_time`, `status`) VALUES ('$games_name','Wednesday','$open_time','$close_time','1')");
    $insert_thursday = mysqli_query($con,"INSERT INTO `game_time`(`game`, `day`, `open_time`, `close_time`, `status`) VALUES ('$games_name','Thursday','$open_time','$close_time','1')");
    $insert_friday = mysqli_query($con,"INSERT INTO `game_time`(`game`, `day`, `open_time`, `close_time`, `status`) VALUES ('$games_name','Friday','$open_time','$close_time','1')");
    $insert_saturday = mysqli_query($con,"INSERT INTO `game_time`(`game`, `day`, `open_time`, `close_time`, `status`) VALUES ('$games_name','Saturday','$open_time','$close_time','1')");
    if($insert_saturday){ 
    ?>
    
     <script>
     alert('Game Added Successfully');
     window.location='../game-name.php';
     </script>
     
    <?php }else{
    echo mysqli_error($con);
    ?>
       <script>
     alert('Something Went Wrong');
     window.location='../game-name.php';
     </script> 
    <?php }
}
?>