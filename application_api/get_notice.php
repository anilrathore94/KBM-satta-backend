<?php

include '../dashboard/config.php';

$sql="select * from notice WHERE status='1' ORDER BY date DESC";
$res=mysqli_query($con,$sql);
$result=array();

while($row=mysqli_fetch_array($res))
{
array_push($result, array(
    'title'=>$row['title'],
    'content'=>$row['content'],
    'date'=>date("j M Y",strtotime($row['date']))
    ));
}

$json=array('result'=>$result);
echo json_encode($json);

?>