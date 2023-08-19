<?php 
include('header.php');
include('sidebar.php');?>
<div class="main-content">	
<div class="page-content"><br>
          
      	<div class="container-fluid">
      	    <form class="theme-form mega-form">

	<div class="row">

		<div class="col-12 col-sm-12 col-lg-12">

            <div class="row">

				<div class="col-sm-12 col-12 ">

                    <div class="card">

                      <div class="card-header">

                        <h5>Declare Result</h5>

                      </div>

						<div class="card-body">

							

							<div class="row">
							    
							    <div class="form-group col-md-2" style="margin-top: auto;">

									<label>Result Date</label>

										  <input class="form-control" type="date" data-date-format="yyyy-mm-dd"  data-language="en" name="date" id="date" placeholder="Enter Start Date" value="<?php echo date('Y-m-d');?>" onchange="getGame()" required max="<?php echo date('Y-m-d');?>">
                                          <script>
                                          getGame();
									function getGame(){
									var date = document.getElementById('date').value;
							        $.ajax ({
                                        type: 'POST',
                                        url: 'ajax/get-game.php',
                                        data: {date: date},
                                        success : function(htmlresponse) {
                                            $('#game').html(htmlresponse);
                                           
                                        }
                                    });

                                }</script>

								</div>
								
								<span id ="game" class="form-group col-md-4"></span>

								
								
								
									<div class="form-group col-md-4">
									<label class="col-form-label">Session</label>

									<select class="form-control" name="session" id="session" onchange="" required>
										<option value="">Select Session</option>  
										<option value="open">Open</option>
										<option value="close">Close</option>
										 </select>
										 
										 <script>
										     function changeVal(val){
										         	var name = document.getElementById('game_name').value;
									var date = document.getElementById('date').value;
									var session = document.getElementById('session').value;
									
							        $.ajax ({
                                        type: 'POST',
                                        url: 'ajax/get-result-form.php',
                                        data: {game: name, date: date,session:session},
                                        success : function(htmlresponse) {
                                            $('#form').html(htmlresponse);
                                            $('.ss-arrow').removeClass('ss-arrow');
                                           
                                        }
                                    });
										         /*if(val == "" ){
										             document.getElementById('open_r').style.display = "none";
										             
										         }else {
										             document.getElementById('open_r').style.display = "block";
										         }*/
										     }
										
										 </script>
								</div>
								<div class="form-group col-md-2">
								    <button type="button" class="btn btn-primary waves-light m-t-10 mtop_25" onclick="changeVal()"  style="margin-left: 10px;margin-top: 36px;">GO</button>
								</div>
								
						
								
								
									<!--<div id="open_r" style="display:none;margin-left: 1.5%;">
								    <div class="row">
							    	<div class="form-group col-md-6">

									<label>Pana</label>

									<div>

										<div class="input-group">
                                        <select id="single-select" class="form-control getDigitOpenResult select2 pana" name="pana" id="pana" required onchange="showMe(this.value)">
                                            <option value="">Select Pana</option>
                                            <?php $select_pana = mysqli_query($con,"SELECT * FROM game_number WHERE type LIKE '%Pana%' GROUP BY number");
                                            while($select = mysqli_fetch_array($select_pana)){
                                                ?><option value="<?php echo $select['number'];?>"><?php echo $select['number'];?></option><?php
                                            }?>
                                        </select>
                                        <script>
                                            function showMe(i){
                                                var value = i;
                                               sum = 0;

                                                while (value) {
                                                    sum += value % 10;
                                                    value = Math.floor(value / 10);
                                                }
                                                var lastDigit = String(sum).substr(-1);
                                                document.getElementById('result').value = lastDigit;

                                            } 
                                        </script>
										</div>

									</div>

								</div>
								<div class="form-group col-md-6">

									<label>Result</label>

									<div class="date-picker">

										<div class="input-group">

										  <input class="form-control" type="text" value="" name="result" id="result" placeholder="Enter Open Result" readonly>

										</div>

									</div>

								</div>  
							</div>
							</div>-->
							
								
								<!--<br>
								<div class="form-group" style="    align-self: flex-end;">
									<input type="button" class="btn btn-primary waves-light m-t-10 mtop_25"  style="margin-left: 10px;" onclick="return showWinner();" value="Show Winner">
									<script>
									function showWinner(){
									   
									var name = document.getElementById('game_name').value;
									var date = document.getElementById('date').value;
									var session =document.getElementById('session').value;
									var pana = document.getElementById('single-select').value;
									var digit = document.getElementById('result').value;
									
							        $.ajax ({
                                        type: 'POST',
                                        url: 'ajax/get-winner.php',
                                        data: {name: name, date: date, session: session, pana: pana, digit: digit},
                                        success : function(htmlresponse) {
                                            $('#bids').html(htmlresponse);
                                           
                                        }
                                    });
    
                                     return false;
                                }</script>
								</div>
										<div class="form-group" style="    align-self: flex-end;">
									<button type="submit" class="btn btn-primary waves-light m-t-10 mtop_25"  style="    margin-left: 10px;">Declare</button>
								</div>-->
								
							
								
						       </div>	

							
							
							</div>

                    </div>

                </div>

			</div>

		</div>

	</div>
	<div class="row">
	    <span id="form" style="    width: -webkit-fill-available;"></span>
	</div>
	</form>
	
	<script>
									function OpenResultWinner(){
									   
									var name = document.getElementById('game_name').value;
									var date = document.getElementById('date').value;
									var session =document.getElementById('session').value;
									var pana = document.getElementById('open_pana').value;
									var digit = document.getElementById('open_result').value;
									
							        $.ajax ({
                                        type: 'POST',
                                        url: 'ajax/get-winner.php',
                                        data: {name: name, date: date, session: session, pana: pana, digit: digit},
                                        success : function(htmlresponse) {
                                            $('#bids').html(htmlresponse);
                                            $('#winnerHistory').DataTable();
                                           
                                        }
                                    });
    
                                     return false;
                                }</script>
                                <script>
									function CloseResultWinner(){
									   
									var name = document.getElementById('game_name').value;
									var date = document.getElementById('date').value;
									var session =document.getElementById('session').value;
									var pana = document.getElementById('close_pana').value;
									var digit = document.getElementById('close_result').value;
									
							        $.ajax ({
                                        type: 'POST',
                                        url: 'ajax/get-winner.php',
                                        data: {name: name, date: date, session: session, pana: pana, digit: digit},
                                        success : function(htmlresponse) {
                                            $('#bids').html(htmlresponse);
                                           $('#winnerHistory').DataTable();
                                        }
                                    });
    
                                     return false;
                                }</script>
	
	<div class="row">
	    <span id="bids" style="    width: -webkit-fill-available;"></span>
	</div>
	
	
	<div class="form-group col-md-2">

									<label>Result Date</label>

									<div class="date-picker">

										<div class="input-group">
                                            
										  <input class="form-control digits" type="date" data-date-format="yyyy-mm-dd"  data-language="en" name="date" id="date1" placeholder="Enter Start Date" value="<?php echo date('Y-m-d');?>" required onchange="getResult()" max="<?php echo date('Y-m-d');?>">
										  <script></script>
                                            <script>
                                            getResult();
									function getResult(){
									var date = document.getElementById('date1').value;
							        $.ajax ({
                                        type: 'POST',
                                        url: 'ajax/get-result.php',
                                        data: {date: date},
                                        success : function(htmlresponse) {
                                            $('#results').html(htmlresponse);
                                            $('#resultHistory').DataTable();
                                           
                                        }
                                    });

                                }</script>
										</div>

									</div>

								</div>
	<div class="row">
	    
	    <span id="results" style="    width: -webkit-fill-available;"></span>
	</div>
	
</div>

</div>
<script>
      $(function () {

        $('form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'action-code/declare-result.php',
            data: $('form').serialize(),
            success: function (response) {
              $('#error').html(response);
              getResult();
            }
          });

        });

      });
    </script>

<?php include('footer.php');?>