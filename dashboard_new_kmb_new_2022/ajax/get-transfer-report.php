<?php include('../config.php');

$date = mysqli_real_escape_string($con,$_POST['date']);


$select_val = mysqli_query($con,"SELECT * FROM wallet_history WHERE date='$date' AND remark LIKE '%Points Transferred%' AND amount > 0");
if(mysqli_num_rows($select_val) > 0){
    ?>
    <div class="col-12">

			<div class="card">
			    <?php $sum = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(amount) as sum FROM wallet_history WHERE date='$date' AND remark LIKE '%Points Transferred%' AND amount > 0"))?>

				<div class="card-body">
                    <h4 class="card-title d-flex align-items-center justify-content-between">Transfer List
          <badge class="btn btn-primary waves-effect waves-light btn-sm">Total Transfer Amount:<i class="bx bx-rupee" aria-hidden="true"></i><span class="totalamt"><?php echo $sum['sum'];?></span></badge>
          </h4>
					

					<div class="dt-ext table-responsive">

						<table id="resultHistory" class="table table-striped table-bordered">

							<thead> 

								<tr>
								    
                                    <th>#</th>
                                    <th>Sender Name</th>
									<th>Receiver Name</th>
                                    <th>Amount</th>
									<th>Date</th>

								</tr>

							</thead>

							<tbody id="result_data">

							<?php $i=1;
						            while($select = mysqli_fetch_array($select_val)){
    						            ?>
    						                <tr>
    						                    <td><?php echo $i;?></td>
    						                    <?php $newstring = substr($select['remark'], -10);?>
    						                    <td><?php $select_u = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user_info WHERE phone ='$newstring' ")); echo $select_u['name'];?>  <a href="view-user.php?id=<?php echo $select_u['id'];?>"><i class="fa fa-external-link" aria-hidden="true"></i></a></td>
    						                    <td><?php $select_u1 = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user_info WHERE phone ='$select[phone_number]' ")); echo $select_u1['name'];?>  <a href="view-user.php?id=<?php echo $select_u1['id'];?>"><i class="fa fa-external-link" aria-hidden="true"></i></a></td>
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
    echo "No Report Found";
}

?>