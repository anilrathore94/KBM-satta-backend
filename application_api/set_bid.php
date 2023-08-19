<?php include('../dashboard/config.php');
$current_time = strtotime(date('h:i:sa'));
$day = date('l');

$content = $_POST['bids'];
$json = json_decode($content, true);
foreach ($json as $key => $value) {
    $phone_number = $value['phone_number'];
$game_name = $value['game_name'];
$game_type = $value['game_type'];
$session = $value['session'];
$open_pana = $value['open_pana'];
$open_dig = $value['open_digit'];
$close_pana = $value['close_pana'];
$close_dig = $value['close_digit'];
$points_action = $value['points_action'];

$limits = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM admin_settings"));

$start_time = strtotime($limits['market_open_time']);

$select_time = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM game_time WHERE game = '$game_name' AND day='$day'"));

$open_time = strtotime($select_time['open_time']);
$close_time = strtotime($select_time['close_time']);
$bid = "Yes";
if($session == "Close"){
    if($current_time > $close_time OR $current_time < $start_time){
    $bid = "No";
}
}
if($session == "Open"){
    if($current_time > $open_time OR $current_time < $start_time){
        
    $bid = "No";
}
}

if($bid === "Yes"){

$min_limit = $limits['min_bid_amt'];
$max_limit = $limits['max_bid_amt'];

if($points_action <= $max_limit && $points_action >= $min_limit){
    
    if($open_pana === ""){
        $open_pana = "NA";
    }
    if($close_pana === ""){
        $close_pana = "NA";
    }

if($game_type == "Jodi" || $game_type == "Jodi Digit"){
    $game_type = "Jodi Digit";
    if($open_dig != "NA"){
        $open_digit =  substr($open_dig,0,1);
        $close_digit = substr($open_dig,1,1);
    }else 
    if($close_dig != "NA"){
        $open_digit =  substr($close_dig,0,1);
        $close_digit = substr($close_dig,1,1);
    }
}else{
    if($open_dig===""){
        $open_digit = "NA";
    }else{
        $open_digit = $open_dig;
    }
    if($close_dig ===""){
         $close_digit = "NA";
    }else{
         $close_digit = $close_dig;
    }
}
$date = date('Y-m-d');
$time = date("H:i:s");

$val = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user_info WHERE phone = '$phone_number'"));

$bal = $val['wallet'];

if(($bal - $points_action)>=0){
 
$sql = "INSERT INTO `user_bid_history`(`username`, `game_name`, `game_type`, `session`, `open_pana`, `open_digit`, `close_pana`, `close_digit`, `points_action`, `date`,`time`) VALUES ('$phone_number','$game_name','$game_type','$session','$open_pana','$open_digit','$close_pana','$close_digit','$points_action','$date','$time')";
$insert=mysqli_query($con, $sql);
if($insert){
    $select_user = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user_info WHERE phone = '$phone_number'"));
    $wallet = $select_user['wallet'];
    $amount = $wallet - $points_action;
    
    $remark = "Bid Placed For ".$game_name."(".$game_type.")";
    
    $pt = "-".$points_action;
    
    $update = mysqli_query($con,"UPDATE user_info SET wallet = '$amount' WHERE phone = '$phone_number'");
    $wallet_entry = mysqli_query($con,"INSERT INTO `wallet_history`(`status`, `date`, `time`, `amount`, `updated_amount`, `remark`, `phone_number`) VALUES ('0','$date','$time','$pt','$amount','$remark','$phone_number')");
   $result = array(
        'success' => '1',
        'msg' => 'Bid Added Successfully!!'
        );
}
}else{
   $result = array(
        'success' => '0',
        'msg' => 'Insufficient Fund!!'
        ); 
}
}
}else{
    $result = array(
        'success' => '0',
        'msg' => 'Market Closed!!'
        );
}
}

echo json_encode($result);
?>