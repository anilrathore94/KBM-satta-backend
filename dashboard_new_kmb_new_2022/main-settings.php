<?php include('header.php');
include('sidebar.php');
$select_account = mysqli_query($con,"SELECT * FROM admin_settings");
$select = mysqli_fetch_array($select_account);
?>

<div class="main-content">	<div class="page-content">
	<div class="container-fluid">
		<div class="row row_col">
			<div class="col-sm-12 col-xl-6">
				<div class="card h100p">
					<div class="card-body">
						<h4 class="card-title">Add Bank Details</h4>
						<form class="theme-form mega-form" name="adminsettingFrm" method="post" action="action-code/update-account.php">
								<input type="hidden" name="account_id" value="1" data-original-title="" title="">
							<div class="form-group">
								<label class="col-form-label">Account Holder Name</label>
								<input class="form-control" type="text" name="ac_name" id="ac_name" value="<?php echo $select['ac_name'];?>" placeholder="Enter Account Holder Name" data-original-title="" title="">
							</div>
							<div class="form-group">
								<label class="col-form-label">Account Number</label>
								<input class="form-control" type="Number" name="ac_number" id="ac_number" value="<?php echo $select['ac_number'];?>" placeholder="Enter Account Number" data-original-title="" title="">
							</div>
							<div class="form-group">
								<label class="col-form-label">IFSC Code</label>
								<input class="form-control" type="text" name="ifsc_code" id="ifsc_code" value="<?php echo $select['ifsc_code'];?>" placeholder="Enter " data-original-title="" title="">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary waves-light m-t-10" id="submitBtn" name="buysubmitBtn">Submit</button>
							</div>
							<div class="form-group">
								<div id="error"></div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-xl-6">
				<div class="card h100p">
					<div class="card-body">
						<h4 class="card-title">Add App Link</h4>
						<form class="theme-form mega-form" name="appLinkFrm" method="post" action="action-code/update-app.php">
								<input type="hidden" name="id" value="1" data-original-title="" title="">
							<div class="form-group">
								<label class="col-form-label">App Link</label>
								<input class="form-control" type="text" name="app_link" id="app_link" value="<?php echo $select['app_link'];?>" placeholder="Enter APP Link" data-original-title="" title="">
							</div>
							<div class="form-group">
								<label class="col-form-label">Share Message</label>
								<textarea class="form-control" name="content" rows="4" id="content"><?php echo $select['content'];?></textarea>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary waves-light m-t-10" id="submitMobileBtn">Submit</button>
							</div>
							<div class="form-group">
								<div id="error_msg"></div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-xl-6">
				<div class="card h100p">
					<div class="card-body">
						<h4 class="card-title">Add UPI ID (PhonePe)</h4>
						<form class="theme-form mega-form" name="adminsettingFrm" method="post" action="action-code/update-upi_ppay.php">
								<input type="hidden" name="account_id" value="1" data-original-title="" title="">
							<div class="row">
								<div class="form-group col-12">
									<label class="col-form-label">Gpay UPI Payment</label>
									<input class="form-control" type="text" name="upi_payment_id" id="upi_payment_id" value="<?php echo $select['phonepepay_upi'];?>" placeholder="Enter upi payment id" data-original-title="" title="">
								</div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary waves-light m-t-10" id="upiSubmitBtn" name="upiSubmitBtn">Submit</button>
							</div>
							<div class="form-group">
								<div id="error_upi"></div>
							</div>
						</form>
					</div>
				</div>
			</div>
				<div class="col-sm-12 col-xl-6">
				<div class="card h100p">
					<div class="card-body">
						<h4 class="card-title">Add UPI ID (Gpay)</h4>
						<form class="theme-form mega-form" name="adminsettingFrm" method="post" action="action-code/update-upi_gpay.php">
								<input type="hidden" name="account_id" value="1" data-original-title="" title="">
							<div class="row">
								<div class="form-group col-12">
									<label class="col-form-label">Gpay UPI Payment</label>
									<input class="form-control" type="text" name="upi_payment_id" id="upi_payment_id" value="<?php echo $select['gpay_upi'];?>" placeholder="Enter upi payment id" data-original-title="" title="">
								</div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary waves-light m-t-10" id="upiSubmitBtn" name="upiSubmitBtn">Submit</button>
							</div>
							<div class="form-group">
								<div id="error_upi"></div>
							</div>
						</form>
					</div>
				</div>
			</div>
				<div class="col-sm-12 col-xl-6">
				<div class="card h100p">
					<div class="card-body">
						<h4 class="card-title">Add UPI ID (PAYTM)</h4>
						<form class="theme-form mega-form" name="adminsettingFrm" method="post" action="action-code/update-upi.php">
								<input type="hidden" name="account_id" value="1" data-original-title="" title="">
							<div class="row">
								<div class="form-group col-12">
									<label class="col-form-label">PAYTM UPI Payment</label>
									<input class="form-control" type="text" name="upi_payment_id" id="upi_payment_id" value="<?php echo $select['upi_payment_id'];?>" placeholder="Enter upi payment id" data-original-title="" title="">
								</div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary waves-light m-t-10" id="upiSubmitBtn" name="upiSubmitBtn">Submit</button>
							</div>
							<div class="form-group">
								<div id="error_upi"></div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-xl-6">
				<div class="card h100p">
					<div class="card-body">
						<h4 class="card-title">App Maintainence</h4>
						<form class="theme-form mega-form" id="appMaintainenceFrm" name="appMaintainenceFrm" method="post">
							<input type="hidden" name="value_id" value="1">
							<div class="form-group">
								<label class="col-form-label">Share Message</label>
								<textarea class="form-control" name="app_maintainence_msg" rows="4" id="app_maintainence_msg">Our app is under maintenance. We will back to you very soon..</textarea>
							</div>
							<div class="form-group col-6" style="margin-top:30px;">
								<div class="media">
									 <div class="custom-control custom-switch mb-3" dir="ltr">
										<input type="checkbox" class="custom-control-input" id="maintainence_msg_status" name="maintainence_msg_status"  value="1">
										<label class="custom-control-label" for="maintainence_msg_status">Show Msg (ON/OFF)</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary waves-light m-t-10" id="submitBtnAppMaintainece" name="submitBtnAppMaintainece">Submit</button>
							</div>
							<div class="form-group">
								<div id="error_maintainence"></div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	<div class="container-fluid">
	<div class="row">
		<div class="col-xl-12">
            <div class="row">
				<div class="col-xl-6 col-lg-12">
                    <div class="card">
						<div class="card-body">
						    <h4 class="card-title">Other Settings</h4>
							<form class="theme-form mega-form" name="adminsettingFrm" method="post" action="action-code/update-other.php">
								<input type="hidden" name="account_id" value="1" data-original-title="" title="">
								<div class="form-group">
									<label class="col-form-label">Market Open Time</label>
									<input class="form-control" type="time" name="market_open_time" id="market_open_time" value="<?php echo date('H:i',strtotime($select['market_open_time']));?>" placeholder="Enter Market Open Time" data-original-title="" title="">
								</div>
								<div class="form-group">
									<label class="col-form-label">Home Slider Message</label>
									<input class="form-control" type="text" name="alert_message" id="alert_message" value="<?php echo $select['alert_message'];?>" placeholder="Enter Alert Message" data-original-title="" title="">
								</div>
								
								<div class="form-group">
									<button type="submit" class="btn btn-primary waves-light m-t-10" id="submitBtn" name="buysubmitBtn" data-original-title="" title="">Submit</button>
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

	
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 col-xl-12">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-xl-12">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Add Value's</h4>
								<form class="theme-form mega-form" name="adminvaluesettingFrm" method="post" action="action-code/update-limits.php">
								<input type="hidden" name="value_id" value="1" data-original-title="" title="">
								<div class="row">
									<div class="form-group col-md-4">
										<label class="col-form-label">Minimum Deposite</label>
										<input class="form-control" type="number" min="0" name="min_deposite" id="min_deposite" value="<?php echo $select['min_deposite'];?>" placeholder="Enter Min. Deposite Amount" data-original-title="" title="">
									</div>
									<div class="form-group col-md-4">
										<label class="col-form-label">Maximum Deposite</label>
											<input class="form-control" type="number" min="0" name="max_deposite" id="max_deposite" value="<?php echo $select['max_deposite'];?>" placeholder="Enter Max Deposite Amount" data-original-title="" title="">
									</div>
									<div class="form-group col-md-4">
										<label class="col-form-label">Minimum Withdrawal</label>
										<input class="form-control" type="number" min="0" name="min_withdrawal" id="min_withdrawal" value="<?php echo $select['min_withdrawal'];?>" placeholder="Enter Min Withdrawal Amount" data-original-title="" title="">
									</div>
									<div class="form-group col-md-4">
										<label class="col-form-label">Maximum Withdrawal</label>
										<input class="form-control" type="number" min="0" name="max_withdrawal" id="max_withdrawal" value="<?php echo $select['max_withdrawal'];?>" placeholder="Enter Max Withdrawal Amount" data-original-title="" title="">
									</div>
									<div class="form-group col-md-4">
										<label class="col-form-label">Minimum Transfer</label>
										<input class="form-control" type="number" min="0" name="min_transfer" id="min_transfer" value="<?php echo $select['min_transfer'];?>" placeholder="Enter Min Transfer Amount" data-original-title="" title="">
									</div>
									<div class="form-group col-md-4">
										<label class="col-form-label">Maximum Transfer</label>
										<input class="form-control" type="number" min="0" name="max_transfer" id="max_transfer" value="<?php echo $select['max_transfer'];?>" placeholder="Enter Max Transfer Amount" data-original-title="" title="">
									</div>
									<div class="form-group col-md-4">
										<label class="col-form-label">Minimum Bid Amount</label>
										<input class="form-control" type="number" min="0" name="min_bid_amt" id="min_bid_amt" value="<?php echo $select['min_bid_amt'];?>" placeholder="Enter Min Bid Amount" data-original-title="" title="">
									</div>
									<div class="form-group col-md-4">
										<label class="col-form-label">Maximum Bid Amount</label>
										<input class="form-control" type="number" min="0" name="max_bid_amt" id="max_bid_amt" value="<?php echo $select['max_bid_amt'];?>" placeholder="Enter Max Bid Amount" data-original-title="" title="">
									</div>
									<div class="form-group col-md-4">
										<label class="col-form-label">Welcome Bonus</label>
										<input class="form-control" type="number" min="0" name="Dragon_bonus" id="Dragon_bonus" value="<?php echo $select['Dragon_bonus'];?>" placeholder="Enter Welcome Bonus Amount" data-original-title="" title="">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-2">
												<label  for="open_time">Withdraw Open Time</label>

												  <input name="withdraw_open_time" id="withdraw_open_time" class="form-control digits" value="<?php echo date('H:i',strtotime($select['withdraw_open_time']));?>" type="time" data-original-title="" title="" >
												
									</div>
									<div class="form-group col-2">
												<label for="close_time">Withdraw Close Time</label>
												  <input name="withdraw_close_time" id="withdraw_close_time" class="form-control digits" type="time" value="<?php echo date('H:i',strtotime($select['withdraw_close_time']));?>" data-original-title="" title="">
												
									</div>
									<div class="form-group col-2" style="margin-top:30px;">
												
												<div class="media">
												
												 <div class="custom-control custom-switch mb-3" dir="ltr">
													<input type="checkbox" class="custom-control-input" id="global_batting_status" name="global_batting_status"  value="1">
													<label class="custom-control-label" for="global_batting_status">Global Batting</label>
												</div>
											
											  </div>
												
												
								   </div>
								   </div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary waves-light m-t-10" id="submitValueBtn" name="submitValueBtn">Submit</button>
									</div>
									<div class="form-group">
										<div id="alert"></div>
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


<div class="modal fade" id="upiUpdateModal" tabindex="-1" role="dialog" aria-hidden="true" >
  <div class="modal-dialog modal-frame modal-top modal-md">
	<div class="modal-content">
	<div class="modal-header">
	<h5 class="modal-title">UPI Update</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
  </div>
	  <div class="modal-body">
		<form class="theme-form mega-form" id="UPIOTPConfirmFrm" name="UPIOTPConfirmFrm" method="post">
			<input type="hidden" name="account_id" value="1">
			<input type="hidden" name="upi_id" id="upi_id" value="">
			<div class="form-group">
				<h6 id="otp_number">OTP Sent To :- 8278670980</h6>
			</div>
			<div class="form-group">
				<label class="col-form-label">OTP Code</label>
				<input class="form-control" type="text" name="otp_code" id="otp_code"  value="" placeholder="Enter OTP">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary waves-light m-t-10" id="otpSubmitBtn" name="otpSubmitBtn">Submit</button>
			</div>
			<div class="form-group">
				<div id="error_upi_otp"></div>
			</div>
		</form>
	  </div>
	</div>
  </div>
</div>

<?php include('footer.php');?>