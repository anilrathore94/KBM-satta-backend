<?php include('../dashboard/config.php');

$current_time = strtotime(date('h:i:sa'));
$content = $_POST['bids'];
$json = json_decode($content, true);
foreach ($json as $key => $value) {
    $phone_number = $value['phone_number'];
$game_name = $value['game_name'];
$game_type = $value['game_type'];
$pana = $value['pana'];
$digit = $value['digit'];
$points_action = $value['points_action'];
$date = date('Y-m-d');
$time = date("H:i:s");

$limits = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM admin_settings"));

$start_time = strtotime($limits['market_open_time']);

$select_time = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM starline_game_name WHERE games_name = '$game_name'"));

$open_time = strtotime($select_time['open_time']);
$bid = "Yes";

if($current_time >= $open_time OR $current_time <= $start_time){
    $bid = "No";
}


$min_limit = $limits['min_bid_amt'];
$max_limit = $limits['max_bid_amt'];
if($bid==="Yes"){
if($points_action <= $max_limit && $points_action >= $min_limit){
 
 $val = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user_info WHERE phone = '$phone_number'"));

$bal = $val['wallet'];

if(($bal - $points_action)>=0){
 
$sql = "INSERT INTO `starline_bid_history`(`username`, `game_name`, `game_type`, `pana`, `digit`,`points_action`, `date`,`time`) 
VALUES ('$phone_number','$game_name','$game_type','$pana','$digit','$points_action','$date','$time')";
$insert=mysqli_query($con, $sql);
if($insert){
    $select_user = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user_info WHERE phone = '$phone_number'"));
    $wallet = $select_user['wallet'];
    $amount = $wallet - $points_action;
    
     $remark = "Bid Placed For Starline ".$game_name."(".$game_type.")";
    
    $pt = "-".$points_action;
    
    $update = mysqli_query($con,"UPDATE user_info SET wallet = '$amount' WHERE phone = '$phone_number'");
    $wallet_entry = mysqli_query($con,"INSERT INTO `wallet_history`(`status`, `date`, `time`, `amount`, `updated_amount`, `remark`, `phone_number`) 
    VALUES ('0','$date','$time','$pt','$amount','$remark','$phone_number')");
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