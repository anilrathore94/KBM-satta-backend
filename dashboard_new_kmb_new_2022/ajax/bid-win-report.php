<?php include('../config.php');

$date = mysqli_real_escape_string($con,$_POST['date']);
$name = mysqli_real_escape_string($con,$_POST['name']);

?>

		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
					    <div class="row">
					        <div class="col-md-6">
    							<div class="bid_history_box bhb_bid_amt" style="border: 1px dotted black;padding: 2px; margin:5px;">
    								<div class="row" style="align-items: baseline; padding:5px;">
    								    <div class="col-md-6">    
    								     <h5 class="text-muted font-weight-medium">Total Bid Amount</h5>
    								    </div>
    								    <div class="col-md-3"> 
    								    <?php 
    								    $bid = 0;
    								    if($name === "all"){
                                            $select_bid = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(points_action) AS bid FROM user_bid_history WHERE date='$date'"));
                                        }else{
                                            $select_bid = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(points_action) AS bid FROM user_bid_history WHERE date='$date' AND game_name='$name'"));
                                        }
    								    
    								    if($select_bid['bid']==""){
    								        $bid = 0;
    								    }else{
    								        $bid = $select_bid['bid'];
    								    }
    								    ?>
    								        <h5 id="total_bid_amt"><i class="bx bx-rupee"></i>₹ <?php echo $bid;?></h5>
    								    </div>
    								    <div class="col-md-3 text-sm-right"> 
    								     <button type="button" class="btn btn-primary waves-light btn-xs" onclick="OpenBidHistory();">View</button>
    								     </div>
    								</div>
    							</div>
    							<div class="bid_history_box bhb_win_amt"  style="border: 1px dotted black;padding: 2px; margin:5px;">
    							    <div class="row" style="align-items: baseline; padding:5px;">
    								    <div class="col-md-6">   
    								        <h5 class="text-muted font-weight-medium">Total Win Amount</h5>
        								</div>
        								<div class="col-md-3">
        								    
        								    <?php
        								    $win = 0;
        								    if($name === "all"){
        								        $select_win = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(winning_points) AS win FROM user_winning_report WHERE date='$date'"));
        								    }else{
        								        $select_win = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(winning_points) AS win FROM user_winning_report WHERE date='$date' AND game_name='$name'"));
        								    }
    								    if($select_win['win'] == ""){
    								        $win = 0;
    								    }else{
    								        $win = $select_win['win'];
    								    }
    								    ?>
        								    <h5 class="mb-0" id="total_win_amt"><i class="bx bx-rupee"></i>₹ <?php echo $win;?></h5>
        								</div>
        								<div class="col-md-3 text-sm-right">
        								    <button type="button" class="btn btn-primary waves-light btn-xs" onclick="OpenWinHistoryDetails();">View</button>
    								    </div>
    								</div>
    							</div>
    							<?php if($win > $bid){
    							?>
    							<div class="bid_history_area"><div class="bid_history_box bhb_lose_amt"  style="border: 2px solid orange;padding: 2px; margin:5px;"><div class="row" style="align-items: baseline; padding:5px;"><div class="col-md-6"><h5 class="font-weight-medium">Total Loss Amount</h5></div><div class="col-md-3"><h5 class="mb-0" id="total_loss_amt"><i class="bx bx-rupee"></i><?php echo $bid-$win;?></h5></div><div class="col-md-3"></div></div></div></div>
    							<?
    							}else{
    							?>
    							<div class="bid_history_area"><div class="bid_history_box bhb_profit_amt"  style="border: 2px solid green;padding: 2px; margin:5px;"><div class="row" style="align-items: baseline; padding:5px;"><div class="col-md-6"><h5 class="font-weight-medium">Total Profit Amount</h5></div><div class="col-md-3"><h5 class="mb-0" id="total_profit_amt"><i class="bx bx-rupee"></i><?php echo $bid-$win;?></h5></div><div class="col-md-3"></div></div></div></div>
    							<?
    							}?>
    							
    							
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>

