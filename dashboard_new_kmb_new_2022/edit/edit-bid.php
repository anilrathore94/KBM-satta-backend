<?php
include('../config.php');
if($_SERVER['REQUEST_METHOD'] == "POST"){
   $id = $_POST['id']; 
    $open_pana = $_POST['open_pana'];
    $close_pana = $_POST['close_pana'];
    $open_digit = $_POST['open_digit'];
    $close_digit = $_POST['close_digit'];
    
    $update = mysqli_query($con, "UPDATE user_bid_history SET open_pana = '$open_pana', close_pana = '$close_pana', open_digit = '$open_digit', close_digit='$close_digit' WHERE id = '$id'");
    if($update){
        ?>
        <script>
            window.location = '../declare-result.php';
        </script>
        <?php
    }
}
?>