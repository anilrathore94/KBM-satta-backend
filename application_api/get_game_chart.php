<?php

include '../dashboard/config.php';


$sql="select * from result_chart";
$res=mysqli_query($con,$sql);
$result=array();

while($row=mysqli_fetch_array($res))
{
    $open_number= $row['open_panna'] . "-" . $row['open_digit'];
    $close_number= $row['close_panna'] . "-" . $row['close_digit'];
array_push($result, array(
    'game_name'=>$row['game_name'],
    'result_date'=>$row['date'],
    'open_number'=>$open_number,
    'close_number'=>$close_number
    ));
}

$json=array('result'=>$result);
echo json_encode($json);

?>