<?php 
include('header.php');
include('sidebar.php');?>
<?php $select_sub = mysqli_query($con,"SELECT * FROM contact_detail WHERE status='1'");
$select = mysqli_fetch_array($select_sub);?>

<div class="main-content">	<div class="page-content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 col-xl-12">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-xl-12">
						<div class="card">
						  <div class="card-header">
							<h5>Contact Settings</h5>
						  </div>
							<div class="card-body">
								<form method="POST" action="action-code/update-contact.php">
								<div class="row">
									<div class="form-group col-md-4">
										<label class="col-form-label"><strong>Mobile Number <span class="Img_ext">eg.9876543210</span></strong></label>
										<input type="text" class="form-control" placeholder="Enter mobile Number" value="<?php echo $select['mobile'];?>" name="mobile">
									</div>
									<div class="form-group col-md-4">
										<label class="col-form-label"><strong>Mobile Number 2 (Optional)</strong></label>
										<input type="text" class="form-control" placeholder="Enter Mobile Number (Optional)" value="<?php echo $select['alt_mobile'];?>" name="alt_mobile">
									</div>
									<div class="form-group col-md-4">
										<label class="col-form-label"><strong>WhatsApp Number</strong></label>
										<input type="text" class="form-control" placeholder="Enter Whatsapp Number" value="<?php echo $select['wp_mobile'];?>" name="wp_mobile">
									</div>
									<div class="form-group col-md-6">
										<label class="col-form-label"><strong>Landline 1 (Optional) <span class="Img_ext">eg.0141-9999999</span></strong></label>
										<input type="text" class="form-control" placeholder="Enter Landline Number" value="<?php echo $select['landline'];?>" name="landline">
									</div>
									<div class="form-group col-md-6">
										<label class="col-form-label"><strong>Landline 2 (Optional)</strong></label>
										<input type="text" class="form-control" placeholder="Enter Landline Number (Optional)" value="<?php echo $select['alt_landline'];?>" name="alt_landline">
									</div>
									<div class="form-group col-md-6">
										<label class="col-form-label"><strong>Email 1</strong></label>
										<input type="text" class="form-control" placeholder="Enter Email Id" value="<?php echo $select['email'];?>" name="email">
									</div>
									<div class="form-group col-md-6">
										<label class="col-form-label"><strong>Email 2 (Optional)</strong></label>
										<input type="text" class="form-control" placeholder="Enter Email Id" value="<?php echo $select['alt_email'];?>" name="alt_email">
									</div>
									<div class="form-group col-md-6">
										<label class="col-form-label"><strong>Facebook (Optional)</strong></label>
										<input type="text" class="form-control" placeholder="Enter Facebook Link" value="<?php echo $select['facebook'];?>" name="facebook">
									</div>
									<div class="form-group col-md-6">
										<label class="col-form-label"><strong>Twitter (Optional)</strong></label>
										<input type="text" class="form-control" placeholder="Enter Twitter Link" value="<?php echo $select['twitter'];?>" name="twitter">
									</div>
									<div class="form-group col-md-6">
										<label class="col-form-label"><strong>Youtube (Optional)</strong></label>
										<input type="text" class="form-control" placeholder="Enter Youtube Link" value="<?php echo $select['youtube'];?>" name="youtube">
									</div>
									<div class="form-group col-md-6">
										<label class="col-form-label"><strong>Google Plus (Optional)</strong></label>
										 <input type="text" class="form-control" placeholder="Enter Google Plus Link" value="<?php echo $select['google_plus'];?>" name="google_plus">
									</div>
									<div class="form-group col-md-6">
										<label class="col-form-label"><strong>Instagram (Optional)</strong></label>
									 <input type="text" class="form-control" placeholder="Enter Instagram Link" value="<?php echo $select['instagram'];?>" name="instagram">
									</div>
									<div class="form-group col-md-3">
										<label class="col-form-label"><strong>Latitude</strong></label>
										<input type="text" class="form-control" placeholder="Enter Latitude" value="<?php echo $select['latitude'];?>" name="latitude">
									</div>
									<div class="form-group col-md-3">
										<label class="col-form-label"><strong>Longitude</strong></label>
										<input type="text" class="form-control" placeholder="Enter Longitude" value="<?php echo $select['longitude'];?>" name="longitude">
									</div>
									<div class="form-group col-md-12">
										<label class="col-form-label"><strong>Address</strong></label>
										<textarea class="form-control" placeholder="Enter Address" name="address"><?php echo $select['address'];?></textarea>
									</div>
								</div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary waves-light m-t-10" id="submitBtn" name="submitBtn">Submit</button>
									</div>
									<div class="form-group">
										<div id="errormsg"></div>
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