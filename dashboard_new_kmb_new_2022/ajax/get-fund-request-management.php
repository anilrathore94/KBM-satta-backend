<?php include('../config.php');

$date = mysqli_real_escape_string($con,$_POST['date']);


$select_user = mysqli_query($con,"SELECT * FROM user_fund_request WHERE date  LIKE '%$date%'");
if(mysqli_num_rows($select_user) > 0){
    ?>
    <div class="col-12">

			<div class="card">

				<div class="card-body">

					<h4 class="card-title">Fund Request List
					<?php $sum = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(amount) as sum FROM user_fund_request WHERE date  LIKE '%$date%'"))?>
					<badge class="btn btn-primary btn-sm btn-float clear_btn">Total Amount is ₹ <?php echo $sum['sum'];?></badge>
					</h4>

					<div class="dt-ext table-responsive">

						<table id="resultHistory" class="table table-striped table-bordered">

							<thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>User Name</th>
                                                <th>Phone Number</th>
                                                <th>Amount</th>
                                                <th>Points</th>
                                                <th>Receipt Image</th>
												<th> date</th>
                                                <th>status</th>
                                                <th>Action</th>
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
            										$select_u = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user_info WHERE phone='$select[username]'"));
            										echo $select_u['name'];?>  <a href="view-user.php?id=<?php echo $select_u['id'];?>"><i class="fa fa-external-link" aria-hidden="true"></i></a></td>
            										<td><?php echo $select['username'];?></td>
            										<td><?php echo $select['amount'];?></td>
            										<td><?php echo $select['points'];?></td>
            										<td><?php echo $select['receipe_image'];?></td>
            										<td><?php echo $select['date'];?></td>
            										<td><?php if($select['status']=="1"){
                            					        ?><badge class="badge badge-success">Accepted</badge><?php
                            					        }else if($select['status']=="0"){ ?>
                            					            <badge class="badge badge-danger">Pending</badge>
                            					        <?php }else{ ?>
                            					            <badge class="badge badge-danger">Rejected</badge>
                            					        <?php
                            					        }?></td>
                            					        <td><button class="btn btn-success btn-xs accept" onclick="window.location.href = 'status/edit-fund-request.php?id=<?php echo $select['id'];?>';" <?php if(!$select['status']=="0"){echo 'disabled';}?> id="accept">Approve</button>

								<button class="btn btn-danger btn-xs reject" onclick="window.location.href = 'status/edit-fund-request.php?id=<?php echo $select['id'];?>';" <?php if(!$select['status']=="0"){echo 'disabled';}?> id="reject">Reject</button></td>
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