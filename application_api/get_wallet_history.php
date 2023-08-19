<?php

include '../dashboard/config.php';

$phone_number = $_REQUEST['phone_number'];
$date1 = $_REQUEST['date1'];
$date2 = $_REQUEST['date2'];

$sql="select * from wallet_history WHERE phone_number='$phone_number' AND date BETWEEN '$date1' AND '$date2' ORDER BY id DESC";
$res=mysqli_query($con,$sql);
$result=array();

while($row=mysqli_fetch_array($res))
{
    $date = date(("j M Y"),strtotime($row['date']));
    $time = date(("h:i:s A"),strtotime($row['time']));
array_push($result, array(
    'amount'=>$row['amount'],
    'updated_amount'=>$row['updated_amount'],
    'remark'=>$row['remark'],
    'date'=>$date." ".$time,
    'time'=>$row['time']
    ));
}

$json=array('result'=>$result);
echo json_encode($json);

?>