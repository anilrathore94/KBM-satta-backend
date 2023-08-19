<?php 
include('header.php');
include('sidebar.php');?>

<div class="main-content">	<div class="page-content">
	      	<div class="container-fluid">

	<div class="row">

		<div class="col-12 col-sm-12 col-lg-12">

            <div class="row">

				<div class="col-sm-12 col-12 ">

                    <div class="card">

                      <div class="card-header">

                        <h5>Winning Prediction</h5>

                      </div>

						<div class="card-body">

							<form class="theme-form mega-form" method="post" action="action-code/declare-result.php">

							<div class="row">
							    
							    <div class="form-group col-md-2" style="margin-top:auto;">

									<label>Date</label>

									<div class="date-picker">

										<div class="input-group">

										  <input class="form-control digits" type="date" data-date-format="yyyy-mm-dd"  data-language="en" name="date" id="date" placeholder="Enter Start Date" value="<?php echo date('Y-m-d');?>" required max="<?php echo date('Y-m-d');?>">
                                          
										</div>

									</div>

								</div>
								
								<div class="form-group col-md-4">

									<label>Game Name</label>

									<div>

										<div class="input-group">
                                        <select id="game_name" class="form-control" name="game_name" required>
                                            <option value="">Select Game</option>
                                            <?php $select_game = mysqli_query($con,"SELECT * FROM starline_game_name");
                                            while($select = mysqli_fetch_array($select_game)){
                                                ?><option value="<?php echo $select['games_name'];?>"><?php echo $select['games_name'];?></option><?php
                                            }?>
                                        </select>
                                        
										</div>

									</div>

								</div> 


								
								
								
							    	<div class="form-group col-md-4" id="open_r">

									<label>Open Pana</label>

									<div>

										<div class="input-group">
                                        <select id="open_pana" class="form-control select2"  name="open_pana" required>
                                            <option value="">Select Pana</option>
                                            <?php $select_pana = mysqli_query($con,"SELECT * FROM game_number WHERE type LIKE '%Pana%' GROUP BY number");
                                            while($select = mysqli_fetch_array($select_pana)){
                                                ?><option value="<?php echo $select['number'];?>"><?php echo $select['number'];?></option><?php
                                            }?>
                                        </select>
                                        
										</div>

									</div>

								</div> 
							
							    
								
								<br>
								<div class="form-group" style="    align-self: flex-end;">
									<input type="button" class="btn btn-primary waves-light m-t-10 mtop_25"  style="margin-left: 10px;" onclick="return showWinner();" value="Submit">
									
								</div>
								<script>
									function showWinner(){
									var name = document.getElementById('game_name').value;
									var date = document.getElementById('date').value;
									//var session =document.getElementById('session').value;
									var open_pana = document.getElementById('open_pana').value;
									//var close_pana = document.getElementById('close_pana').value;
									//var digit = document.getElementById('result').value;
							        $.ajax ({
                                        type: 'POST',
                                        url: 'ajax/get-starline-winning-prediction.php',
                                        data: {name: name, date: date, open_pana: open_pana},
                                        timeout: 0,
                                        success : function(htmlresponse) {
                                           
                                            $('#bids').html(htmlresponse);
                                        }
                                    });
    
                                     return false;
                                }</script>
									
								
							
								
						       </div>	

							</form>
							
							</div>

                    </div>

                </div>

			</div>

		</div>

	</div>
	
	<div class="row">
	    <span id="bids" style="    width: -webkit-fill-available;"></span>
	</div>
	
	
	
</div>
	
</div>	
<?php include('footer.php');?>