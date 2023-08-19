<?php

include '../dashboard/config.php';

$phone_number = $_REQUEST['phone_number'];


$sql="select * from user_withdraw_request WHERE username='$phone_number' ORDER BY id DESC";
$res=mysqli_query($con,$sql);
$result=array();

while($row=mysqli_fetch_array($res))
{
   
array_push($result, array(
    'points'=>$row['points'],
    'remark'=>$row['remark'],
     'date'=>$row['date'],
    'status'=>$row['status']
    ));
}

$json=array('result'=>$result);
echo json_encode($json);

?>