<?php include('../config.php');

$date = mysqli_real_escape_string($con,$_POST['date']);
$name = mysqli_real_escape_string($con,$_POST['name']);


$select_val = mysqli_query($con,"SELECT * FROM starline_winning_report WHERE date='$date' AND game_name='$name'");
if(mysqli_num_rows($select_val) > 0){
    ?>
    <div class="col-12">

			<div class="card">

				<div class="card-body">

					<h4 class="card-title">Starline Winning List
					</h4>

					<div class="table-responsive">

						<table id="resultHistory" class="table table-bordered">

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
    						                    <td><?php $select_u = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user_info WHERE phone ='$select[username]' ")); echo $select_u['name'];?></td>
    						                    <td><?php echo $select['game_name'];?></td>
    						                    <td><?php echo $select['game_type'];?></td>
    						                    <td><?php echo $select['pana'];?></td>
    						                    <td><?php echo $select['digit'];?></td>
    						                    <td><?php echo $select['winning_points'];?></td>
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
    //echo mysqli_error($con);
    echo "No Winners Found!!";
}
?>
