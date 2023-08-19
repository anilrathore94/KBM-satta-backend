<?php include('../config.php');


$today=date('Y-m-d');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $game_name = mysqli_real_escape_string($con,$_POST['game_name']);
    $date1 = mysqli_real_escape_string($con,$_POST['date']);
    if($date1 == $today){
    $select_market_open_time = mysqli_fetch_array(mysqli_query($con,"SELECT market_open_time FROM admin_settings"));
        							    $dateTime = new DateTime($select_market_open_time['market_open_time']);
                                        if ($dateTime->diff(new DateTime)->format('%R') == '+') {
                                          $date = $date1;
                                        }else{
                                            $date = date('Y-m-d', strtotime($date .' -1 day'));
                                        }
    }else{
        $date = $date1;
    }
    $session = mysqli_real_escape_string($con,$_POST['session']);
    $pana = mysqli_real_escape_string($con,$_POST['pana']);
    $digit = mysqli_real_escape_string($con,$_POST['result']);
    $pana_val = $session . "_panna" ;
    $digit_val = $session . "_digit" ;
    
    if($session == "open"){
        $pan = "Open Pana";
        $dig =  "Open Digit";
        $open_pana = mysqli_real_escape_string($con,$_POST['open_pana']);
        $open_result = mysqli_real_escape_string($con,$_POST['open_result']);
        $close_pana = "";
        $close_result = "";
    }else{
        $pan = "Close Pana";
        $dig =  "Close Digit";
        $close_pana = mysqli_real_escape_string($con,$_POST['close_pana']);
        $close_result = mysqli_real_escape_string($con,$_POST['close_result']);
        $open_pana = "";
        $open_result = "";
    }
    
    
    $check_old = mysqli_query($con,"SELECT * FROM result_chart WHERE date = '$date' AND game_name = '$game_name'");
    if(mysqli_num_rows($check_old)>0){
        
        if($session == "close"){
            $check_ = mysqli_query($con,"select * from result_chart where game_name= '$game_name' and date='$date' and open_panna !='' and open_digit !=''");
            if(mysqli_num_rows($check_)>0){
                $check_open=mysqli_query($con, "select * from result_chart where game_name= '$game_name' and date='$date' and $pana_val !='' and $digit_val !=''");
                if(mysqli_num_rows($check_open)>0){
                    echo '<div class="alert alert-danger">
    <strong>Failed!</strong> Result Already Declared.
  </div>';
                    
                }else{
                    
                    $update= mysqli_query($con,"update result_chart set `$pana_val`='$close_pana', `$digit_val`='$close_result' where game_name='$game_name' and date='$date'");
                    
                }
            }else{
                 echo '<div class="alert alert-danger">
    <strong>Failed!</strong> Please declare Open Result first.
  </div>';
            }
        }else{
            $check_open=mysqli_query($con, "select * from result_chart where game_name= '$game_name' and date='$date' and $pana_val !='' and $digit_val !=''");
            if(mysqli_num_rows($check_open)>0){
                
                echo '<div class="alert alert-danger">
    <strong>Failed!</strong> Result Already Declared.
  </div>';
            }else{
                
                $update= mysqli_query($con,"update result_chart set `$pana_val`='$open_pana', `$digit_val`='$open_result' where game_name='$game_name' and date='$date'");
                
            }
        }
        
        
        
    }else{
        if($session == "close"){
            echo '<div class="alert alert-danger">
    <strong>Failed!</strong> Please declare Open Result first.
  </div>';
        }else{
       $insert = mysqli_query($con,"INSERT INTO `result_chart`(`game_name`, `date`, `open_panna`, `open_digit`, `close_panna`, `close_digit`, `status`) VALUES ('$game_name','$date','$open_pana','$open_result','$close_pana','$close_result','1')");
        }
        
    }
    
    if($insert || $update){
        $open_pana_winner = mysqli_query($con,"SELECT * FROM user_bid_history WHERE game_name='$game_name' AND game_type != 'Half Sangam' AND game_type != 'Full Sangam'  AND date = '$date' AND open_pana = '$open_pana'");
        $close_pana_winner = mysqli_query($con,"SELECT * FROM user_bid_history WHERE game_name='$game_name' AND game_type != 'Half Sangam' AND game_type != 'Full Sangam' AND date = '$date' AND close_pana = '$close_pana'");
        
        while($select_open_pana = mysqli_fetch_array($open_pana_winner)){
            $username = $select_open_pana['username'];
            $game_type = $select_open_pana['game_type'];
            $points_action = $select_open_pana['points_action'];
            $select_win = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM game_rates WHERE type='$game_type'"));
    						                    $win_amount = round(($select_win['max_value']/$select_win['min_value'])*$points_action);
            $insert_result = mysqli_query($con,"INSERT INTO `user_winning_report`(`date`, `username`, `game_name`, `game_type`, `session`, `open_pana`, `open_digit`, `close_pana`, `close_digit`,`winning_points`, `points_action`) VALUES ('$date','$username','$game_name','$game_type','$session','$open_pana','N/A','N/A','N/A','$win_amount','$points_action')");
            
            if($insert_result){
                $get_wallet = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user_info WHERE phone='$username'"));
                $wallet = $get_wallet['wallet'];
                $new_wallet = $win_amount + $wallet;
                $update_wallet = mysqli_query($con,"UPDATE user_info SET wallet='$new_wallet' WHERE phone='$username'");
                $today = date('Y-m-d');
                $time = date("H:i:s");
                $transaction = mysqli_query($con,"INSERT INTO `wallet_history`(`status`, `date`, `time`, `amount`, `updated_amount`, `remark`, `phone_number`) VALUES ('1','$today','$time','$win_amount','$new_wallet','Open Panna Winning Reward','$username')");
            }
        }
        while($select_close_pana = mysqli_fetch_array($close_pana_winner)){
            $username = $select_close_pana['username'];
            $game_type = $select_close_pana['game_type'];
            $points_action = $select_close_pana['points_action'];
            $select_win = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM game_rates WHERE type='$game_type'"));
    						                    $win_amount = round(($select_win['max_value']/$select_win['min_value'])*$points_action);
            $insert_result = mysqli_query($con,"INSERT INTO `user_winning_report`(`date`, `username`, `game_name`, `game_type`, `session`, `open_pana`, `open_digit`, `close_pana`, `close_digit`,`winning_points`, `points_action`) VALUES ('$date','$username','$game_name','$game_type','$session','N/A','N/A','$close_pana','N/A','$win_amount','$points_action')");
            if($insert_result){
                $get_wallet = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user_info WHERE phone='$username'"));
                $wallet = $get_wallet['wallet'];
                $new_wallet = $win_amount + $wallet;
                $update_wallet = mysqli_query($con,"UPDATE user_info SET wallet='$new_wallet' WHERE phone='$username'");
                $today = date('Y-m-d');
                $time = date("H:i:s");
                $transaction = mysqli_query($con,"INSERT INTO `wallet_history`(`status`, `date`, `time`, `amount`, `updated_amount`, `remark`, `phone_number`) VALUES ('1','$today','$time','$win_amount','$new_wallet','Close Panna Winning Reward','$username')");
            }
        }
        
        $select_pre = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM result_chart WHERE game_name = '$game_name' AND date='$date'"));
        $open_re = $select_pre['open_digit'];
        $close_re = $select_pre['close_digit'];
        $open_pa = $select_pre['open_panna'];
        $close_pa = $select_pre['close_panna'];
        $jodi_result_winner = mysqli_query($con,"SELECT * FROM user_bid_history WHERE game_name='$game_name' AND game_type = 'Jodi Digit' AND date = '$date' AND open_digit = '$open_re' AND close_digit = '$close_re'");
        
        $open_result_winner = mysqli_query($con,"SELECT * FROM user_bid_history WHERE game_name='$game_name' AND game_type != 'Jodi Digit' AND game_type != 'Half Sangam' AND game_type != 'Full Sangam' AND date = '$date' AND open_digit = '$open_result' AND close_digit='NA' AND game_type='Single Digit'");
        
        $close_result_winner = mysqli_query($con,"SELECT * FROM user_bid_history WHERE game_name='$game_name' AND game_type != 'Jodi Digit' AND game_type != 'Half Sangam' AND game_type != 'Full Sangam' AND date = '$date' AND close_digit = '$close_result' AND open_digit='NA' AND game_type='Single Digit'");
        
        $half_sangam_winner = mysqli_query($con,"SELECT * FROM user_bid_history WHERE game_name='$game_name' AND game_type = 'Half Sangam' AND date = '$date' AND open_digit = '$open_re' AND close_pana = '$close_pa'");
        
        $full_sangam_winner = mysqli_query($con,"SELECT * FROM user_bid_history WHERE game_name='$game_name' AND game_type = 'Full Sangam' AND date = '$date' AND open_pana = '$open_pa' AND close_pana = '$close_pa'");
        
        
        while($select_jodi_result = mysqli_fetch_array($jodi_result_winner)){
            $username = $select_jodi_result['username'];
            $game_type = $select_jodi_result['game_type'];
            $points_action = $select_jodi_result['points_action'];
            $select_win = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM game_rates WHERE type='Jodi Digit'"));
    						                    $win_amount = round(($select_win['max_value']/$select_win['min_value'])*$points_action);
            $insert_result = mysqli_query($con,"INSERT INTO `user_winning_report`(`date`, `username`, `game_name`, `game_type`, `session`, `open_pana`, `open_digit`, `close_pana`, `close_digit`,`winning_points`, `points_action`) VALUES ('$date','$username','$game_name','$game_type','$session','N/A','$open_re','N/A','$close_re','$win_amount','$points_action')");
            if($insert_result){
                $get_wallet = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user_info WHERE phone='$username'"));
                $wallet = $get_wallet['wallet'];
                $new_wallet = $win_amount + $wallet;
                $update_wallet = mysqli_query($con,"UPDATE user_info SET wallet='$new_wallet' WHERE phone='$username'");
                $today = date('Y-m-d');
                $time = date("H:i:s");
                $transaction = mysqli_query($con,"INSERT INTO `wallet_history`(`status`, `date`, `time`, `amount`, `updated_amount`, `remark`, `phone_number`) VALUES ('1','$today','$time','$win_amount','$new_wallet','Jodi Digit Winning Reward','$username')");
            }
        }
        
        while($select_open_result = mysqli_fetch_array($open_result_winner)){
            $username = $select_open_result['username'];
            $game_type = $select_open_result['game_type'];
            $points_action = $select_open_result['points_action'];
            $select_win = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM game_rates WHERE type='$game_type'"));
    						                    $win_amount = round(($select_win['max_value']/$select_win['min_value'])*$points_action);
            $insert_result = mysqli_query($con,"INSERT INTO `user_winning_report`(`date`, `username`, `game_name`, `game_type`, `session`, `open_pana`, `open_digit`, `close_pana`, `close_digit`,`winning_points`, `points_action`) VALUES ('$date','$username','$game_name','$game_type','$session','N/A','$open_result','N/A','N/A','$win_amount','$points_action')");
            if($insert_result){
                $get_wallet = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user_info WHERE phone='$username'"));
                $wallet = $get_wallet['wallet'];
                $new_wallet = $win_amount + $wallet;
                $update_wallet = mysqli_query($con,"UPDATE user_info SET wallet='$new_wallet' WHERE phone='$username'");
                $today = date('Y-m-d');
                $time = date("H:i:s");
                $transaction = mysqli_query($con,"INSERT INTO `wallet_history`(`status`, `date`, `time`, `amount`, `updated_amount`, `remark`, `phone_number`) VALUES ('1','$today','$time','$win_amount','$new_wallet','Open Digit Winning Reward','$username')");
            }
        }
        while($select_close_result = mysqli_fetch_array($close_result_winner)){
            $username = $select_close_result['username'];
            $game_type = $select_close_result['game_type'];
            $points_action = $select_close_result['points_action'];
            $select_win = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM game_rates WHERE type='$game_type'"));
    						                    $win_amount = round(($select_win['max_value']/$select_win['min_value'])*$points_action);
            $insert_result = mysqli_query($con,"INSERT INTO `user_winning_report`(`date`, `username`, `game_name`, `game_type`, `session`, `open_pana`, `open_digit`, `close_pana`, `close_digit`, `winning_points`,`points_action`) VALUES ('$date','$username','$game_name','$game_type','$session','N/A','N/A','N/A','$digit','$win_amount','$points_action')");
            if($insert_result){
                $get_wallet = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user_info WHERE phone='$username'"));
                $wallet = $get_wallet['wallet'];
                $new_wallet = $win_amount + $wallet;
                $update_wallet = mysqli_query($con,"UPDATE user_info SET wallet='$new_wallet' WHERE phone='$username'");
                $today = date('Y-m-d');
                $time = date("H:i:s");
                $transaction = mysqli_query($con,"INSERT INTO `wallet_history`(`status`, `date`, `time`, `amount`, `updated_amount`, `remark`, `phone_number`) VALUES ('1','$today','$time','$win_amount','$new_wallet','Close Digit Winning Reward','$username')");
            }else{
                echo mysqli_error($con);
                die();
            }
            
        }
        
        while($select_half_result = mysqli_fetch_array($half_sangam_winner)){
            $username = $select_half_result['username'];
            $game_type = $select_half_result['game_type'];
            $points_action = $select_half_result['points_action'];
            $select_win = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM game_rates WHERE type='Half Sangam'"));
    						                    $win_amount = round(($select_win['max_value']/$select_win['min_value'])*$points_action);
            $insert_result = mysqli_query($con,"INSERT INTO `user_winning_report`(`date`, `username`, `game_name`, `game_type`, `session`, `open_pana`, `open_digit`, `close_pana`, `close_digit`,`winning_points`, `points_action`) VALUES ('$date','$username','$game_name','$game_type','$session','N/A','$open_re','$close_pa','N/A','$win_amount','$points_action')");
            if($insert_result){
                $get_wallet = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user_info WHERE phone='$username'"));
                $wallet = $get_wallet['wallet'];
                $new_wallet = $win_amount + $wallet;
                $update_wallet = mysqli_query($con,"UPDATE user_info SET wallet='$new_wallet' WHERE phone='$username'");
                $today = date('Y-m-d');
                $time = date("H:i:s");
                $transaction = mysqli_query($con,"INSERT INTO `wallet_history`(`status`, `date`, `time`, `amount`, `updated_amount`, `remark`, `phone_number`) VALUES ('1','$today','$time','$win_amount','$new_wallet','Half Sangam Winning Reward','$username')");
            }
        }
        
        while($select_full_result = mysqli_fetch_array($full_sangam_winner)){
            $username = $select_full_result['username'];
            $game_type = $select_full_result['game_type'];
            $points_action = $select_full_result['points_action'];
            $select_win = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM game_rates WHERE type='Full Sangam'"));
    						                    $win_amount = round(($select_win['max_value']/$select_win['min_value'])*$points_action);
            $insert_result = mysqli_query($con,"INSERT INTO `user_winning_report`(`date`, `username`, `game_name`, `game_type`, `session`, `open_pana`, `open_digit`, `close_pana`, `close_digit`,`winning_points`, `points_action`) VALUES ('$date','$username','$game_name','$game_type','$session','$open_pa','N/A','$close_pa','N/A','$win_amount','$points_action')");
            if($insert_result){
                $get_wallet = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user_info WHERE phone='$username'"));
                $wallet = $get_wallet['wallet'];
                $new_wallet = $win_amount + $wallet;
                $update_wallet = mysqli_query($con,"UPDATE user_info SET wallet='$new_wallet' WHERE phone='$username'");
                $today = date('Y-m-d');
                $time = date("H:i:s");
                $transaction = mysqli_query($con,"INSERT INTO `wallet_history`(`status`, `date`, `time`, `amount`, `updated_amount`, `remark`, `phone_number`) VALUES ('1','$today','$time','$win_amount','$new_wallet','Full Sangam Winning Reward','$username')");
            }
        }
        $select_open = mysqli_query($con,"SELECT * FROM result_chart WHERE game_name = '$game_name' AND date = '$date'");
									if(mysqli_num_rows($select_open) > 0){
									    $select = mysqli_fetch_array($select_open);
									    if($select['open_panna'] == ""){
									        $open_panna = "***";
									    }else{
									        $open_panna = $select['open_panna'];
									    }
									    if($select['open_digit'] == ""){
									        $open_ = "*";
									    }else{
									        $open_ = $select['open_digit'];
									    }
									    if($select['close_panna'] == ""){
									        $close_panna = "***";
									    }else{
									        $close_panna = $select['close_panna'];
									    }
									    if($select['close_digit'] == ""){
									        $close_ = "*";
									    }else{
									        $close_ = $select['close_digit'];
									    }
									}else{
									    $open_panna = "***";
									    $open_ = "*";
									    $close_panna = "***";
									    $close_ = "*";
									}
        
                $select_device = mysqli_query($con,"SELECT * FROM device_token WHERE token_id != ''");
    if(mysqli_num_rows($select_device)>0){
        while($tokens=mysqli_fetch_array($select_device)){
            
                $token1[] = $tokens['token_id'];
        }
    }else{
        $token1 ="";
    }
    
    $url = 'https://fcm.googleapis.com/fcm/send';
    $message = $game_name. " @@@ ".$open_panna."-".$open_."".$close_."-".$close_panna;

$fields = array
 (
'registration_ids' => $token1,
'data' => array ("message" => $message)
 );

$fields = json_encode ( $fields );
$headers = array (
'Authorization: key='.$pay_key,
'Content-Type: application/json'
);
$ch = curl_init ();
curl_setopt ( $ch, CURLOPT_URL, $url );
curl_setopt ( $ch, CURLOPT_POST, true );
curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

$result = curl_exec ( $ch );

echo '<div class="alert alert-success">
    <strong>Success!</strong> Result Declared Successfully.
  </div>';
        
    }

    
   
}
?>
