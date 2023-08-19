<?php include('../config.php');
$date = mysqli_real_escape_string($con,$_POST['date']);
$name = mysqli_real_escape_string($con,$_POST['name']);
$session = mysqli_real_escape_string($con,$_POST['session']);
$open_pana = mysqli_real_escape_string($con,$_POST['open_pana']);
$close_pana = mysqli_real_escape_string($con,$_POST['close_pana']);
if($open_pana == "null"){
    $open_result = "";
    $open_pana = "";
}else{
    
        $value = $open_pana;
        $sum = 0;
        while($value) {
            $sum += $value % 10;
            $value = floor($value / 10);
        }
        $lastDigit = substr($sum,-1);;
        $open_result = $lastDigit;
}
if($close_pana == "null"){
    $close_result = "";
    $close_pana = "";
}else{
    $value = $close_pana;
        $sum = 0;
        while($value) {
            $sum += $value % 10;
            $n = $value / 10;
            $value = floor($n);
        }
        $lastDigit = substr($sum,-1);
        $close_result = $lastDigit;
}
if($session == "open"){
    $select_val = mysqli_query($con,"SELECT * FROM user_bid_history WHERE date='$date' AND game_name='$name' AND (open_pana = '$open_pana' OR (open_digit = '$open_result' AND close_digit = 'NA'))");
}
if($session == "close"){
    $select_val = mysqli_query($con,"SELECT * FROM user_bid_history WHERE date='$date' AND game_name='$name' AND ((close_pana = '$close_pana' OR (close_digit = '$close_result' AND open_digit = 'NA'))OR(open_digit = '$open_result' AND close_digit = '$close_result')OR(open_digit = '$open_result' AND close_pana = '$close_pana')OR(open_pana = '$open_pana' AND close_pana = '$close_pana'))");
}
if(mysqli_num_rows($select_val) > 0){
    ?>
    <div class="col-12">

			<div class="card">

				<div class="card-body">

					<h4 class="card-title">Winning Prediction List
					</h4>
					
					<div class="mt-3">
						<div class="bs_box bs_box_light">
							<i class="mdi mdi-gavel mr-1"></i> 
							<span>Total Bid Amount</span>
							<b><span id="t_bid"><?php 
							if($session == "open"){
                                $select_val1 = mysqli_query($con,"SELECT * FROM user_bid_history WHERE date='$date' AND game_name='$name' AND (open_pana = '$open_pana' OR (open_digit = '$open_result' AND close_digit = 'NA'))");
                            }
                            if($session == "close"){
                                $select_val1 = mysqli_query($con,"SELECT * FROM user_bid_history WHERE date='$date' AND game_name='$name' AND ((close_pana = '$close_pana' OR (close_digit = '$close_result' AND open_digit = 'NA'))OR(open_digit = '$open_result' AND close_digit = '$close_result')OR(open_digit = '$open_result' AND close_pana = '$close_pana')OR(open_pana = '$open_pana' AND close_pana = '$close_pana'))");
                            }
							$bid = 0;
							while($select = mysqli_fetch_array($select_val1)){
							$bid = $bid + $select['points_action'];
							} echo $bid; ?></span></b>
						</div>
						
						<div class="bs_box bs_box_light">
							<i class="mdi mdi-wallet mr-1"></i> 
							<span>Total Winning Amount</span>
							<b><span id="t_winneing_amt"><?php
							if($session == "open"){
                                $select_val2 = mysqli_query($con,"SELECT * FROM user_bid_history WHERE date='$date' AND game_name='$name' AND (open_pana = '$open_pana' OR (open_digit = '$open_result' AND close_digit = 'NA'))");
                            }
                            if($session == "close"){
                                $select_val2 = mysqli_query($con,"SELECT * FROM user_bid_history WHERE date='$date' AND game_name='$name' AND ((close_pana = '$close_pana' OR (close_digit = '$close_result' AND open_digit = 'NA'))OR(open_digit = '$open_result' OR close_digit = '$close_result')OR(open_digit = '$open_result' AND close_digit = '$close_result')OR(open_digit = '$open_result' AND close_pana = '$close_pana')OR(open_pana = '$open_pana' AND close_pana = '$close_pana'))");
                            }
							$win_sum = 0;
							while($select = mysqli_fetch_array($select_val2)){
							    $select_win1 = mysqli_query($con,"SELECT * FROM game_rates WHERE type='$select[game_type]'");
							    while($win1 = mysqli_fetch_array($select_win1)){
    						        $win_amount1 = ($win1['max_value']/$win1['min_value'])*$select['points_action'];
							        $win_sum = $win_sum  + $win_amount1;
							    }
							}
							echo $win_sum; ?></span></b>
						</div>
					</div>

					<div class="dt-ext table-responsive">

						<table id="resultHistory" class="table table-striped table-bordered">

							<thead> 

								<tr>
                                    <th>Date</th>
                                    <th>User Phone</th>
									<th>User Name</th>
									<th>Game Type</th>
									<th>Points Action</th>
									<th>Winning Amount</th>
									<!--<th>Edit</th>-->

								</tr>

							</thead>

							<tbody>

							<?php 
						            while($select = mysqli_fetch_array($select_val)){
    						            ?>
    						                <tr>
    						                    <td><?php echo $select['date'];?></td>
    						                    <td><?php echo $select['username'];?></td>
    						                    <td><?php $select_u = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user_info WHERE phone ='$select[username]' ")); echo $select_u['name'];?></td>
    						                    <td><?php echo $select['game_type'];?></td>
    						                    <td><?php echo $select['points_action'];?></td>
    						                    <td><?php $select_win = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM game_rates WHERE type='$select[game_type]'"));
    						                    $win_amount = ($select_win['max_value']/$select_win['min_value'])*$select['points_action'];
    						                    echo $win_amount;?></td>
    						                    <!--<td><a href="edit_bid.php?id=<?php echo $select['id'];?>">EDIT BID</a></td>-->
    						                   
    						                </tr>
    						            <?php
						            }
						        ?>

							</tbody>

						</table>

					</div>

				</div>

			</div>

		</div>
    <?php
    
}else{
    echo "No Winners Found!!";
}

?>