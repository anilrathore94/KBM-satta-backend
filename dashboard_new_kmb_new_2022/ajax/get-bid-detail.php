<?php include('../config.php');

$id = mysqli_real_escape_string($con,$_POST['id']);
$date = date('Y-m-d');

if($id=="all"){
    $select = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(points_action) as point FROM user_bid_history WHERE date='$date'"));
    if($select['point'] == ""){
        echo "0";
    }else{
        echo $select['point'];
    }
}else{
    $select = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(points_action) as point FROM user_bid_history WHERE date='$date' AND game_name = '$id'"));
    if($select['point'] == ""){
        echo "0";
    }else{
        echo $select['point'];
    }
}
?>