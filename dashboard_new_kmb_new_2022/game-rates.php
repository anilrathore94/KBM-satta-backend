<?php 
include('header.php');
include('sidebar.php');?>

<div class="main-content">	<div class="page-content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 col-lg-8 mr-auto ml-auto">
				<div class="row">
					<div class="col-sm-12 col-12 ">
						<div class="card">
						 	<div class="card-body">
								<h4 class="card-title">Add Games Rate</h4>
								<form method="POST" action="action-code/update-game-rates.php">
								    
								<div class="row">
									<div class="form-group col-md-6">
										<label class="col-form-label">Single Digit Value 1</label>
										<?php $select = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM game_rates WHERE type='Single Digit'"));?>
                                    <input type="number" class="form-control" placeholder="" name="single_digit_1" value="<?php echo $select['min_value'];?>" required>
									</div>
									
									<div class="form-group col-md-6">
										<label class="col-form-label">Single Digit Value 2</label>
										<input type="number" class="form-control" placeholder="" name="single_digit_2" value="<?php echo $select['max_value'];?>" required>
									</div>
									
									<div class="form-group col-md-6">
										<label class="col-form-label">Jodi Digit Value 1</label>
										<?php $select = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM game_rates WHERE type='Jodi Digit'"));?>
                                    <input type="number" class="form-control" placeholder="" name="jodi_digit_1" value="<?php echo $select['min_value'];?>" required>
									</div>
									
									<div class="form-group col-md-6">
										<label class="col-form-label">Jodi Digit Value 2</label>
										<input type="number" class="form-control" placeholder="" name="jodi_digit_2" value="<?php echo $select['max_value'];?>" required>
									</div>
									
									<div class="form-group col-md-6">
										<label class="col-form-label">Single Pana Value 1</label>
										<?php $select = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM game_rates WHERE type='Single Pana'"));?>
                                    <input type="number" class="form-control" placeholder="" name="single_pana_1" value="<?php echo $select['min_value'];?>" required>
									</div>
									
									<div class="form-group col-md-6">
										<label class="col-form-label">Single Pana Value 2</label>
										<input type="number" class="form-control" placeholder="" name="single_pana_2" value="<?php echo $select['max_value'];?>" required>
									</div>
									
									<div class="form-group col-md-6">
										<label class="col-form-label">Double Pana Value 1</label>
										<?php $select = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM game_rates WHERE type='Double Pana'"));?>
                                    <input type="number" class="form-control" placeholder="" name="double_pana_1" value="<?php echo $select['min_value'];?>" required>
									</div>
									
									<div class="form-group col-md-6">
										<label class="col-form-label">Double Pana Value 2</label>
										<input type="number" class="form-control" placeholder="" name="double_pana_2" value="<?php echo $select['max_value'];?>" required>
									</div>
									
									<div class="form-group col-md-6">
										<label class="col-form-label">Tripple Pana Value 1</label>
										<?php $select = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM game_rates WHERE type='Triple Pana'"));?>
                                    <input type="number" class="form-control" placeholder="" name="triple_pana_1" value="<?php echo $select['min_value'];?>" required>
									</div>
									
									<div class="form-group col-md-6">
										<label class="col-form-label">Tripple Pana Value 2</label>
										<input type="number" class="form-control" placeholder="" name="triple_pana_2" value="<?php echo $select['max_value'];?>" required>
									</div>
									
									<div class="form-group col-md-6">
										<label class="col-form-label">Half Sangam Value 1</label>
										<?php $select = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM game_rates WHERE type='Half Sangam'"));?>
                                    <input type="number" class="form-control" placeholder="" name="half_sangam_1" value="<?php echo $select['min_value'];?>" required>
									</div>
									
									<div class="form-group col-md-6">
										<label class="col-form-label">Half Sangam Value 2</label>
										<input type="number" class="form-control" placeholder="" name="half_sangam_2" value="<?php echo $select['max_value'];?>" required>
									</div>
									
									<div class="form-group col-md-6">
										<label class="col-form-label">Full Sangam Value 1</label>
										<?php $select = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM game_rates WHERE type='Full Sangam'"));?>
                                    <input type="number" class="form-control" placeholder="" name="full_sangam_1" value="<?php echo $select['min_value'];?>" required>
									</div>
									
									<div class="form-group col-md-6">
										<label class="col-form-label">Full Sangam Value 2</label>
										<input type="number" class="form-control" placeholder="" name="full_sangam_2" value="<?php echo $select['max_value'];?>" required>
									</div>
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
				</div>
			</div>
		</div>
	</div>
</div>	
<?php include('footer.php');?>