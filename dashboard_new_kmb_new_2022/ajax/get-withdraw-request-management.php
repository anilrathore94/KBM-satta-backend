<?php include('../config.php');

$date = mysqli_real_escape_string($con,$_POST['date']);


$select_user = mysqli_query($con,"SELECT * FROM user_withdraw_request WHERE date  LIKE '%$date%'");
if(mysqli_num_rows($select_user) > 0){
    ?>
    <div class="col-12">

			<div class="card">

				<div class="card-body">

					<h4 class="card-title">Withdraw Request List
					<?php $sum = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(points) as sum FROM user_withdraw_request WHERE date  LIKE '%$date%'"));
					      $approve = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(points) as sum FROM user_withdraw_request WHERE status='1' and date  LIKE '%$date%'"));
					      $reject = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(points) as sum FROM user_withdraw_request WHERE status='-1' and date  LIKE '%$date%'"));
					      $pending = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(points) as sum FROM user_withdraw_request WHERE status='0' and  date  LIKE '%$date%'"));
					
					
					?>
					<badge class="btn btn-primary btn-sm btn-float clear_btn">Total Amount is ₹ <?php echo $sum['sum'];?></badge>
					<badge class="btn btn-success btn-sm btn-float clear_btn">Total Approved is ₹ <?php echo isset($approve['sum']) ? $approve['sum'] : '0';?></badge>
					<badge class="btn btn-danger btn-sm btn-float clear_btn">Total Rejected is ₹ <?php echo isset($reject['sum']) ? $reject['sum'] : '0';?></badge>
					<badge class="btn btn-warning btn-sm btn-float clear_btn">Total Pending is ₹ <?php echo isset($pending['sum']) ? $pending['sum']: '0';?></badge>
					</h4>
					<div class="dt-ext table-responsive">

						<table id="resultHistory" class="table table-striped table-bordered">

							           <thead>
                						  <tr>
                							<th>#</th>
                							<th>User Name</th>
                							<th>Mobile</th>
                							<th>Amount</th>
                							<th>Request No.</th>
                							<th>Date</th>
                							<th>Status</th>
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
                        					        <td><?php echo $select['points'];?></td>
                        					        <td><?php echo $select['id'];?></td>
                        					        <td><?php echo $select['date'];?></td>
            										<td><?php if($select['status']=="1"){
                        					        ?><badge class="badge badge-success">Accepted</badge><?php
                        					        }else if($select['status']=="0"){ ?>
                        					            <badge class="badge badge-danger">Pending</badge>
                        					        <?php }else{ ?>
                        					            <badge class="badge badge-danger">Rejected</badge>
                        					        <?php
                        					        }?></td>
                        					        <td>
                        					            <?php $name = $select_u['name'];
                        					            $amount = $select['points'];
                        					            $request_no = $select['id'];
                        					            $no = $select_u['phone'];
                        					            $date = $select['date'];?>
                        					           <button class="btn btn-success btn-xs accept" <?php if(!$select['status']=="0"){echo 'disabled';}?> onclick="Approve('<?php echo $select['id'];?>');">Approve</button>
                        
                        								<button class="btn btn-danger btn-xs reject" <?php if(!$select['status']=="0"){echo 'disabled';}?> onclick="Reject('<?php echo $select['id'];?>');">Reject</button>
                        								<a id="newModal" data-toggle="modal" data-id="<?php echo $select['id'];?>" data-target="#myModal" data-name="<?php echo $name;?>" data-amount="<?php echo $amount;?>" data-request="<?php echo $request_no;?>" data-no="<?php echo $no;?>" data-date="<?php echo $date;?>"><span class="badge badge-rounded badge-outline-primary"><i class="mdi mdi-eye font-size-18"></i></span></a>
                        							<!--<a onclick="return confirm('Are you sure you want to delete?')" href="delete/delete-withdraw-request.php?id=<?php echo $select['id'];?>"><button class="btn btn-danger btn-xs">Delete</button></a>-->
                        							<!--<a href="action-code/approve-withdraw-request.php?id=<?php echo $select['id'];?>"></a><button class="btn btn-success btn-xs accept" <?php if(!$select['status']=="0"){echo 'disabled';}?> id="accept" data-toggle="modal" data-target="#requestApproveModel" data-id="<?php echo $select['id'];?>">Approve</button>
                        
                        								<button class="btn btn-danger btn-xs reject" <?php if(!$select['status']=="0"){echo 'disabled';}?> id="reject" data-toggle="modal" data-target="#requestRejectModel" data-id="<?php echo $select['id'];?>">Reject</button>-->
                        											
                        							</td>
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
<script>
	$(document).on("click", "#newModal", function () {
     var name = $(this).data('name');
      var  amount = $(this).data('amount');
      var request = $(this).data('request');
      var no = $(this).data('no'); 
      var date = $(this).data('date');
     $(".modal-body #Name").html( name );
     $(".modal-body #Amount").html( amount );
     $(".modal-body #Request").html( request );$(".modal-body #No").html( no );
     $(".modal-body #Date").html( date );
});
	  
	</script>
	<script>
       function Approve(id){
           var id= id;
          if (confirm('Are you sure you want to Approve?')) {
             window.location = "action-code/approve-withdraw-request.php?id=" + id;
          }
           
        }
        
        function Reject(id){
             var id= id;
          if (confirm('Are you sure you want to Reject?')) {
               window.location = "action-code/reject-withdraw-request.php?id=" + id;
             
          }
        }
	  
	</script>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
             <h4 class="modal-title">Withdraw Request Detail</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
        </div>
        <div class="modal-body">
          <table id="withdrawreqtable" class="table table-bordered table-striped">
	<thead>						
		<tr>					
			<th class="w-25">Name</th>
			<th>Details</th> 		
			<th class="w-25">Name</th>
			<th>Details</th> 			
		</tr>
	</thead>
	<tbody>		
		<tr>
			<td>User Name</td>
			<td><span id="Name"></span></td>
			<td>Request Amount</td>
			<td><span id="Amount"></span>
			</td>
		</tr>
		<tr>
			<td>Request Number</td>
			<td><span id="Request"></span></td>
			<td>Payment Method</td>
			<td><badge class="badge badge-pill badge-soft-info">UPI Transfer</badge></td>
		</tr>
						<tr>
			<td>UPI Number</td>
			<td><span id="No"></span></td>
			<td>Request Date</td>
			<td><span id="Date"></span></td>
		</tr>
				<tr>
			<td>Request Accept Date</td>
			<td>N/A</td>
			<td>Remark</td>
			<td></td>
		</tr>
		<tr>
			<td>Payment Receipt</td>
			<td>N/A			</td>
			<td></td>
			<td></td>
		</tr>
	</tbody>
</table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>