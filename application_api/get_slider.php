<?php

include '../dashboard/config.php';

$sql="select * from slider_images WHERE status='1'";
$res=mysqli_query($con,$sql);
$result=array();

while($row=mysqli_fetch_array($res))
{
array_push($result, array(
    'image'=>$row['slider_image']
    ));
}

$json=array('result'=>$result);
echo json_encode($json);

?>