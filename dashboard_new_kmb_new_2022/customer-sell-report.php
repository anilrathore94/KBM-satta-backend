<?php 
include('header.php');
include('sidebar.php');?>

<div class="main-content">	<div class="page-content">
	<div class="container-fluid">

	<div class="row">

		<div class="col-sm-12 col-xl-12 col-md-12">

            <div class="row">

				<div class="col-sm-12">

                    <div class="card">

						<div class="card-header p-t-15 p-b-15">

						

						</div>

						<div class="card-body">
                            	<h5>Customer Sell Report</h5>
							<form class="theme-form mega-form" id="customerSellFrm" name="customerSellFrm" method="post">

							<div class="row">
																<div class="form-group col-md-2" style="margin-top:auto;">

									<label>Date</label>


										  <input class="form-control" type="date" value="<?php echo date('Y-m-d');?>" name="start_date" id="start_date" placeholder="Enter Start Date" >


								</div>
								 
								
								
								<div class="form-group col-md-2">	
									<label class="col-form-label">Game Name</label>		
									<select id="game_name" name="game_name" class="form-control">
										<option value="">-Select Game Name-</option>
										<option value="all">All Games</option>	
																				
										<?php $select_game = mysqli_query($con,"SELECT * FROM game_time GROUP BY game");
										while($select_g = mysqli_fetch_array($select_game)){
										    ?>
										    <option value="<?php echo $select_g['game'];?>"><?php echo $select_g['game'];?></option>
										    <?php
										}
										?>										</select>
								</div>
								
									
								<div class="form-group col-md-2">	
									<label class="col-form-label">Game Type</label>		
									<select id="game_type" name="game_type" class="form-control">
										<option value="all">All</option>
											<option value="Single Digit">Single Digit</option>
											<option value="Jodi Digit">Jodi Digit</option>
										
											<option value="Single Pana">Single Pana</option>
												<option value="Double Pana">Double Pana
											</option>
											<option value="Triple Pana">Triple Pana</option>
											 
									</select>	
								</div>
								
								
								<div class="form-group col-md-2 session_get">	
									<label class="col-form-label">Session</label>		
									<select id="market_status" name="market_status" class="form-control">
										<option value="">-Select Session-</option>
											<option value="open">Open</option>
											<option value="close">Close</option>
											
									</select>	
								</div>
								 
								
								<div class="form-group col-md-2" style="align-self:flex-end;">

									<button type="submit" class="btn btn-info waves-light m-t-25" >Submit</button>

								</div>

							</div>

							</form>
							<script>
							    document.getElementById('customerSellFrm').onsubmit = function() {
							        var date = document.getElementById('start_date').value;
							        var name = document.getElementById('game_name').value;
							        var market = document.getElementById('market_status').value;
							        var type = document.getElementById('game_type').value
							        $.ajax ({
                                        type: 'POST',
                                        url: 'ajax/get-sell-report.php',
                                        data: {name: name, market: market, type:type, date:date},
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