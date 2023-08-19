<?php include('header.php');
include('sidebar.php');
$id = $_GET['id'];
if($id == ""){
    echo "No User Found!";
}else{
    
$select_ = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user_info WHERE id='$id'"));
$username=$select_['phone'];
?>

<div class="main-content">	<div class="page-content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-flex align-items-center justify-content-between">
					<h4 class="mb-0 font-size-18">User Details</h4>

					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="javascript: void(0);">User Management</a></li>
							<li class="breadcrumb-item active">User Details</li>
						</ol>
					</div>

				</div>
			</div>
		</div>
		
		<div class="row row_col">
			<div class="col-xl-4">
				<div class="card overflow-hidden h100p">
					<div class="bg-soft-primary">
						<div class="row">
							<div class="col-7">
								<div class="text-primary p-3">
									<h5 class="text-primary"><?php echo $select_['name'];?></h5>
									<p><?php echo $select_['phone'];?><a href="tel:<?php echo $select_['phone'];?>"><i class="mdi mdi-cellphone-iphone"></i></a>
									<a href="https://wa.me/91<?php echo $select_['phone'];?>" target="blank"><i class="mdi mdi-whatsapp"></i></a>
																		</p>
								</div>
							</div>
							<div class="col-5 align-center">
								<div class="p-3 text-right">
								    <div class="mb-2">
								    Active:
																			<input id="status1" type="button"  <?php if($select_['status']==1){
					        ?>value="Yes" style="background-color: #f46a6a;padding-right: .6em;padding-left: .6em;border-radius: 10rem;border: none;color: white;font-size: 75%;
    font-weight: 700;"<?php
					        }else{ ?>
					            value="No" style="background-color: #f46a6a;padding-right: .6em;padding-left: .6em;border-radius: 10rem;border: none;color: white;font-size: 75%;
    font-weight: 700;"
					        <?php } ?>>
																		</div>
																		<script type="text/javascript">
                                    $(document).ready(function(){
                                        $("#status1").click(function(){
                                        var elem = document.getElementById("status1");
                                        if (elem.value=="Yes"){ elem.value = "No";
                                            elem.style.backgroundColor = "#dc3545";
                                            
                                        }
                                        else{ elem.value = "Yes";  
                                            elem.style.backgroundColor = "#34c38f";
                                        }
                                        var id=<?php echo $id;?>;
                                        $.ajax({
                                            type: 'POST',
                                            url: 'status/edit-user-status.php',
                                            data: {'id':id},
                                            success: function(result) {
                                                
                                            }
                                        });
                                   });
                                });
                                </script>
									<div class="mb-2">
										Betting: 
																					<input id="betting_status" type="button"  <?php if($select_['betting_status']==1){
					        ?>value="Yes" style="padding-right: .6em;padding-left: .6em;border-radius: 10rem;background-color: #34c38f;border: none;color: white;font-size: 75%;
    font-weight: 700;"<?php
					        }else{ ?>
					            value="No" style="padding-right: .6em;padding-left: .6em;border-radius: 10rem;background-color: #f46a6a;border: none;color: white;font-size: 75%;
    font-weight: 700;"
					        <?php } ?>>	</div>
					        <script type="text/javascript">
                                    $(document).ready(function(){
                                        $("#betting_status").click(function(){
                                        var elem = document.getElementById("betting_status");
                                        if (elem.value=="Yes"){ elem.value = "No";
                                            elem.style.backgroundColor = "#f46a6a";
                                            
                                        }
                                        else{ elem.value = "Yes";  
                                            elem.style.backgroundColor = "#34c38f";
                                        }
                                        var id=<?php echo $id;?>;
                                        $.ajax({
                                            type: 'POST',
                                            url: 'status/edit-betting-status.php',
                                            data: {'id':id},
                                            success: function(result) {
                                                
                                                
                                            }
                                        });
                                   });
                                });
                                </script>
									<div class="mb-2">
										TP: 
																					<input id="transfer_status" type="button"  <?php if($select_['transfer_status']==1){
					        ?>value="Yes" style="padding-right: .6em;padding-left: .6em;border-radius: 10rem;background-color: #34c38f;border: none;color: white;font-size: 75%;
    font-weight: 700;"<?php
					        }else{ ?>
					            value="No" style="padding-right: .6em;padding-left: .6em;border-radius: 10rem;background-color: #f46a6a;border: none;color: white;font-size: 75%;
    font-weight: 700;"
					        <?php } ?>>	</div>
					        <script type="text/javascript">
                                    $(document).ready(function(){
                                        $("#transfer_status").click(function(){
                                        var elem = document.getElementById("transfer_status");
                                        if (elem.value=="Yes"){ elem.value = "No";
                                            elem.style.backgroundColor = "#f46a6a";
                                            
                                        }
                                        else{ elem.value = "Yes";  
                                            elem.style.backgroundColor = "#34c38f";
                                        }
                                        var id=<?php echo $id;?>;
                                        $.ajax({
                                            type: 'POST',
                                            url: 'status/edit-transfer-status.php',
                                            data: {'id':id},
                                            success: function(result) {
                                                
                                                
                                            }
                                        });
                                   });
                                });
                                </script>
                                
								
									
								</div>
							</div>
						</div>
					</div>
					<div class="card-body pt-0">
						<div class="row">
							<div class="col-sm-4">
								<div class="avatar-md profile-user-wid mb-4">
									<img src="assets/images/user.png" alt="" class="img-thumbnail rounded-circle">
								</div>
								
							</div>

							<div class="col-sm-8">
								<div class="pt-4">
								   
									<div class="row">
										<div class="col-6">
											<p class="text-muted mb-0">Security Pin</p>
											<h5 class="font-size-15 mb-0"><?php echo $select_['m_pin'];?></h5>
										</div>
										<div class="col-6">
											<button class="btn btn-primary btn-sm" id="changePin">Change</button>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
					<div class="card-body border-top">
                                        
						<div class="row">
							<div class="col-sm-12">
								<div>
									<p class="text-muted mb-2">Available Balance</p>
									<h5><?php echo $select_['wallet'];?></h5>
								</div>
								
							</div>
							
							<div class="col-sm-6">
								<div class="mt-3">
									<button class="btn btn-success btn-sm w-md btn-block" data-toggle="modal" data-target="#addFundModel">Add Fund</button>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="mt-3">
									<button class="btn btn-danger btn-sm w-md btn-block"  data-toggle="modal" data-target="#withdrawFundModel">Withdraw Fund</button>
								</div>
							</div>
								<div class="col-sm-6">
							 <div class="mt-3">
										<a  class="btn btn-danger btn-sm w-md btn-block" onclick="return confirm('Are you sure you want to delete?')" href="delete/delete-user.php?id=<?php echo $select_['id'];?>">DELETE</a></div>
    </div>
						</div>
					</div>
					
					
				</div>
			</div>
			
			<div class="col-xl-8">
				<div class="card h100p">
					<div class="card-body">
						<h4 class="card-title mb-4">Personal Information</h4>
						<div class="table-responsive">
							<table class="table table-nowrap mb-0">
								<tbody>
									<tr>
										<th scope="row">Full Name :</th>
										<td><?php echo $select_['name'];?></td>
										<th scope="row">Email :</th>
										<td><?php echo $select_['email'];?></td>
									</tr>
									<tr>
										<th scope="row">Mobile :</th>
										<td><?php echo $select_['phone'];?>																					<a href="tel:91<?php echo $select_['phone'];?>"><i class="mdi mdi-cellphone-iphone"></i></a>
											<a href="https://wa.me/91<?php echo $select_['phone'];?>" target="blank"><i class="mdi mdi-whatsapp"></i></a>
																					
										</td>
										<th scope="row">Password :</th>
										<td><?php echo $select_['password'];?></td>
									</tr>
									<tr>
										<th scope="row">District Name :</th>
										<td>N/A</td>
										<th scope="row">Flat/Plot No. :</th>
										<td>N/A</td>
									</tr>
									<tr>
										<th scope="row">Address Lane 1 :</th>
										<td>N/A</td>
										<th scope="row">Address Lane 2 :</th>
										<td>N/A</td>
									</tr>
									<tr>
										<th scope="row">Area :</th>
										<td>N/A</td>
										<th scope="row">Pin Code :</th>
										<td>N/A</td>
									</tr>
									<tr>
										<th scope="row">State Name :</th>
										<td>N/A</td>
										<th scope="row"></th>
										<td></td>
									</tr>
									<tr>
										<th scope="row">Creation Date :</th>
										<td><?php echo $select_['date'];?></td>
										<th scope="row"></th>
										<td></td>
									</tr>
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-xl-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title mb-4">Payment Information</h4>
						<div class="table-responsive">
							<table class="table table-nowrap mb-0">
								<tbody>
									<tr>
										<th scope="row">Bank Name :</th>
										<td>N/A</td>
										<th scope="row">Branch Address :</th>
										<td>N/A</td>
										<th scope="row"></th>
										<td></td>
										
									</tr>
									<tr>
										<th scope="row">A/c Holder Name :</th>
										<td>N/A</td>
										<th scope="row">A/c Number :</th>
										<td>N/A</td>
										<th scope="row">IFSC Code :</th>
										<td>N/A</td>
										
									</tr>
									<tr>
										<th scope="row">PhonePe No. :</th>
										<td><?php echo $select_['phonepay'];?></td>
										<th scope="row">Google Pay No. :</th>
										<td><?php echo $select_['googlepay'];?></td>
										<th scope="row">Paytm No. :</th>
										<td><?php echo $select_['paytm'];?></td>
										
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			
			
		</div>
		
	</div>
	
	<div class="container-fluid">
		<div class="row"> 
			<div class="col-12">
				<div class="card">
					<div class="card-body">
					    <?php
                    	  $row = mysqli_fetch_array(mysqli_query($con,"SELECT sum(points) as total FROM user_fund_request WHERE username='$select_[phone]'  and status='1'"));
                    	?>
                    	<div class="row"> 
                    	<div class="col-sm-6">
                    	    <h4 class="card-title">Add Fund Request List </h4> 
                    	</div> 
                    	
                    	<div class="col-sm-3">
										<span class="btn btn-success btn-sm w-md btn-block"> <?php echo (isset($row['total'])) ? $row['total'] : '0'; ?></span>
							</div>
					
						</div>
						<div class="">
							<table id="myTable" class="table table-striped table-bordered">
								<thead> 
									<tr>
										<th>#</th>
										<th>Request Amount</th>
										<th>Request	No.</th>
										<th>Date</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
							</table>
						</div>
						<div id="msg"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container-fluid">
		<div class="row"> 
			<div class="col-12">
				<div class="card">
					<div class="card-body">
					    <?php 
                    	  $row_withdraw = mysqli_fetch_array(mysqli_query($con,"SELECT sum(points) as total FROM user_withdraw_request WHERE username='$select_[phone]' and status='1'"));
                    	?>
                    	<div class="row"> 
                    	<div class="col-sm-6">
                    	    <h4 class="card-title">Withdraw Fund Request List </h4> 
                    	</div> 
                    	
                    	<div class="col-sm-3">
								<span class="btn btn-success btn-sm w-md btn-block"> <?php echo (isset($row_withdraw['total'])) ? $row_withdraw['total'] : '0'; ?></span>
						</div>
					
						</div>
						<div class="">
							<table id="withdrawTable" class="table table-striped table-bordered">
								<thead> 
									<tr>
										<th>#</th>
										<th>Request Amount</th>
										<th>Request	No.</th>
										<th>Request Date</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
							</table>
						</div>
						<div id="msg"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<input type="hidden" id="user_id" value="2">
	
	<div class="container-fluid">
		<div class="row"> 
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Bid History</h4>
						<div class="">
							<table id="bidHistoryTable" class="table table-striped table-bordered">
								<thead> 
									<tr>
										<th>#</th>
										<th>Game Name</th>
										<th>Game Type</th>
										<th>Session</th>
										<th>Open Pana</th>
										<th>Open Digits</th>
										<th>Close Pana</th>
										<th>Close Digits</th>
										<th>Points</th>
										<th>Date</th>
									</tr>
								</thead>
							</table>
						</div>
						<div id="msg"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 col-xl-12 xl-100">
				<div class="card">
					<div class="card-body">
					    <?php $credit = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(amount) as sum FROM wallet_history WHERE amount > 0 AND phone_number='$select_[phone]'"));
					          $debit = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(amount) as sum FROM wallet_history WHERE amount < 0 AND phone_number='$select_[phone]'"));
					    
					    ?>
						<h4 class="card-title">Wallet Transaction History</h4>
						<badge class="btn btn-success btn-sm btn-float clear_btn">Total Credit  <?php echo isset($credit['sum']) ? $credit['sum'] : '0';?></badge>
					    <badge class="btn btn-danger btn-sm btn-float clear_btn">Total Debit  <?php echo isset($debit['sum']) ? $debit['sum'] : '0';?></badge>
						<ul class="nav nav-tabs nav-tabs-custom nav-justified" id="top-tab" role="tablist">
							<li class="nav-item"><a class="nav-link active" id="top-allr-tab" data-toggle="tab" href="#top-allr" role="tab" aria-controls="top-allr" aria-selected="true">All</a></li>
							<li class="nav-item"><a class="nav-link" id="inr-top-tab" data-toggle="tab" href="#top-inr" role="tab" aria-controls="top-inr" aria-selected="false">Credit</a></li>
							<li class="nav-item"><a class="nav-link" id="outr-top-tab" data-toggle="tab" href="#top-outr" role="tab" aria-controls="top-outr" aria-selected="false">Debit</a></li>
						</ul>
						<div class="tab-content p-3" id="top-tabContent">
							<div class="tab-pane fade show active" id="top-allr" role="tabpanel" aria-labelledby="top-allr-tab">
								<div class="">
									<table id="allTransactionTable" class="table table-striped table-bordered">
										<thead>
											<tr> 
												<th>#</th>
												<th>Amount</th>
												<th>Transaction Note</th>
												<th>Date</th>
												<th>Time</th>
											</tr>
										</thead>	
									</table>
								</div>
							</div>
							<div class="tab-pane fade" id="top-inr" role="tabpanel" aria-labelledby="inr-top-tab">
								<div class="">
									<table id="inTransactionTable" class="table table-striped table-bordered" style="width: 100%;">
										<thead>
											<tr>
												<th>#</th>
												<th>Amount</th>
												<th>Transaction Note</th>
												<th>Date</th>
												<th>Time</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>
							<div class="tab-pane fade" id="top-outr" role="tabpanel" aria-labelledby="outr-top-tab">
								<div class="">
									<table id="outTransactionTable" class="table table-striped table-bordered" style="width: 100%;">
										<thead>
											<tr>
												<th>#</th>
												<th>Amount</th>
												<th>Transaction Note</th>
												<th>Date</th>
												<th>Time</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 col-xl-12 col-md-12">
				<div class="row">
					<div class="col-sm-12">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Winning History Report</h4>
							<!--	<form class="theme-form mega-form" id="userWinningHistoryFrm" name="userWinningHistoryFrm" method="post">
									<div class="row">
										<div class="form-group col-md-3">
											<label>Date</label>
																						<div class="date-picker">
												<div class="input-group">
												  <input class="form-control digits" type="date" value="2021-06-06" name="result_date" id="result_date">
												</div>
											</div>
										</div>
										<input type="hidden" name="user_id" id="user_id" value="2">
										<div class="form-group col-md-2">
											<label>&nbsp;</label>
											<button type="submit" class="btn btn-primary waves-light btn-block" id="submitBtn_2" name="submitBtn_2">Submit</button>
										</div>
									</div>
									<div class="form-group">
										<div id="error_msg"></div>
									</div>
									<input type="hidden" id="result_date">
									<input type="hidden" id="result_game_name">
								</form>-->
								
								<table id="resultHistory" class="table table-striped table-bordered">
									<thead> 
										<tr>
											<th>#</th>
											<th>Tx Date</th>
											<th>Game Name</th>
											<th>Game Type</th>
											<th>Open Pana</th>
											<th>Open Digit</th>
											<th>Close Pana</th>
											<th>Close Digit</th>
											<th>Bid Amount(&#x20b9)</th>
											<th>Win Amount(&#x20b9)</th>
											
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	
</div>




<div class="modal fade" id="bettingAllowedModal" tabindex="-1" role="dialog" aria-hidden="true" >
  <div class="modal-dialog modal-frame modal-top modal-md">
	<div class="modal-content">
	  <div class="modal-body">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p>Are you sure you want to allowed betting for this user.</p>
				</div>
				<div class="col-md-12">
				<form class="theme-form"  id="bettingAllowedFrm" method="post" enctype="multipart/formdata">
					<input type="hidden" name="user_id" id="user_id" value="2">
				<div class="form-group">	
					<button class="btn btn-danger waves-effect waves-light" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-info waves-effect waves-light" id="submitBtn">Yes</button>
				</div>
				</form>
				<div class="form-group m-b-0">
					 <div id="alert"></div>
				  </div>
				</div>
			</div>
		</div>
	  </div>
	</div>
  </div>
</div>

<div id="addFundModel" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Fund</h5><button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
		<form class="theme-form"  action="action-code/user-add-fund.php" method="post" enctype="multipart/formdata">
											
			  <div class="form-group">
				<label class="col-form-label">Amount</label>
				<input class="form-control" type="Number" min="0" name="user_amount" id="user_amount" placeholder="Enter Amount" data-original-title="" title="">
			</div>
		  <input type="hidden" name="user_id" id="user_id" value="<?php echo $select_['id'];?>">
		  <div class="form-group">							
		  <button type="submit" class="btn btn-info btn-sm m-t-10">Submit</button>
		  </div>
		  <div class="form-group m-b-0">
			 <div id="alert_msg"></div>
		  </div>
	   </form>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
<div id="withdrawFundModel" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Withdraw Fund</h5><button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
		<form class="theme-form" action="action-code/user-withdraw-fund.php" method="post" enctype="multipart/formdata">
											
			  <div class="form-group">
				<label class="col-form-label">Amount</label>
				<input class="form-control" type="Number" min="0" name="amount" id="amount" placeholder="Enter Amount" data-original-title="" title="">
			</div>
		  <input type="hidden" name="user_id" id="user_id" value="<?php echo $select_['id'];?>">
		  <div class="form-group">							
		  <button type="submit" class="btn btn-info btn-sm m-t-10">Submit</button>
		  </div>
		  <div class="form-group m-b-0">
			 <div id="error_msg"></div>
		  </div>
	   </form>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>

<div id="changePinModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Change Pin</h5><button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
		<form class="theme-form"  method="post" action="action-code/change-pin.php" enctype="multipart/formdata">
											
			  <div class="form-group">
				<label class="col-form-label">Enter New Pin</label>
				<input class="form-control digit_number" type="number" name="security_pin" id="security_pin" placeholder="Enter Security Pin" min="0" max="9999" maxlength="4">
			</div>
		  <input type="hidden" name="user_id" id="user_id" value="<?php echo $id;?>">
		  <div class="form-group">							
		  <button type="submit" class="btn btn-info btn-sm m-t-10">Submit</button>
		  </div>
		  <div class="form-group m-b-0">
			 <div id="alert_msg"></div>
		  </div>
	   </form>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>



<div id="viewWithdrawRequest" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title mt-0" id="myLargeModalLabel">Withdraw Request Detail</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body viewWithdrawRequestBody">
				
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>	
<script>
var user_id=<?php echo $select_['phone'];?>;
</script>
<script>

$(document).ready(function() {
    $('#myTable').DataTable( {
        "processing": true,
        "serverSide": true,
        "order": [[ 0, "desc" ]], 
        "ajax": "scripts/fund-request.php?user_id="+user_id
    } );
} );
</script>
<script>
$(document).ready(function() {
    $('#withdrawTable').DataTable( {
        "processing": true,
        "serverSide": true,
        "order": [[ 0, "desc" ]], 
        "ajax": "scripts/withdrawTable.php?user_id="+user_id
    } );
} );
</script>
<script>
$(document).ready(function() {
    $('#bidHistoryTable').DataTable( {
        "processing": true,
        "serverSide": true,
        "order": [[ 0, "desc" ]], 
        "ajax": "scripts/bidHistoryTable.php?user_id="+user_id
    } );
} );
</script>
<script>
$(document).ready(function() {
    $('#allTransactionTable').DataTable( {
        "processing": true,
        "serverSide": true,
        "order": [[ 0, "desc" ]], 
        "ajax": "scripts/allTransactionTable.php?user_id="+user_id
    } );
} );
</script>
<script>
$(document).ready(function() {
    $('#inTransactionTable').DataTable( {
        "processing": true,
        "serverSide": true,
        "order": [[ 0, "desc" ]], 
        "ajax": "scripts/inTransactionTable.php?user_id="+user_id
    } );
} );
</script>
<script>
$(document).ready(function() {
    $('#outTransactionTable').DataTable( {
        "processing": true,
        "serverSide": true,
        "order": [[ 0, "desc" ]], 
        "ajax": "scripts/outTransactionTable.php?user_id="+user_id
    } );
} );
</script>
<script>
$(document).ready(function() {
    $('#resultHistory').DataTable( {
        "processing": true,
        "serverSide": true,
        "order": [[ 0, "desc" ]], 
        "ajax": "scripts/resultHistory.php?user_id="+user_id
    } );
} );
</script>

<script>
	    $(document).ready(function() {

  $('.accept').click(function () {

    var data_id = $(this).attr('data-id');
    
    $('#id1').val(data_id);
  })
});
	</script>
	<script>
	    $(document).ready(function() {

  $('.reject').click(function () {

    var data_id = $(this).attr('data-id');
    
    $('#id2').val(data_id);
  })
});
	</script>
	<div id="requestApproveModel" class="modal fade" role="dialog">
	<div class="modal-dialog" >
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Approve Withdraw Request</h5><button type="button" class="close" data-dismiss="modal" data-original-title="" title="">×</button>
      </div>
      <div class="modal-body">
		<form class="theme-form" action="action-code/approve-withdraw-request.php" method="post" enctype="multipart/form-data">
			  <div class="form-group">
				<label for="">Payment Receipt Image<span class="Img_ext">(Allow Only.jpeg,.jpg,.png)</span></label>
				<input class="form-control" name="file" type="file" onchange="return validateImageExtensionOther(this.value,1)" data-original-title="" title="" required>
			</div>
			<div class="form-group">
				<label>Remark</label>
				<input type="text" name="remark" class="form-control" placeholder="Enter Remark" data-original-title="" title="">
			</div>
		  <input type="hidden" name="id" id="id1"  data-original-title="" title="">
		  <div class="form-group">							
		  <button type="submit" class="btn btn-info btn-sm m-t-10" name="submitBtn" data-original-title="" title="">Submit</button>
		  </div>
		  <div class="form-group m-b-0">
			 <div id="alert_msg_manager"></div>
		  </div>
	   </form>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
<div id="requestRejectModel" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Reject Withdraw Request</h5><button type="button" class="close" data-dismiss="modal" data-original-title="" title="">×</button>
      </div>
      <div class="modal-body">
		<form class="theme-form" action="action-code/reject-withdraw-request.php"  method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Remark</label>
				<input type="text" name="remark" class="form-control" placeholder="Enter Remark" data-original-title="" title="">
			</div>
		  <input type="hidden" name="id" id="id2" data-original-title="" title="">
		  <div class="form-group">							
		  <button type="submit" class="btn btn-info btn-sm m-t-10" name="submitBtnReject" data-original-title="" title="">Submit</button>
		  </div>
		  <div class="form-group m-b-0">
			 <div id="alert_msg"></div>
		  </div>
	   </form>
      </div>
    </div>
  </div>
</div>

<?php } include('footer.php');?>