<?php 
include("../config.php");

    $date = date('Y-m-d h:i:s a');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $display_order = mysqli_real_escape_string($con,$_POST['display_order']);

    $folder = $_SERVER['DOCUMENT_ROOT'].'/image/';
    
    if($_FILES["slide"]["name"]){
        
    $image = time() . $_FILES["slide"]["name"];
   }
    
if(move_uploaded_file($_FILES["slide"]["tmp_name"], $folder.$image)){
$insert = mysqli_query($con,"INSERT INTO `slider_images`(`slider_image`,`display_order`, `creation_date`, `status`) VALUES ('$image','$display_order','$date','1')");

if($insert){
    ?> <script>alert("Successfully Added!!");
                    
                    window.location='../slider-images-management.php';
                    </script> <?php
}else{
    ?> <script>alert("Some Error Occured! Retry!!");
                    
                    window.location='../slider-images-management.php';
                    </script> <?php
}

}
}

?>