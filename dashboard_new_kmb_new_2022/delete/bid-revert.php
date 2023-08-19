<?php
    include('../config.php');
    
    $date = $_GET['date'];
    $name = $_GET['name'];
    
    $select_array = mysqli_query($con,"SELECT * FROM user_bid_history WHERE game_name = '$name' AND date = '$date' ORDER BY id DESC");
    $amount = 0;
    
    while($select = mysqli_fetch_array($select_array)){
        $amount = $select['points_action'];
        $user = $select['username'];
        
        $select_user = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user_info WHERE phone = '$select[username]'"));
    	$old_wallet = $select_user['wallet'];
    	$new_amount = $old_wallet + $amount;
        
        $add_amount = mysqli_query($con,"UPDATE user_info SET wallet = '$new_amount' WHERE phone = '$user'");
	}
	
	$remark = "Bid Placed For ".$name;
	
	$select_wallet = mysqli_query($con,"DELETE FROM wallet_history WHERE date='$date' AND remark LIKE '%$remark%'");
    
    $select_bid = mysqli_query($con,"DELETE FROM user_bid_history WHERE game_name = '$name' AND date = '$date'");
?>
<script>
alert('Bids Reverted Successfully!');
    window.location = '../bid-revert.php';
</script>