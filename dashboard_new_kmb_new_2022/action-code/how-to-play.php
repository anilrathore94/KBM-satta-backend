<?php include('../config.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $description = mysqli_real_escape_string($con,$_POST['description']);
    $video_link = mysqli_real_escape_string($con,$_POST['video_link']);
   
    $insert = mysqli_query($con,"UPDATE `how_to_play` SET `description`='$description', `video_link`='$video_link' WHERE id='1'");
    if($insert){
        ?>
        <script>alert('Details Updated Successfully!!');
        window.location = '../how-to-play.php';</script>
        <?php
    }else{
        ?>
        <script>alert('Some Error Occured! Try Again Later!!');
        window.location = '../how-to-play.php';</script>
        <?php
    }
}
?>