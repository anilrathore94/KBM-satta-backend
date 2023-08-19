<?php include('../config.php');
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $old_password = mysqli_real_escape_string($con,$_POST['oldpass']);
        $new_password = mysqli_real_escape_string($con,$_POST['newpass']);
        
        $select = mysqli_query($con,"SELECT * FROM admin WHERE password='$old_password'");
        if(mysqli_num_rows($select)>0){
            $update = mysqli_query($con,"UPDATE admin SET password='$new_password'");
            if($update){
                ?>
                <script>
                    alert('Password Updated Successfully');
                    window.location = '../change-password.php';
                </script>
                <?php
            }else{
                ?>
                <script>
                    alert('Some Error Occured! Try Again Later');
                    window.location = '../change-password.php';
                </script>
                <?php
            }
        }else{
            ?>
                <script>
                    alert('Wrong Pasword');
                    window.location = '../change-password.php';
                </script>
                <?php
        }
    }
?>