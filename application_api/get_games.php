<?php

include '../dashboard/config.php';
$day = date("l");
//$sql="select * from games_management WHERE game_status='1' ORDER BY CAST(open_time AS DATETIME) ASC";
//$sql="select * from game_time WHERE status='1' AND day='$day' ORDER BY STR_TO_DATE(open_time, '%l:%i %p' ) ASC";
$sql="select * from game_time WHERE day='$day' ORDER BY STR_TO_DATE(open_time, '%l:%i %p' ) ASC";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0){
    
}else{
    echo mysqli_error($con);
}
$result=array();
$date = date('Y-m-d');

while($row=mysqli_fetch_array($res))
{
    $select_market_open_time = mysqli_fetch_array(mysqli_query($con,"SELECT market_open_time FROM admin_settings"));
							    $dateTime = new DateTime($select_market_open_time['market_open_time']);
                                if ($dateTime->diff(new DateTime)->format('%R') == '+') {
                                  $today = date('Y-m-d');
                                }else{
                                    $today = date('Y-m-d', strtotime($date .' -1 day'));
                                }
    $select_result = mysqli_query($con,"SELECT * FROM result_chart WHERE game_name = '$row[game]' AND date='$today'");
    if(mysqli_num_rows($select_result)>0){
        $sel = mysqli_fetch_array($select_result);
        if($sel['open_panna'] == ""){
            $open_pana = "***";
        }else{
            $open_pana = $sel['open_panna'];
        }
        if($sel['close_panna'] == ""){
            $close_pana = "***";
        }else{
            $close_pana = $sel['close_panna'];
        }
        if($sel['open_digit'] == ""){
            $open_digit = "*";
        }else{
            $open_digit = $sel['open_digit'];
        }
        if($sel['close_digit'] == ""){
            $close_digit = "*";
        }else{
            $close_digit = $sel['close_digit'];
        }
    }else{
        $open_pana = "***";
        $close_pana = "***";
        $open_digit= "*";
        $close_digit= "*";
    }
    $select_status = mysqli_fetch_array(mysqli_query($con,"select * from games_management WHERE games_name='$row[game]'"));
array_push($result, array(
    'games_name'=>$row['game'],
    'open_time'=>$row['open_time'],
    'close_time'=>$row['close_time'],
    'market_status'=>$select_status['market_status'],
    'game_status'=>$row['status'],
    'open_pana'=>$open_pana,
    'close_pana'=>$close_pana,
    'open_digit'=>$open_digit,
    'close_digit'=>$close_digit
    ));
}

$json=array('result'=>$result);
echo json_encode($json);

?>