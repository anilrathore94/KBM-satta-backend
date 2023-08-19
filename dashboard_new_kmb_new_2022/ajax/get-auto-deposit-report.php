<?php include('../config.php');

$date = mysqli_real_escape_string($con,$_POST['date']);


$select_user = mysqli_query($con,"SELECT * FROM user_auto_deposite WHERE txt_date  LIKE '%$date%'");
if(mysqli_num_rows($select_user) > 0){
    ?>
    <div class="col-12">

			<div class="card">

				<div class="card-body">

					<h4 class="card-title">Auto Deposit List
					<?php $sum = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(amount) as sum FROM user_auto_deposite WHERE txt_date  LIKE '%$date%'"));
					      $approve = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(amount) as sum FROM user_auto_deposite WHERE status='1' and txt_date  LIKE '%$date%'"));
					      $reject = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(amount) as sum FROM user_auto_deposite WHERE status='-1' and txt_date  LIKE '%$date%'"));
					      $pending = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(amount) as sum FROM user_auto_deposite WHERE status='0' and  txt_date  LIKE '%$date%'"));
					
					
					?>
					<badge class="btn btn-primary btn-sm btn-float clear_btn">Total Transfer Amount is ₹ <?php echo $sum['sum'];?></badge>
					<badge class="btn btn-success btn-sm btn-float clear_btn">Total Approved is ₹ <?php echo isset($approve['sum']) ? $approve['sum'] : '0';?></badge>
					<badge class="btn btn-danger btn-sm btn-float clear_btn">Total Rejected is ₹ <?php echo isset($reject['sum']) ? $reject['sum'] : '0';?></badge>
					<badge class="btn btn-warning btn-sm btn-float clear_btn">Total Pending is ₹ <?php echo isset($pending['sum']) ? $pending['sum']: '0';?></badge>
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
                                            	<th>Status</th>
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
            										<td><?php echo $select['txt_date'];?></td>
            										<td><?php if($select['status']=="1"){
					        ?><badge class="badge badge-success">Sent</badge><?php
					        }else if($select['status']=="-1"){ ?>
					            <badge class="badge badge-danger">Cancelled</badge>
					        <?php }else{
					        ?>
					            <badge class="badge badge-primary">Pending</badge>
					        <?php
					        } ?></td>
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