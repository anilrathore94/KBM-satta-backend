<?php include('../config.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $single_digit_1 = mysqli_real_escape_string($con,$_POST['single_digit_1']);
    $single_digit_2 = mysqli_real_escape_string($con,$_POST['single_digit_2']);
    $jodi_digit_1 = mysqli_real_escape_string($con,$_POST['jodi_digit_1']);
    $jodi_digit_2 = mysqli_real_escape_string($con,$_POST['jodi_digit_2']);
    $single_pana_1 = mysqli_real_escape_string($con,$_POST['single_pana_1']);
    $single_pana_2 = mysqli_real_escape_string($con,$_POST['single_pana_2']);
    $double_pana_1 = mysqli_real_escape_string($con,$_POST['double_pana_1']);
    $double_pana_2 = mysqli_real_escape_string($con,$_POST['double_pana_2']);
    $triple_pana_1 = mysqli_real_escape_string($con,$_POST['triple_pana_1']);
    $triple_pana_2 = mysqli_real_escape_string($con,$_POST['triple_pana_2']);
    $half_sangam_1 = mysqli_real_escape_string($con,$_POST['half_sangam_1']);
    $half_sangam_2 = mysqli_real_escape_string($con,$_POST['half_sangam_2']);
    $full_sangam_1 = mysqli_real_escape_string($con,$_POST['full_sangam_1']);
    $full_sangam_2 = mysqli_real_escape_string($con,$_POST['full_sangam_2']);
    
    $update_single_digit = mysqli_query($con,"UPDATE `game_rates` SET `min_value`='$single_digit_1',`max_value`='$single_digit_2' WHERE type = 'Single Digit'");
    $update_jodi_digit = mysqli_query($con,"UPDATE `game_rates` SET `min_value`='$jodi_digit_1',`max_value`='$jodi_digit_2' WHERE type = 'Jodi Digit'");
    $update_single_pana = mysqli_query($con,"UPDATE `game_rates` SET `min_value`='$single_pana_1',`max_value`='$single_pana_2' WHERE type = 'Single Pana'");
    $update_double_pana = mysqli_query($con,"UPDATE `game_rates` SET `min_value`='$double_pana_1',`max_value`='$double_pana_2' WHERE type = 'Double Pana'");
    $update_triple_pana = mysqli_query($con,"UPDATE `game_rates` SET `min_value`='$triple_pana_1',`max_value`='$triple_pana_2' WHERE type = 'Triple Pana'");
    $update_half_sangam = mysqli_query($con,"UPDATE `game_rates` SET `min_value`='$half_sangam_1',`max_value`='$half_sangam_2' WHERE type = 'Half Sangam'");
    $update_full_sangam = mysqli_query($con,"UPDATE `game_rates` SET `min_value`='$full_sangam_1',`max_value`='$full_sangam_2' WHERE type = 'Full Sangam'");
    if($update_full_sangam){
        ?>
        <script>alert('Details Updated Successfully!!');
        window.location = '../game-rates.php';</script>
        <?php
    }else{
        ?>
        <script>alert('Some Error Occured! Try Again Later!!');
        window.location = '../game-rates.php';</script>
        <?php
    }
}
?>