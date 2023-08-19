<?php 
include('header.php');
include('sidebar.php');?>

<div class="main-content">	
<div class="page-content">
	<div class="container-fluid">


                <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header"><h4>Winning History Report</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                        <form class="theme-form mega-form" id="customerSellFrm" name="customerSellFrm" method="post">

							<div class="row">
																<div class="form-group col-md-2" style="margin-top:auto;">

									<label>Date</label>


										  <input class="form-control" type="date" value="<?php echo date('Y-m-d');?>" name="start_date" id="start_date" placeholder="Enter Start Date" >

								</div>
								 
								
								
								<div class="form-group col-md-4">	
									<label class="col-form-label">Game Name</label>		
									<select id="game_name" name="game_name" class="form-control">
										<option value="">-Select Game-</option>
																					<?php $select_game = mysqli_query($con,"SELECT * FROM game_time GROUP BY game");
										while($select_g = mysqli_fetch_array($select_game)){
										    ?>
										    <option value="<?php echo $select_g['game'];?>"><?php echo $select_g['game'];?></option>
										    <?php
										}
										?>		
																				</select>	
								</div>
								
								
								<div class="form-group col-md-4 session_get">	
									<label class="col-form-label">Market Time</label>		
									<select id="market_status" name="market_status" class="form-control">
										<option value="">-Select Market Time-</option>
											<option value="open">Open</option>
											<option value="close">Close</option>
											
									</select>	
								</div>
								 
								
								<div class="form-group col-md-2" style="align-self:flex-end;">

									<button type="submit" class="btn btn-info waves-light m-t-25" id="submitBtn" name="submitBtn" data-original-title="" title="">Submit</button>

								</div>

							</div>

							</form>
							<script>
							    document.getElementById('customerSellFrm').onsubmit = function() {
							        var date = document.getElementById('start_date').value;
							        var name = document.getElementById('game_name').value;
							        var market = document.getElementById('market_status').value;
							        $.ajax ({
                                        type: 'POST',
                                        url: 'ajax/get-winning-report.php',
                                        data: {name: name, market: market,date:date},
                                        success : function(htmlresponse) {
                                            $('#bids').html(htmlresponse);
                                            $('#resultHistory').DataTable();
                                        }
                                    });
    
    return false;
};
							</script>
                            </div>
                        </div>
					</div>
					</div>
					<span id="bids"></span>
					</div>
</div>

<?php include('footer.php');?>