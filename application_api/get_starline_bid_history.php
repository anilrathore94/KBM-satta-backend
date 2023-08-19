<?php
include '../dashboard/config.php';

$username = $_REQUEST['phone_number'];
$date1 = $_REQUEST['date1'];
$date2 = $_REQUEST['date2'];

$sql="select * from starline_bid_history WHERE username='$username' AND date BETWEEN '$date1' AND '$date2' ORDER BY id DESC";
$res=mysqli_query($con,$sql);
$result=array();

while($row=mysqli_fetch_array($res))
{
array_push($result, array(
  
    'id'=>$row['id'],
    'date'=>$row['date'],
    'username'=>$row['username'],
    'bid_id'=>$row['bid_id'],
    'game_name'=>$row['game_name'],
    'game_type'=>$row['game_type'],
    'digit'=>$row['digit'],
    'pana'=>$row['pana'],
    'points'=>$row['points_action']
    ));
}

$json=array('result'=>$result);
echo json_encode($json);

?>