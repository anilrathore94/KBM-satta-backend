<?php include('../config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $title=mysqli_real_escape_string($con, $_POST['title']);
    $content=mysqli_real_escape_string($con, $_POST['content']);
    $date=mysqli_real_escape_string($con, $_POST['date']);
    
    $insert=mysqli_query($con, "INSERT INTO `notice`(`title`, `date`, `content`, `status`) VALUES ('$title','$date','$content','1')");
    
    if($insert){ ?>
     <script>
     alert('Notice Added Successfully');
     window.location='../notice-management.php';
     </script>
     
    <?php }else{
     ?>
       <script>
     alert('Something Went Wrong!');
     window.location='../notice-management.php';
     </script> 
    <?php }
}
?>