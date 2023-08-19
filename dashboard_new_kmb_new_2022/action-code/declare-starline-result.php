<?php include('../config.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $game_name = mysqli_real_escape_string($con,$_POST['game_name']);
    $date = mysqli_real_escape_string($con,$_POST['date']);
   $open_pana = mysqli_real_escape_string($con,$_POST['pana']);
  $open_result = mysqli_real_escape_string($con,$_POST['result']);
  
    $check=mysqli_query($con, "select * from starline_result_chart where game_name= '$game_name' and date='$date' ");
    if(mysqli_num_rows($check)>0){
        $check_open=mysqli_query($con, "select * from starline_result_chart where game_name= '$game_name' and date='$date' and open_panna!='' and open_digit!=''");
        if(mysqli_num_rows($check_open)>0){
            echo '<div class="alert alert-danger">
                <strong>Failed!</strong> Result Already Declared.
              </div>';
            ?>
            <script>
                alert('Result Already Declared');
                window.location='../starline-declare-result.php';
            </script>
            <?php
        }else{
            $update= mysqli_query($con,"update starline_result_chart set open_panna='$open_pana', open_digit='$open_digit' where game_name='$game_name' and date='$date'");
        }
    }else{
        $insert=mysqli_query($con,"INSERT INTO `starline_result_chart`(`game_name`, `date`, `open_panna`, `open_digit`, `close_panna`, `close_digit`, `status`) VALUES ('$game_name','$date','$open_pana','$open_result','','','1')");
    }
    
    
    
    if($insert){
        $open_pana_winner = mysqli_query($con,"SELECT * FROM starline_bid_history WHERE game_name='$game_name' AND date = '$date' AND pana = '$open_pana'");
      
        $open_result_winner = mysqli_query($con,"SELECT * FROM starline_bid_history WHERE game_name='$game_name' AND date = '$date' AND digit = '$open_result'");
        
        while($select_open_pana = mysqli_fetch_array($open_pana_winner)){
            $username = $select_open_pana['username'];
            $game_type = $select_open_pana['game_type'];
            $points_action = $select_open_pana['points_action'];
            $select_win = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM starline_game_rates WHERE type='$game_type'"));
    						                    $win_amount = round(($select_win['max_value']/$select_win['min_value'])*$points_action);
            $insert_result = mysqli_query($con,"INSERT INTO `starline_winning_report`(`date`, `username`, `game_name`, `game_type`, `pana`, `digit`, `winning_points`, `points_action`) VALUES ('$date','$username','$game_name','$game_type','$open_pana','N/A','$win_amount','$points_action')");
            if($insert_result){
                $get_wallet = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user_info WHERE phone='$username'"));
                $wallet = $get_wallet['wallet'];
                $new_wallet = $win_amount + $wallet;
                $update_wallet = mysqli_query($con,"UPDATE user_info SET wallet='$new_wallet' WHERE phone='$username'");
                $today = date('Y-m-d');
                $time = date("H:i:s");
                $transaction = mysqli_query($con,"INSERT INTO `wallet_history`(`status`, `date`, `time`, `amount`, `updated_amount`, `remark`, `phone_number`) VALUES ('1','$today','$time','$win_amount','$new_wallet','Starline Pana Winning Reward','$username')");
            }else{
                echo "1" . mysqli_error($con);
                die();
            }
        }
       
        while($select_open_result = mysqli_fetch_array($open_result_winner)){
            $username = $select_open_result['username'];
            $game_type = $select_open_result['game_type'];
            $points_action = $select_open_result['points_action'];
            $select_win = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM starline_game_rates WHERE type='$game_type'"));
    						                    $win_amount = round(($select_win['max_value']/$select_win['min_value'])*$points_action);
            $insert_result = mysqli_query($con,"INSERT INTO `starline_winning_report`(`date`, `username`, `game_name`, `game_type`, `pana`, `digit`, `winning_points`,`points_action`) VALUES ('$date','$username','$game_name','$game_type','N/A','$open_result','$win_amount','$points_action')");
            if($insert_result){
                $get_wallet = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user_info WHERE phone='$username'"));
                $wallet = $get_wallet['wallet'];
                $new_wallet = $win_amount + $wallet;
                $update_wallet = mysqli_query($con,"UPDATE user_info SET wallet='$new_wallet' WHERE phone='$username'");
                $today = date('Y-m-d');
                $time = date("H:i:s");
                $transaction = mysqli_query($con,"INSERT INTO `wallet_history`(`status`, `date`, `time`, `amount`, `updated_amount`, `remark`, `phone_number`) VALUES ('1','$today','$time','$win_amount','$new_wallet','Starline Digit Winning Reward','$username')");
            }else{
                echo "2" . mysqli_error($con);
                die();
            }
        }
     
    }else{
        echo mysqli_error($con);
    }
echo '<div class="alert alert-success">
    <strong>Success!</strong> Result Declared Successfully.
  </div>';
}
?>