<?php
include '../dashboard/config.php';

$sql="select * from starline_game_rates";
$res=mysqli_query($con,$sql);
$result=array();

while($row=mysqli_fetch_array($res))
{
    
array_push($result, array(
    'type'=>$row['type'],
    'min_value'=>$row['min_value'],
    'max_value'=>$row['max_value']
    ));
}

$json=array('result'=>$result);
echo json_encode($json);

?>
