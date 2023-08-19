<?php 
include('header.php');
include('sidebar.php');?>

<div class="main-content">	<div class="page-content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 col-lg-6 mr-auto ml-auto">
				<div class="row">
					<div class="col-sm-12">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Add Balance In User Wallet</h4>
								<form action="action-code/add-fund-user-wallet.php" method="POST">
									<div class="form-group">
										<label>User List</label>
										<select id="user" name="user" class="form-control  select2 show_parent" >
											<option value="">Select User</option>
																						<?php $select_user = mysqli_query($con,"SELECT * FROM user_info");
                                                    while($select = mysqli_fetch_array($select_user)){
                                                        ?>
                                                        <option value="<?php echo $select['phone'];?>"><?php echo $select['name'];?> (<?php echo $select['phone'];?>)</option>
                                                        <?php
                                                    }
                                                    ?>
																					</select>	
									</div>
									<div class="form-group">
										<label>Amount</label>
										<input class="form-control" type="Number" min=0 name="amount" id="amount" placeholder="Enter Amount">
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary waves-light m-t-10" id="submitBtn">Submit</button>
									</div>
									<div class="form-group">
										<div id="error"></div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

	<?php include('footer.php');?>