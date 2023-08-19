<?php include('../config.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $alt_email = mysqli_real_escape_string($con,$_POST['alt_email']);
    $mobile = mysqli_real_escape_string($con,$_POST['mobile']);
    $alt_mobile = mysqli_real_escape_string($con,$_POST['alt_mobile']);
    $wp_mobile = mysqli_real_escape_string($con,$_POST['wp_mobile']);
    $landline = mysqli_real_escape_string($con,$_POST['landline']);
    $alt_landline = mysqli_real_escape_string($con,$_POST['alt_landline']);
    $facebook = mysqli_real_escape_string($con,$_POST['facebook']);
    $twitter = mysqli_real_escape_string($con,$_POST['twitter']);
    $youtube = mysqli_real_escape_string($con,$_POST['youtube']);
    $instagram = mysqli_real_escape_string($con,$_POST['instagram']);
    $address = mysqli_real_escape_string($con,$_POST['address']);
    $latitude = mysqli_real_escape_string($con,$_POST['latitude']);
    $longitude = mysqli_real_escape_string($con,$_POST['longitude']);
    $google_plus = mysqli_real_escape_string($con,$_POST['google_plus']);
    
   // $update = mysqli_query($con,"UPDATE `contact_detail` SET `email`='$email',`alt_email`='$alt_email',`mobile`='$mobile',`alt_mobile`='$alt_mobile',`wp_mobile`='$wp_mobile',`landline`='$landline',`alt_landline`='$alt_landline',`facebook`='$facebook',`twitter`='$twitter',`youtube`='$youtube',`instagram`='$instagram',`address`='$address',`latitude`='$latitude',`longitude`='$longitude',`google_plus`='$google_plus'");
   
     $update = mysqli_query($con,"UPDATE `contact_detail` SET `email`='$email',`alt_email`='$alt_email',`mobile`='$mobile',`alt_mobile`='$alt_mobile',`wp_mobile`='$wp_mobile',`landline`='$landline',`alt_landline`='$alt_landline',`facebook`='$facebook',`twitter`='$twitter',`youtube`='$youtube',`instagram`='$instagram',`address`='$address'");
    if($update){
        ?>
        <script>alert('Details Updated Successfully!!');
        window.location = '../contact-settings.php';</script>
        <?php
    }else{
        ?>
        <script>alert('Some Error Occured! Try Again Later!!');
        window.location = '../contact-settings.php';</script>
        <?php
    }
}
?>