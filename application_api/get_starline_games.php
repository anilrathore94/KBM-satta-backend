<?php
include '../dashboard/config.php';

$sql="select * from starline_game_name ORDER BY CAST(open_time AS DATETIME) ASC";
$date=date('Y-m-d');
$res=mysqli_query($con,$sql);
$result=array();

while($row=mysqli_fetch_array($res))
{
    $select_result = mysqli_query($con,"SELECT * FROM starline_result_chart WHERE game_name = '$row[games_name]' AND date='$date'");
    if(mysqli_num_rows($select_result)>0){
        $sel = mysqli_fetch_array($select_result);
        if($sel['open_panna'] == ""){
            $pana = "***";
        }else{
            $pana = $sel['open_panna'];
        }
        if($sel['open_digit'] == ""){
            $digit = "*";
        }else{
            $digit = $sel['open_digit'];
        }
        
    }else{
        $pana = "***";
        $digit= "*";
    }
array_push($result, array(
    'games_name'=>$row['games_name'],
    'games_name_hindi'=>$row['games_name_hindi'],
    'open_time'=>$row['open_time'],
    'market_status'=>$row['market_status'],
    'digit'=>$digit,
    'pana'=>$pana,
    'game_status'=>$row['game_status']
    ));
}

$json=array('result'=>$result);
echo json_encode($json);

?>
