<?php include('../config.php');

$date = mysqli_real_escape_string($con,$_POST['date']);


//$select_user = mysqli_query($con,"SELECT * FROM user_withdraw_request WHERE date  = '$date'");
$select_user = mysqli_query($con,"SELECT * FROM wallet_history WHERE date  = '$date' AND remark LIKE '%Points Added By Admin %'");
if(mysqli_num_rows($select_user) > 0){
    ?>
    <div class="col-12">

			<div class="card">

				<div class="card-body">

					<h4 class="card-title">Add Fund List
					</h4>

					<div class="dt-ext table-responsive">

						<table id="resultHistory" class="table table-striped table-bordered">

							<thead>
                                            <tr>
                                                <th>S.No.</th>
                                               <th>User Name</th>
                                               <th>Phone Number</th>
                                            	<th>Amount</th>
                                            	<th>Date</th>
                                            </tr>
                                           </thead>
								           <tbody>
									<?php 
								    
								            $i = 1;
								            while($select = mysqli_fetch_array($select_user)){
								                
								                ?>
								                <tr>
            										<td><?php echo $i;?></td>
            										<td><?php
            										$select_u = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user_info WHERE phone='$select[phone_number]'"));
            										echo $select_u['name'];?>  <a href="view-user.php?id=<?php echo $select_u['id'];?>"><i class="fa fa-external-link" aria-hidden="true"></i></a></td>
            										<td><?php echo $select['phone_number'];?></td>
            										<td><?php echo $select['amount'];?></td>
            										<td><?php echo $select['date'];?></td>
            										
            									</tr>
								                <?php
								                $i++;
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
    echo mysqli_error($con);
}

?>