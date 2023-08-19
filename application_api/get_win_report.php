<?php

include '../dashboard/config.php';

$username = $_REQUEST['phone_number'];

$sql="select * from user_winning_report WHERE username='$username' ORDER BY id DESC";
$res=mysqli_query($con,$sql);
$result=array();

while($row=mysqli_fetch_array($res))
{
array_push($result, array(
    'bid_id'=>$row['bid_id'],
    'game_name'=>$row['game_name'],
    'game_type'=>$row['game_type'],
    'session'=>$row['session'],
    'open_pana'=>$row['open_pana'],
    'open_digit'=>$row['open_digit'],
    'close_pana'=>$row['close_pana'],
    'close_digit'=>$row['close_digit'],
    'winning_points'=>$row['winning_points'],
    'points_action'=>$row['points_action']
    ));
}

$json=array('result'=>$result);
echo json_encode($json);

?>