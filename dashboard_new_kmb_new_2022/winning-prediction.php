<?php 
include('header.php');
include('sidebar.php');?>

<div class="main-content">	
<div class="page-content">
	<div class="row">

		<div class="col-12 col-sm-12 col-lg-12">

            <div class="row">

				<div class="col-sm-12 col-12 ">

                    <div class="card">

                      <div class="card-header">

                        

                      </div>

						<div class="card-body">
                            <h5>Winning Prediction</h5>
							<form class="theme-form mega-form" method="post" action="action-code/declare-result.php">

							<div class="row">
							    
							    <div class="form-group col-md-2">

									<label>Date</label>

									<div class="date-picker">

										<div class="input-group">

										  <input class="form-control digits" type="date" data-date-format="yyyy-mm-dd"  data-language="en" name="date" id="date" placeholder="Enter Start Date" value="<?php echo date('Y-m-d');?>" required max="<?php echo date('Y-m-d');?>">
                                          
										</div>

									</div>

								</div>
								
								<div class="form-group col-md-3">

									<label>Game Name</label>

									<div>

										<div class="input-group">
                                        <select id="game_name" class="form-control" name="game_name" required>
                                            <option value="">Select Game</option>
                                            <?php $select_game = mysqli_query($con,"SELECT * FROM game_time GROUP BY game");
                                            while($select = mysqli_fetch_array($select_game)){
                                                ?><option value="<?php echo $select['game'];?>"><?php echo $select['game'];?></option><?php
                                            }?>
                                        </select>
                                        
										</div>

									</div>

								</div> 

								
								
								
									<div class="form-group col-md-3">
									<label>Session</label>
<div class="input-group">
									<select class="form-control" name="session" id="session" onchange="changeVal(this.value)" required>
										<option value="">Select Session</option>  
										<option value="open">Open</option>
										<option value="close">Close</option>
										 </select>
										 </div>
										 
								</div>
								
						<script>
										     function changeVal(val){
										         if(val == "" ){
										             document.getElementById('open_r').style.display = "none";
										             document.getElementById('close_r').style.display = "block";
										         }else if(val == "close") {
										             document.getElementById('open_r').style.display = "block";
										             document.getElementById('close_r').style.display = "block";
										         }else{
										             document.getElementById('open_r').style.display = "block";
										             document.getElementById('close_r').style.display = "none";
										         }
										     }
										 </script>
								
								
								
							    	<div class="form-group col-md-2" id="open_r" style="display:none;">

									<label>Open Pana</label>

									<div>

										<div class="input-group">
                                        <select id="open_pana" class="form-control getDigitOpenResult select2"  name="open_pana">
                                            <option value="null">Select Pana</option>
                                            <?php $select_pana = mysqli_query($con,"SELECT * FROM game_number WHERE type LIKE '%Pana%' GROUP BY number");
                                            while($select = mysqli_fetch_array($select_pana)){
                                                ?><option value="<?php echo $select['number'];?>"><?php echo $select['number'];?></option><?php
                                            }?>
                                        </select>
                                        
										</div>

									</div>

								</div> 
							
							    	<div class="form-group col-md-2" id="close_r" style="display:none;">

									<label>Close Pana</label>

									<div>

										<div class="input-group">
                                        <select id="close_pana" class="form-control getDigitCloseResult select2" name="close_pana">
                                            <option value="null">Select Pana</option>
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
									var session =document.getElementById('session').value;
									var open_pana = document.getElementById('open_pana').value;
									var close_pana = document.getElementById('close_pana').value;
									//var digit = document.getElementById('result').value;
							        $.ajax ({
                                        type: 'POST',
                                        url: 'ajax/get-winning-prediction.php',
                                        data: {name: name, date: date, session: session, open_pana: open_pana, close_pana: close_pana},
                                        timeout: 0,
                                        success : function(htmlresponse) {
                                           
                                            $('#bids').html(htmlresponse);
                                            $('#resultHistory').DataTable();
                                        }
                                    });
    
                                     return false;
                                }</script>
									<!--	<div class="form-group" style="    align-self: flex-end;">
									<button type="submit" class="btn btn-primary waves-light m-t-10 mtop_25"  style="    margin-left: 10px;">Declare</button>
								</div>-->
								
							
								
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

<div class="modal fade" id="updatebidhistoryModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal_right_side" role="document">
	<div class="modal-content col-12 col-md-3">
	  <div class="modal-header">
		<h5 class="modal-title">Update Bid</h5>
		<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  </div>
	  <div class="modal-body modal_update_edibidhistory">
		</div>
	</div>
   </div>
</div>	
<?php include('footer.php');?>