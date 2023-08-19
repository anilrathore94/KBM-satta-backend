<?php
include '../dashboard/config.php';

$username = $_REQUEST['phone_number'];

$sql="select * from starline_winning_report WHERE username='$username'  ORDER BY id DESC";
$res=mysqli_query($con,$sql);
$result=array();

while($row=mysqli_fetch_array($res))
{
array_push($result, array(
    
    'game_name'=>$row['game_name'],
    'game_type'=>$row['game_type'],
    'open_pana'=>$row['pana'],
    'open_digit'=>$row['digit'],
    'winning_points'=>$row['winning_points'],
    'points_action'=>$row['points_action'],
    'date'=>$row['date']
    ));
}

$json=array('result'=>$result);
echo json_encode($json);

?>