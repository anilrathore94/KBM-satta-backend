<?php

include '../dashboard/config.php';

$username = $_REQUEST['phone_number'];
$date1 = $_REQUEST['date1'];
$date2 = $_REQUEST['date2'];

$sql="select * from user_bid_history WHERE username='$username' AND date BETWEEN '$date1' AND '$date2' ORDER BY id DESC";
$res=mysqli_query($con,$sql);
$result=array();

while($row=mysqli_fetch_array($res))
{
    $date = date(("j M Y"),strtotime($row['date']));
   $time = date(("h:i:s A"),strtotime($row['time']));
array_push($result, array(
    'bid_id'=>$row['bid_id'],
    'game_name'=>$row['game_name'],
    'game_type'=>$row['game_type'],
    'session'=>$row['session'],
    'open_pana'=>$row['open_pana'],
    'open_digit'=>$row['open_digit'],
    'close_pana'=>$row['close_pana'],
    'close_digit'=>$row['close_digit'],
    'points_action'=>$row['points_action'],
    'date'=>$date." ".$time
    ));
}

$json=array('result'=>$result);
echo json_encode($json);

?>