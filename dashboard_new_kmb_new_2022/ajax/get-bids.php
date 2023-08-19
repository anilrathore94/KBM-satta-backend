<style>
    .new{
       margin:10px;
    }
</style>
<?php include('../config.php');


$name = mysqli_real_escape_string($con,$_POST['name']);
$market = mysqli_real_escape_string($con,$_POST['market']);
if($market == "open_digit"){
    $session = "Open";
}else{
    $session = "Close";
}
$date = date('Y-m-d');

$select = mysqli_query($con,"SELECT * FROM user_bid_history WHERE date = '$date' AND game_name = '$name' AND session = '$session' AND game_type='Single Digit'");

if(mysqli_num_rows($select) > 0){
    
    ?>	
    
							<div class="row-2_5 tot_bit_boxs">
																<div class="col-md-2_5">
									<div class="card border card_0">
									    <?php $select_zero = mysqli_query($con,"SELECT * FROM user_bid_history WHERE date = '$date' AND game_name = '$name' AND $market = '0' AND session = '$session' AND game_type='Single Digit'");
							    if(mysqli_num_rows($select_zero)>0){
							        $bid_zero = mysqli_num_rows($select_zero);
							        $zero_amount = 0;
							        while($amount = mysqli_fetch_array($select_zero)){
							            $zero_amount = $zero_amount + $amount['points_action'];
							        }
							    }else{
							        $zero_amount = '0';
							        $bid_zero = '0';
							    }
							  
							    ?>
										<div class="card-header bg-transparent card_0">
											<h5 class="my-0 text-primary">Total Bids <span id="bid0"><?php echo $bid_zero;?></span></h5>
										</div>
										<div class="card-body">
											<h2 id="total0"><?php echo $zero_amount;?></h2>
											<h5 class="card-title mt-0">Total Bid Amount</h5>
											
										</div>
										<div class="card-footer-ank">Ank <span>0</span></div>
									</div>
								</div>
																<div class="col-md-2_5">
									<div class="card border card_1">
									    <?php $select_one = mysqli_query($con,"SELECT * FROM user_bid_history WHERE date = '$date' AND game_name = '$name' AND $market = '1' AND session = '$session' AND game_type='Single Digit'");
							    if(mysqli_num_rows($select_one)>0){
							        $bid_one = mysqli_num_rows($select_one);
							        $one_amount = 0;
							        while($amount = mysqli_fetch_array($select_one)){
							            $one_amount = $one_amount + $amount['points_action'];
							        }
							    }else{
							        $one_amount = '0';
							        $bid_one = '0';
							    }
							  
							    ?>
										<div class="card-header bg-transparent card_1">
											<h5 class="my-0 text-primary">Total Bids <span id="bid1"><?php echo $bid_one;?></span></h5>
										</div>
										<div class="card-body">
											<h2 id="total1"><?php echo $one_amount?></h2>
											<h5 class="card-title mt-0">Total Bid Amount</h5>
											
										</div>
										<div class="card-footer-ank">Ank <span>1</span></div>
									</div>
								</div>
																<div class="col-md-2_5">
									<div class="card border card_2">
									    <?php $select_two = mysqli_query($con,"SELECT * FROM user_bid_history WHERE date = '$date' AND game_name = '$name' AND $market = '2' AND session = '$session' AND game_type='Single Digit'");
							    if(mysqli_num_rows($select_two)>0){
							        $bid_two = mysqli_num_rows($select_two);
							        $two_amount = 0;
							        while($amount = mysqli_fetch_array($select_two)){
							            $two_amount = $two_amount + $amount['points_action'];
							        }
							    }else{
							        $two_amount = '0';
							        $bid_two = '0';
							    }
							  
							    ?>
										<div class="card-header bg-transparent card_2">
											<h5 class="my-0 text-primary">Total Bids <span id="bid2"><?php echo $bid_two; ?></span></h5>
										</div>
										<div class="card-body">
											<h2 id="total2"><?php echo $two_amount;?></h2>
											<h5 class="card-title mt-0">Total Bid Amount</h5>
											
										</div>
										<div class="card-footer-ank">Ank <span>2</span></div>
									</div>
								</div>
																<div class="col-md-2_5">
									<div class="card border card_3">
									    <?php $select_three = mysqli_query($con,"SELECT * FROM user_bid_history WHERE date = '$date' AND game_name = '$name' AND $market = '3' AND session = '$session' AND game_type='Single Digit'");
							    if(mysqli_num_rows($select_zero)>0){
							        $bid_three = mysqli_num_rows($select_three);
							        $three_amount = 0;
							        while($amount = mysqli_fetch_array($select_three)){
							            $three_amount = $three_amount + $amount['points_action'];
							        }
							    }else{
							        $three_amount = '0';
							        $bid_three = '0';
							    }
							  
							    ?>
										<div class="card-header bg-transparent card_3">
											<h5 class="my-0 text-primary">Total Bids <span id="bid3"><?php echo $bid_three;?></span></h5>
										</div>
										<div class="card-body">
											<h2 id="total3"><?php echo $three_amount;?></h2>
											<h5 class="card-title mt-0">Total Bid Amount</h5>
											
										</div>
										<div class="card-footer-ank">Ank <span>3</span></div>
									</div>
								</div>
																<div class="col-md-2_5">
									<div class="card border card_4">
									    <?php $select_four = mysqli_query($con,"SELECT * FROM user_bid_history WHERE date = '$date' AND game_name = '$name' AND $market = '4' AND session = '$session' AND game_type='Single Digit'");
							    if(mysqli_num_rows($select_four)>0){
							        $bid_four = mysqli_num_rows($select_four);
							        $four_amount = 0;
							        while($amount = mysqli_fetch_array($select_four)){
							            $four_amount = $four_amount + $amount['points_action'];
							        }
							    }else{
							        $four_amount='0';
							        $bid_four = '0';
							    }
							  
							    ?>
										<div class="card-header bg-transparent card_4">
											<h5 class="my-0 text-primary">Total Bids <span id="bid4"><?echo $bid_four?></span></h5>
										</div>
										<div class="card-body">
											<h2 id="total4"><?php echo $four_amount;?></h2>
											<h5 class="card-title mt-0">Total Bid Amount</h5>
											
										</div>
										<div class="card-footer-ank">Ank <span>4</span></div>
									</div>
								</div>
																<div class="col-md-2_5">
									<div class="card border card_5">
									    <?php $select_five = mysqli_query($con,"SELECT * FROM user_bid_history WHERE date = '$date' AND game_name = '$name' AND $market = '5' AND session = '$session' AND game_type='Single Digit'");
							    if(mysqli_num_rows($select_five)>0){
							        $bid_five = mysqli_num_rows($select_five);
							        $five_amount = 0;
							        while($amount = mysqli_fetch_array($select_five)){
							            $five_amount = $five_amount + $amount['points_action'];
							        }
							    }else{
							        $five_amount = '0';
							        $bid_five = '0';
							    }
							  
							    ?>
										<div class="card-header bg-transparent card_5">
											<h5 class="my-0 text-primary">Total Bids <span id="bid5"><?php echo $bid_five;?></span></h5>
										</div>
										<div class="card-body">
											<h2 id="total5"><?php echo $five_amount;?></h2>
											<h5 class="card-title mt-0">Total Bid Amount</h5>
											
										</div>
										<div class="card-footer-ank">Ank <span>5</span></div>
									</div>
								</div>
																<div class="col-md-2_5">
									<div class="card border card_6">
									    <?php $select_six = mysqli_query($con,"SELECT * FROM user_bid_history WHERE date = '$date' AND game_name = '$name' AND $market = '6' AND session = '$session' AND game_type='Single Digit'");
							    if(mysqli_num_rows($select_six)>0){
							        $bid_six = mysqli_num_rows($select_six);
							        $six_amount = 0;
							        while($amount = mysqli_fetch_array($select_six)){
							            $six_amount = $six_amount + $amount['points_action'];
							        }
							    }else{
							        $six_amount = '0';
							        $bid_six = '0';
							    }
							  
							    ?>
										<div class="card-header bg-transparent card_6">
											<h5 class="my-0 text-primary">Total Bids <span id="bid6"><?php echo $bid_six;?></span></h5>
										</div>
										<div class="card-body">
											<h2 id="total6"><?php echo $six_amount;?></h2>
											<h5 class="card-title mt-0">Total Bid Amount</h5>
											
										</div>
										<div class="card-footer-ank">Ank <span>6</span></div>
									</div>
								</div>
																<div class="col-md-2_5">
									<div class="card border card_7">
									    <?php $select_seven = mysqli_query($con,"SELECT * FROM user_bid_history WHERE date = '$date' AND game_name = '$name' AND $market = '7' AND session = '$session' AND game_type='Single Digit'");
							    if(mysqli_num_rows($select_seven)>0){
							        $bid_seven = mysqli_num_rows($select_seven);
							        $seven_amount = 0;
							        while($amount = mysqli_fetch_array($select_seven)){
							            $seven_amount = $seven_amount + $amount['points_action'];
							        }
							    }else{
							        $seven_amount='0';
							        $bid_seven = '0';
							    }
							  
							    ?>
										<div class="card-header bg-transparent card_7">
											<h5 class="my-0 text-primary">Total Bids <span id="bid7"><?php echo $bid_seven;?></span></h5>
										</div>
										<div class="card-body">
											<h2 id="total7"><?php echo $seven_amount;?></h2>
											<h5 class="card-title mt-0">Total Bid Amount</h5>
											
										</div>
										<div class="card-footer-ank">Ank <span>7</span></div>
									</div>
								</div>
																<div class="col-md-2_5">
									<div class="card border card_8">
									    <?php $select_eight = mysqli_query($con,"SELECT * FROM user_bid_history WHERE date = '$date' AND game_name = '$name' AND $market = '8' AND session = '$session' AND game_type='Single Digit'");
							    if(mysqli_num_rows($select_eight)>0){
							        $bid_eight = mysqli_num_rows($select_eight);
							        $eight_amount = 0;
							        while($amount = mysqli_fetch_array($select_eight)){
							            $eight_amount = $eight_amount + $amount['points_action'];
							        }
							    }else{
							        $eight_amount = '0';
							        $bid_eight = '0';
							    }
							  
							    ?>
										<div class="card-header bg-transparent card_8">
											<h5 class="my-0 text-primary">Total Bids <span id="bid8"><?php echo $bid_eight;?></span></h5>
										</div>
										<div class="card-body">
											<h2 id="total8"><?php echo $eight_amount;?></h2>
											<h5 class="card-title mt-0">Total Bid Amount</h5>
											
										</div>
										<div class="card-footer-ank">Ank <span>8</span></div>
									</div>
								</div>
																<div class="col-md-2_5">
									<div class="card border card_9">
									    <?php $select_nine = mysqli_query($con,"SELECT * FROM user_bid_history WHERE date = '$date' AND game_name = '$name' AND $market = '9' AND session = '$session' AND game_type='Single Digit'");
							    if(mysqli_num_rows($select_nine)>0){
							        $bid_nine = mysqli_num_rows($select_nine);
							        $nine_amount = 0;
							        while($amount = mysqli_fetch_array($select_nine)){
							            $nine_amount = $nine_amount + $amount['points_action'];
							        }
							    }else{
							        $nine_amount='0';
							        $bid_nine = '0';
							    }
							  
							    ?>
										<div class="card-header bg-transparent card_9">
											<h5 class="my-0 text-primary">Total Bids <span id="bid9"><?php echo $bid_nine;?></span></h5>
										</div>
										<div class="card-body">
											<h2 id="total9"><?php echo $nine_amount;?></h2>
											<h5 class="card-title mt-0">Total Bid Amount</h5>
											
										</div>
										<div class="card-footer-ank">Ank <span>9</span></div>
									</div>
								</div>
															</div>
    <?php
}else{
    ?>	
	<div class="row-2_5 tot_bit_boxs">
																<div class="col-md-2_5">
									<div class="card border card_0">
										<div class="card-header bg-transparent card_0">
											<h5 class="my-0 text-primary">Total Bids <span id="bid0">0</span></h5>
										</div>
										<div class="card-body">
											<h2 id="total0">0</h2>
											<h5 class="card-title mt-0">Total Bid Amount</h5>
											
										</div>
										<div class="card-footer-ank">Ank <span>0</span></div>
									</div>
								</div>
																<div class="col-md-2_5">
									<div class="card border card_1">
										<div class="card-header bg-transparent card_1">
											<h5 class="my-0 text-primary">Total Bids <span id="bid1">0</span></h5>
										</div>
										<div class="card-body">
											<h2 id="total1">0</h2>
											<h5 class="card-title mt-0">Total Bid Amount</h5>
											
										</div>
										<div class="card-footer-ank">Ank <span>1</span></div>
									</div>
								</div>
																<div class="col-md-2_5">
									<div class="card border card_2">
										<div class="card-header bg-transparent card_2">
											<h5 class="my-0 text-primary">Total Bids <span id="bid2">0</span></h5>
										</div>
										<div class="card-body">
											<h2 id="total2">0</h2>
											<h5 class="card-title mt-0">Total Bid Amount</h5>
											
										</div>
										<div class="card-footer-ank">Ank <span>2</span></div>
									</div>
								</div>
																<div class="col-md-2_5">
									<div class="card border card_3">
										<div class="card-header bg-transparent card_3">
											<h5 class="my-0 text-primary">Total Bids <span id="bid3">0</span></h5>
										</div>
										<div class="card-body">
											<h2 id="total3">0</h2>
											<h5 class="card-title mt-0">Total Bid Amount</h5>
											
										</div>
										<div class="card-footer-ank">Ank <span>3</span></div>
									</div>
								</div>
																<div class="col-md-2_5">
									<div class="card border card_4">
										<div class="card-header bg-transparent card_4">
											<h5 class="my-0 text-primary">Total Bids <span id="bid4">0</span></h5>
										</div>
										<div class="card-body">
											<h2 id="total4">0</h2>
											<h5 class="card-title mt-0">Total Bid Amount</h5>
											
										</div>
										<div class="card-footer-ank">Ank <span>4</span></div>
									</div>
								</div>
																<div class="col-md-2_5">
									<div class="card border card_5">
										<div class="card-header bg-transparent card_5">
											<h5 class="my-0 text-primary">Total Bids <span id="bid5">0</span></h5>
										</div>
										<div class="card-body">
											<h2 id="total5">0</h2>
											<h5 class="card-title mt-0">Total Bid Amount</h5>
											
										</div>
										<div class="card-footer-ank">Ank <span>5</span></div>
									</div>
								</div>
																<div class="col-md-2_5">
									<div class="card border card_6">
										<div class="card-header bg-transparent card_6">
											<h5 class="my-0 text-primary">Total Bids <span id="bid6">0</span></h5>
										</div>
										<div class="card-body">
											<h2 id="total6">0</h2>
											<h5 class="card-title mt-0">Total Bid Amount</h5>
											
										</div>
										<div class="card-footer-ank">Ank <span>6</span></div>
									</div>
								</div>
																<div class="col-md-2_5">
									<div class="card border card_7">
										<div class="card-header bg-transparent card_7">
											<h5 class="my-0 text-primary">Total Bids <span id="bid7">0</span></h5>
										</div>
										<div class="card-body">
											<h2 id="total7">0</h2>
											<h5 class="card-title mt-0">Total Bid Amount</h5>
											
										</div>
										<div class="card-footer-ank">Ank <span>7</span></div>
									</div>
								</div>
																<div class="col-md-2_5">
									<div class="card border card_8">
										<div class="card-header bg-transparent card_8">
											<h5 class="my-0 text-primary">Total Bids <span id="bid8">0</span></h5>
										</div>
										<div class="card-body">
											<h2 id="total8">0</h2>
											<h5 class="card-title mt-0">Total Bid Amount</h5>
											
										</div>
										<div class="card-footer-ank">Ank <span>8</span></div>
									</div>
								</div>
																<div class="col-md-2_5">
									<div class="card border card_9">
										<div class="card-header bg-transparent card_9">
											<h5 class="my-0 text-primary">Total Bids <span id="bid9">0</span></h5>
										</div>
										<div class="card-body">
											<h2 id="total9">0</h2>
											<h5 class="card-title mt-0">Total Bid Amount</h5>
											
										</div>
										<div class="card-footer-ank">Ank <span>9</span></div>
									</div>
								</div>
															</div>
    <?php
}
?>
