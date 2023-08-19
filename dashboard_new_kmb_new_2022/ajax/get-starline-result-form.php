<?php include('../config.php');?>

<div class="col-12 col-sm-12 col-lg-12" data-select2-id="460">

				<div class="row" data-select2-id="459">

					<div class="col-sm-12 col-12 " data-select2-id="458">

						<div class="card" data-select2-id="457">
                            <?php 
                                $date = $_POST['date'];
                                $game = $_POST['game'];
                                
                                $get_result = mysqli_query($con,"SELECT * FROM starline_result_chart WHERE date = '$date' AND game_name='$game'");
                                
                                if(mysqli_num_rows($get_result)>0){
                                    $result = mysqli_fetch_array($get_result);
                                    ?>
                                    <div class="card-body" data-select2-id="456">
								<h4 class="card-title">Declare Result</h4>
									<div class="mt-3" id="withdraw_data_details" style="display: none;">
										<div class="bs_box bs_box_light_withdraw">
											<span>Result :-</span>
											<b><span id="open_result_data">0</span></b>
										</div>
									</div>
									<?php if($result['open_panna']==""){
									    ?>
									    <div class="row open_panna_area" data-select2-id="455">
									<div class="col-12 col-md-12" data-select2-id="454">
									
																				<div class="row" data-select2-id="453">
											<div class="form-group col-md-4" data-select2-id="452">
											    <label>Pana</label>
												<select class="form-control getDigitOpenResult select2 pana" name="pana" id="pana" onchange="showMe1(this.value)">
                                            <option value="">Select Pana</option>
                                            <?php $select_pana = mysqli_query($con,"SELECT * FROM game_number WHERE type LIKE '%Pana%' GROUP BY number");
                                            while($select = mysqli_fetch_array($select_pana)){
                                                ?><option value="<?php echo $select['number'];?>"><?php echo $select['number'];?></option><?php
                                            }?>
                                        </select>
                                        <script>
                                            function showMe1(i){
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
											<div class="form-group col-md-4">
												<label>Digit</label>
												<input class="form-control" type="number" name="result" id="result" readonly="">
											</div>
											
											<div class="form-group col-md-4" id="open_div_msg"><label>&nbsp;</label><button type="button" class="btn btn-primary waves-light mr-1" id="openSaveBtn" name="openSaveBtn" onclick="OpenSaveData();">Save</button><button type="button" class="btn btn-warning waves-light mr-1" onclick="OpenResultWinner();" id="winner_btn">Show Winner</button><button type="submit" class="btn btn-primary waves-light mr-1" id="openDecBtn" name="openDecBtn" >Declare</button></div>

										</div>
									
									</div>
								</div>
									    <?php
									}else{ 
									?>
									<div class="row open_panna_area" data-select2-id="455">
									<div class="col-12 col-md-12" data-select2-id="454">
									
																				<div class="row" data-select2-id="453">
											<div class="form-group col-md-4" data-select2-id="452">
											    <label>Pana</label>
												<input class="form-control" type="number" name="pana" value="<?php echo $result['open_panna'];?>" id="pana" readonly="">
												
																							</div>
											<div class="form-group col-md-4">
												<label>Digit</label>
												<input class="form-control" type="number" name="result" value="<?php echo $result['open_digit'];?>" id="result" readonly="">
											</div>

										</div>
									
									</div>
								</div>
									<?php
									}
									?>
								
								
								
								

								<div class="form-group">
									<div id="error"></div>
								</div>
									
							</div>
                                    <?php
                                }else{
                                    ?>
                                    <div class="card-body" data-select2-id="456">
								<h4 class="card-title">Declare Result</h4>
									<div class="mt-3" id="withdraw_data_details" style="display: none;">
										<div class="bs_box bs_box_light_withdraw">
											<span>Result :-</span>
											<b><span id="open_result_data">0</span></b>
										</div>
									</div>
								<div class="row open_panna_area" data-select2-id="455">
									<div class="col-12 col-md-12" data-select2-id="454">
									
																				<div class="row" data-select2-id="453">
											<div class="form-group col-md-4" data-select2-id="452">
											    <label>Pana</label>
												<select class="form-control getDigitOpenResult select2 pana" name="pana" id="pana" onchange="showMe1(this.value)">
                                            <option value="">Select Pana</option>
                                            <?php $select_pana = mysqli_query($con,"SELECT * FROM game_number WHERE type LIKE '%Pana%' GROUP BY number");
                                            while($select = mysqli_fetch_array($select_pana)){
                                                ?><option value="<?php echo $select['number'];?>"><?php echo $select['number'];?></option><?php
                                            }?>
                                        </select>
                                        <script>
                                            function showMe1(i){
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
											<div class="form-group col-md-4">
												<label>Digit</label>
												<input class="form-control" type="number" name="result" id="result" readonly="">
											</div>
											<script>
											    function OpenSaveData(){
											        document.getElementById('openDeclare').style.display = 'inline-block';
											    }
											</script>
											<div class="form-group col-md-4" id="open_div_msg"><label>&nbsp;</label><button type="button" class="btn btn-primary waves-light mr-1" id="openSaveBtn" name="openSaveBtn" onclick="OpenSaveData();">Save</button><button type="button" class="btn btn-warning waves-light mr-1" onclick="OpenResultWinner();" id="winner_btn">Show Winner</button><button type="submit" class="btn btn-primary waves-light mr-1" style="display:none;" id="openDeclare" name="openDecBtn" >Declare</button></div>

										</div>
									
									</div>
								</div>

								<div class="form-group">
									<div id="error"></div>
								</div>
									
							</div>
                                    <?php
                                }
                                ?>
							

					</div>
				</div>
			</div>
		</div>