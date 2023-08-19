<?php include('../config.php');

$date = mysqli_real_escape_string($con,$_POST['date']);
$name = mysqli_real_escape_string($con,$_POST['name']);
$pana = mysqli_real_escape_string($con,$_POST['pana']);
$digit = mysqli_real_escape_string($con,$_POST['digit']);

$select_val = mysqli_query($con,"SELECT * FROM starline_bid_history WHERE date='$date' AND game_name='$name' AND (pana = '$pana' OR digit = '$digit')");

if(mysqli_num_rows($select_val) > 0){
    ?>
    <div class="col-12">

			<div class="card">

				<div class="card-body">

					<h4 class="card-title">Winning List
					</h4>

					<div class="dt-ext table-responsive">

						<table id="resultHistory" class="table table-striped table-bordered">

							<thead> 

								<tr>
                                    <th>Date</th>
                                    <th>User Phone</th>
									<th>User Name</th>
                                    <th>Game Name</th>
									<th>Game Type</th>
									<th>Pana</th>
									<th>Digit</th>
									<th>Winning Amount</th>
									<th>Points</th>

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
    						                    <td><?php echo $select['pana'];?></td>
    						                    <td><?php echo $select['digit'];?></td>
    						                    <td><?php $select_win = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM starline_game_rates WHERE type='$select[game_type]'"));
    						                    $win_amount = ($select_win['max_value']/$select_win['min_value'])*$select['points_action'];
    						                    echo $win_amount;?></td>
    						                    <td><?php echo $select['points_action'];?></td>
    						                   
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