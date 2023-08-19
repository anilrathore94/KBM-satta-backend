<?php 
include('header.php');
include('sidebar.php');?>

<div class="main-content">	 <div class="page-content">
 <div class="container-fluid">

	<div class="row">

		<div class="col-sm-12 col-xl-12 col-md-12">

            <div class="row">

				<div class="col-sm-12">

                    <div class="card">

						<div class="card-header p-t-15 p-b-15">

							<h5>Starline Customer Sell Report</h5>

						</div>

						<div class="card-body">

							<form class="theme-form mega-form" id="customerSellFrm" name="customerSellFrm" method="post">

							<div class="row">
																<div class="form-group col-md-2" style="margin-top:auto;">

									<label>Date</label>

									<div class="date-picker">

										<div class="input-group">

										  <input class="form-control" type="date" data-language="en" value="<?php echo date('Y-m-d');?>" name="start_date" id="start_date" placeholder="Enter Start Date">

										</div>

									</div>

								</div>
								 
								
								
								<div class="form-group col-md-4">	
									<label class="col-form-label">Game Name</label>		
									<select id="game_name" name="game_name" class="form-control">
										<option value="">-Select Game Name-</option>
																					<?php $select_game = mysqli_query($con,"SELECT * FROM starline_game_name");
										while($select_g = mysqli_fetch_array($select_game)){
										    ?>
										    <option value="<?php echo $select_g['games_name'];?>"><?php echo $select_g['games_name'];?></option>
										    <?php
										}
										?>		
																				</select>	
								</div>
								
									
								<div class="form-group col-md-4">	
									<label class="col-form-label">Game Type</label>		
									<select id="game_type" name="game_type" class="form-control">
										<option value="0">All</option>
											<option value="Single Digit">Single Digit</option>
										
											<option value="Single Pana">Single Pana</option>
												<option value="Double Pana">Double Pana
											</option>
											<option value="Triple Pana">Triple Pana</option>
											 
									</select>	
								</div>
								 
								
								<div class="form-group col-md-2" style="align-self:flex-end;">

									<button type="submit" class="btn btn-primary waves-light m-t-25" id="submitBtn" name="submitBtn" data-original-title="" title="">Submit</button>

								</div>

							</div>

							</form>
							<script>
							    document.getElementById('customerSellFrm').onsubmit = function() {
							        var name = document.getElementById('game_name').value;
							        var type = document.getElementById('game_type').value;
							        var date = document.getElementById('start_date').value;
							        $.ajax ({
                                        type: 'POST',
                                        url: 'ajax/get-starline-sell-report.php',
                                        data: {name: name, type:type, date:date},
                                        success : function(htmlresponse) {
                                            $('#bids').html(htmlresponse);
                                        }
                                    });
    
    return false;
};
							</script>
							
						</div>

                    </div>

                </div>

			</div>

		</div>

	</div>

</div>
<span id="bids"></span>
 
 </div>	
<?php include('footer.php');?>