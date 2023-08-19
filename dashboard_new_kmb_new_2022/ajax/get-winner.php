<?php include('../config.php');

$date = mysqli_real_escape_string($con,$_POST['date']);
$name = mysqli_real_escape_string($con,$_POST['name']);
$session = mysqli_real_escape_string($con,$_POST['session']);
$pana = mysqli_real_escape_string($con,$_POST['pana']);
$digit = mysqli_real_escape_string($con,$_POST['digit']);

if($session == "open"){
    $select_val = mysqli_query($con,"SELECT * FROM user_bid_history WHERE date='$date' AND game_name='$name' AND (open_pana = '$pana' OR (open_digit = '$digit' AND close_digit = 'NA'))");
}

if($session == "close"){
    $select_result = mysqli_query($con,"SELECT * FROM result_chart WHERE game_name = '$name' AND date = '$date'");
    if(mysqli_num_rows($select_result)>0){
        $res = mysqli_fetch_array($select_result);
        $open_pana = $res['open_panna'];
        $open_digit = $res['open_digit'];
        
        $select_val = mysqli_query($con,"SELECT * FROM user_bid_history WHERE date='$date' AND game_name='$name' AND ((close_pana = '$pana' OR (close_digit = '$digit' AND open_digit ='NA'))OR(open_digit = '$open_digit' AND close_digit = '$digit')OR(open_digit = '$open_digit' AND close_pana = '$pana')OR(open_pana = '$open_pana' AND close_pana = '$pana'))");
    }else{
        $select_val = mysqli_query($con,"SELECT * FROM user_bid_history WHERE date='$date' AND game_name='$name' AND (close_pana = '$pana' OR (close_digit = '$digit' AND open_digit ='NA'))");
    }
}


if(mysqli_num_rows($select_val) > 0){
    ?>
    <div class="col-12">

			<div class="card">

				<div class="card-body">

					<h4 class="card-title">Winning List
					</h4>

					<div class="dt-ext table-responsive">

						<table id="winnerHistory" class="table table-striped table-bordered">

							<thead> 

								<tr>
                                    <th>Date</th>
                                    <th>User Phone</th>
									<th>User Name</th>
                                    <th>Game Name</th>
									<th>Game Type</th>
									<th>Open Pana</th>
									<th>Open Digit</th>
									<th>Close Pana</th>
									<th>Close Digit</th>
									<th>Winning Amount</th>
									<th>Points</th>
									<th>Edit</th>

								</tr>

							</thead>

							<tbody id="result_data">

							<?php 
						            while($select = mysqli_fetch_array($select_val)){
    						            ?>
    						                <tr>
    						                    <td><?php echo $select['date'];?></td>
    						                    <td><?php echo $select['username'];?></td>
    						                    <td><?php $select_u = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user_info WHERE phone ='$select[username]' ")); echo $select_u['name'];?>  <a href="view-user.php?id=<?php echo $select_u['id'];?>"><i class="fa fa-external-link" aria-hidden="true"></i></a></td>
    						                    <td><?php echo $select['game_name'];?></td>
    						                    <td><?php echo $select['game_type'];?></td>
    						                    <td><?php echo $select['open_pana'];?></td>
    						                    <td><?php echo $select['open_digit'];?></td>
    						                    <td><?php echo $select['close_pana'];?></td>
    						                    <td><?php echo $select['close_digit'];?></td>
    						                    <td><?php $select_win = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM game_rates WHERE type='$select[game_type]'"));
    						                    $win_amount = ($select_win['max_value']/$select_win['min_value'])*$select['points_action'];
    						                    echo $win_amount;?></td>
    						                    <td><?php echo $select['points_action'];?></td>
    						                    <td><a href="edit_bid.php?id=<?php echo $select['id'];?>">EDIT BID</a></td>
    						                   
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