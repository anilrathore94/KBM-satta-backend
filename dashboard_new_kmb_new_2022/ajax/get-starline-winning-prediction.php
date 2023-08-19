<?php include('../config.php');
$date = mysqli_real_escape_string($con,$_POST['date']);
$name = mysqli_real_escape_string($con,$_POST['name']);
$session = mysqli_real_escape_string($con,$_POST['session']);
$open_pana = mysqli_real_escape_string($con,$_POST['open_pana']);
//$close_pana = mysqli_real_escape_string($con,$_POST['close_pana']);

    
        $value = $open_pana;
        $sum = 0;
        while($value) {
            $sum += $value % 10;
            $value = floor($value / 10);
        }
        $lastDigit = substr($sum,-1);;
        $open_result = $lastDigit;

$select_val = mysqli_query($con,"SELECT * FROM starline_bid_history WHERE date='$date' AND game_name='$name' AND (pana = '$open_pana' OR digit = '$open_result')");

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
							$select_val1 = mysqli_query($con,"SELECT * FROM starline_bid_history WHERE date='$date' AND game_name='$name' AND (pana = '$open_pana' OR digit = '$open_result')");
                            
							$bid = 0;
							while($select = mysqli_fetch_array($select_val1)){
							$bid = $bid + $select['points_action'];
							} echo $bid; ?></span></b>
						</div>
						
						<div class="bs_box bs_box_light">
							<i class="mdi mdi-wallet mr-1"></i> 
							<span>Total Winning Amount</span>
							<b><span id="t_winneing_amt"><?php
							$select_val2 = mysqli_query($con,"SELECT * FROM starline_bid_history WHERE date='$date' AND game_name='$name' AND (pana = '$open_pana' OR digit = '$open_result')");
                            
							$win_sum = 0;
							while($select = mysqli_fetch_array($select_val2)){
							    $select_win1 = mysqli_query($con,"SELECT * FROM starline_game_rates WHERE type='$select[game_type]'");
							    while($win1 = mysqli_fetch_array($select_win1)){
    						        $win_amount1 = ($win1['max_value']/$win1['min_value'])*$select['points_action'];
							        $win_sum = $win_sum  + $win_amount1;
							    }
							}
							echo $win_sum; ?></span></b>
						</div>
					</div>

					<div class="table-responsive">

						<table id="resultHistory" class="table table-bordered">

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
    						                    <td><?php $select_u = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user_info WHERE phone ='$select[username]' ")); echo $select_u['name'];?>  <a href="view-user.php?id=<?php echo $select_u['id'];?>"><i class="fa fa-external-link" aria-hidden="true"></i></a></td>
    						                    <td><?php echo $select['game_type'];?></td>
    						                    <td><?php echo $select['points_action'];?></td>
    						                    <td><?php $select_win = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM starline_game_rates WHERE type='$select[game_type]'"));
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
<script>
    $(document).ready( function () {
    $('#resultHistory').DataTable();
} );
</script>