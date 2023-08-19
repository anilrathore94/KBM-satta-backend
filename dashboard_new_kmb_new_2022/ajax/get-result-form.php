<?php include('../config.php');?>
<div class="col-12 col-sm-12 col-lg-12" data-select2-id="460">

				<div class="row" data-select2-id="459">
<!-- getDigitOpenResult select2 pana -->
					<div class="col-sm-12 col-12 " data-select2-id="458">

						<div class="card" data-select2-id="457">
                            <?php 
                                $date = $_POST['date'];
                                $game = $_POST['game'];
                                $session = $_POST['session'];
                                $get_result = mysqli_query($con,"SELECT * FROM result_chart WHERE date = '$date' AND game_name='$game'");
                                
                                if($session == ""){
                                    if(mysqli_num_rows($get_result)>0){
                                    $result = mysqli_fetch_array($get_result);
                                    ?>
                                    <div class="card-body" data-select2-id="456">
								<h4 class="card-title">Declare Result</h4>
									<div class="mt-3" id="withdraw_data_details" style="display: none;">
										<div class="bs_box bs_box_light_withdraw">
											<span>Open Result :-</span>
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
												<select class="" name="open_pana" id="open_pana" onchange="showMe1(this.value)">
                                            <option value="">Select Pana</option>
                                            <?php $select_pana = mysqli_query($con,"SELECT * FROM game_number WHERE type LIKE '%Pana%' GROUP BY number");
                                            while($select = mysqli_fetch_array($select_pana)){
                                                ?><option value="<?php echo $select['number'];?>"><?php echo $select['number'];?></option><?php
                                            }?>
                                        </select>
                                        <script>
                                        
                						var PanaSelect = new SlimSelect({
                						  select: '#open_pana',
                						  placeholder : 'Select Pana'
                						});
                					</script>
                                        <script>
                                            function showMe1(i){
                                                var value = i;
                                               sum = 0;

                                                while (value) {
                                                    sum += value % 10;
                                                    value = Math.floor(value / 10);
                                                }
                                                var lastDigit = String(sum).substr(-1);
                                                document.getElementById('open_result').value = lastDigit;

                                            } 
                                        </script>
												
																							</div>
											<div class="form-group col-md-4">
												<label>Digit</label>
												<input class="form-control" type="number" name="open_result" id="open_result" readonly="">
											</div>
											
											<div class="form-group col-md-4" id="open_div_msg"><label>&nbsp;</label><button type="button" class="btn btn-primary waves-light mr-1" id="openSaveBtn" name="openSaveBtn" onclick="OpenSaveData1();">Save</button><button type="button" class="btn btn-warning waves-light mr-1" onclick="OpenResultWinner();" id="openWin1">Show Winner</button><button type="submit" class="btn btn-primary waves-light mr-1" style="display:none" id="openDeclare1">Declare</button></div>
											<script>
											    function OpenSaveData1(){
											        document.getElementById('openDeclare1').style.display = 'inline-block';
											    }
											</script>

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
												<input class="form-control" type="number" name="open_pana" value="<?php echo $result['open_panna'];?>" id="open_pana" readonly="">
												
																							</div>
											<div class="form-group col-md-4">
												<label>Digit</label>
												<input class="form-control" type="number" name="open_result" value="<?php echo $result['open_digit'];?>" id="open_result" readonly="">
											</div>

										</div>
									
									</div>
								</div>
									<?php
									}
									
									if($result['close_panna']==""){
									    ?>
									    <div class="row close_panna_area" data-select2-id="690">
									<div class="col-12 col-md-12" data-select2-id="689">
										<div class="row" data-select2-id="688">
											
											<div class="form-group col-md-4" data-select2-id="687">
											    <label>Pana</label>
												<select class=" getDigitOpenResult select2 pana" name="close_pana" id="close_pana" onchange="showMe2(this.value)">
                                            <option value="">Select Pana</option>
                                            <?php $select_pana = mysqli_query($con,"SELECT * FROM game_number WHERE type LIKE '%Pana%' GROUP BY number");
                                            while($select = mysqli_fetch_array($select_pana)){
                                                ?><option value="<?php echo $select['number'];?>"><?php echo $select['number'];?></option><?php
                                            }?>
                                        </select>
                                         <script>
                                        
                						var PanaSelect = new SlimSelect({
                						  select: '#close_pana',
                						  placeholder : 'Select Pana'
                						});
                					</script>
                                        <script>
                                            function showMe2(i){
                                                var value = i;
                                               sum = 0;

                                                while (value) {
                                                    sum += value % 10;
                                                    value = Math.floor(value / 10);
                                                }
                                                var lastDigit = String(sum).substr(-1);
                                                document.getElementById('close_result').value = lastDigit;

                                            } 
                                        </script>
												
																							
											</div>
											<div class="form-group col-md-4">
												<label>Digit</label>
												<input class="form-control" type="number" name="close_result" id="close_result" readonly>
											</div>
											<script>
											    function CloseSaveData1(){
											        document.getElementById('closeDeclare1').style.display = 'inline-block';
											    }
											</script>
											<div class="form-group col-md-4" id="close_div_msg"><label>&nbsp;</label><button type="button" class="btn btn-primary waves-light mr-1" id="closeSaveBtn" name="closeSaveBtn" onclick="CloseSaveData1();">Save</button><button type="button" class="btn btn-warning waves-light mr-1" onclick="CloseResultWinner();" id="winner_close_btn">Show Winner</button><button type="submit" class="btn btn-primary waves-light mr-1" style="display:none" id="closeDeclare1">Declare</button></div>
										</div>
									</div>
								
								</div>
									    <?php
									}else{
									    ?>
									    <div class="row close_panna_area" data-select2-id="690">
									<div class="col-12 col-md-12" data-select2-id="689">
										<div class="row" data-select2-id="688">
											
											<div class="form-group col-md-4" data-select2-id="687">
											    <label>Pana</label>
												<input class="form-control" type="number" name="close_pana" id="close_pana" value="<?php echo $result['close_panna'];?>" readonly>
																							
											</div>
											<div class="form-group col-md-4">
												<label>Digit</label>
												<input class="form-control" type="number" name="close_result" id="close_result" value="<?php echo $result['close_digit'];?>" readonly>
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
											<span>Open Result :-</span>
											<b><span id="open_result_data">0</span></b>
										</div>
									</div>
								<div class="row open_panna_area" data-select2-id="455">
									<div class="col-12 col-md-12" data-select2-id="454">
									
																				<div class="row" data-select2-id="453">
											<div class="form-group col-md-4" data-select2-id="452">
											    <label>Pana</label>
												<select class="getDigitOpenResult pana" name="open_pana" id="open_pana" onchange="showMe1(this.value)">
                                            <option value="">Select Pana</option>
                                            <?php $select_pana = mysqli_query($con,"SELECT * FROM game_number WHERE type LIKE '%Pana%' GROUP BY number");
                                            while($select = mysqli_fetch_array($select_pana)){
                                                ?><option value="<?php echo $select['number'];?>"><?php echo $select['number'];?></option><?php
                                            }?>
                                        </select>
                                        <script>
                                        
                						var PanaSelect = new SlimSelect({
                						  select: '#open_pana',
                						  placeholder : 'Select Pana'
                						});
                					</script>
                                        <script>
                                            function showMe1(i){
                                                var value = i;
                                               sum = 0;

                                                while (value) {
                                                    sum += value % 10;
                                                    value = Math.floor(value / 10);
                                                }
                                                var lastDigit = String(sum).substr(-1);
                                                document.getElementById('open_result').value = lastDigit;

                                            } 
                                        </script>
												
																							</div>
											<div class="form-group col-md-4">
												<label>Digit</label>
												<input class="form-control" type="number" name="open_result" id="open_result" readonly="">
											</div>
											<script>
											    function OpenSaveData2(){
											        document.getElementById('openDeclare2').style.display = 'inline-block';
											    }
											</script>
											<div class="form-group col-md-4" id="open_div_msg"><label>&nbsp;</label><button type="button" class="btn btn-primary waves-light mr-1" id="openSaveBtn" name="openSaveBtn" onclick="OpenSaveData2();">Save</button><button type="button" class="btn btn-warning waves-light mr-1" onclick="OpenResultWinner();" id="winner_btn">Show Winner</button><button type="submit" class="btn btn-primary waves-light mr-1" style="display:none" id="openDeclare2">Declare</button></div>

										</div>
									
									</div>
								</div>
								
								
								<div class="row close_panna_area" data-select2-id="690">
									<div class="col-12 col-md-12" data-select2-id="689">
										<div class="row" data-select2-id="688">
											
											<div class="form-group col-md-4" data-select2-id="687">
                                                <label>Pana</label>
												<select class="getDigitOpenResult select2 pana" name="close_pana" id="close_pana" onchange="showMe2(this.value)">
                                            <option value="">Select Pana</option>
                                            <?php $select_pana = mysqli_query($con,"SELECT * FROM game_number WHERE type LIKE '%Pana%' GROUP BY number");
                                            while($select = mysqli_fetch_array($select_pana)){
                                                ?><option value="<?php echo $select['number'];?>"><?php echo $select['number'];?></option><?php
                                            }?>
                                        </select>
                                        <script>
                                        
                						var PanaSelect = new SlimSelect({
                						  select: '#close_pana',
                						  placeholder : 'Select Pana'
                						});
                					</script>
                                        <script>
                                            function showMe2(i){
                                                var value = i;
                                               sum = 0;

                                                while (value) {
                                                    sum += value % 10;
                                                    value = Math.floor(value / 10);
                                                }
                                                var lastDigit = String(sum).substr(-1);
                                                document.getElementById('close_result').value = lastDigit;

                                            } 
                                        </script>
												
																							
											</div>
											<div class="form-group col-md-4">
												<label>Digit</label>
												<input class="form-control" type="number" name="close_result" id="close_result" readonly>
											</div>
											
											<div class="form-group col-md-4" id="close_div_msg"><label>&nbsp;</label><button type="button" class="btn btn-primary waves-light mr-1" id="closeSaveBtn" name="closeSaveBtn" onclick="CloseSaveData2();">Save</button><button type="button" class="btn btn-warning waves-light mr-1" onclick="CloseResultWinner();" id="winner_close_btn">Show Winner</button><button type="submit" class="btn btn-primary waves-light mr-1" style="display:none" id="closeDeclare2">Declare</button></div>
											<script>
											    function CloseSaveData2(){
											        document.getElementById('closeDeclare2').style.display = 'inline-block';
											    }
											</script>
										</div>
									</div>
								
								</div>

								<div class="form-group">
									<div id="error"></div>
								</div>
									
							</div>
                                    <?php
                                }
                                }else if($session == "open"){
                                    if(mysqli_num_rows($get_result)>0){
                                    $result = mysqli_fetch_array($get_result);
                                    ?>
                                    <div class="card-body" data-select2-id="456">
								<h4 class="card-title">Declare Result</h4>
									<div class="mt-3" id="withdraw_data_details" style="display: none;">
										<div class="bs_box bs_box_light_withdraw">
											<span>Open Result :-</span>
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
												<select class="getDigitOpenResult  pana" name="open_pana" id="open_pana" onchange="showMe1(this.value)">
                                            <option value="">Select Pana</option>
                                            <?php $select_pana = mysqli_query($con,"SELECT * FROM game_number WHERE type LIKE '%Pana%' GROUP BY number");
                                            while($select = mysqli_fetch_array($select_pana)){
                                                ?><option value="<?php echo $select['number'];?>"><?php echo $select['number'];?></option><?php
                                            }?>
                                        </select>
                                        <script>
                                        
                						var PanaSelect = new SlimSelect({
                						  select: '#open_pana',
                						  placeholder : 'Select Pana'
                						});
                					</script>
                                        <script>
                                            function showMe1(i){
                                                var value = i;
                                               sum = 0;

                                                while (value) {
                                                    sum += value % 10;
                                                    value = Math.floor(value / 10);
                                                }
                                                var lastDigit = String(sum).substr(-1);
                                                document.getElementById('open_result').value = lastDigit;

                                            } 
                                        </script>
												
																							</div>
											<div class="form-group col-md-4">
												<label>Digit</label>
												<input class="form-control" type="number" name="open_result" id="open_result" readonly="">
											</div>
											<script>
											    function OpenSaveData3(){
											        document.getElementById('openDeclare3').style.display = 'inline-block';
											    }
											</script>
											<div class="form-group col-md-4" id="open_div_msg"><label>&nbsp;</label><button type="button" class="btn btn-primary waves-light mr-1" id="openSaveBtn" name="openSaveBtn" onclick="OpenSaveData3();">Save</button><button type="button" class="btn btn-warning waves-light mr-1" onclick="OpenResultWinner();" id="winner_btn">Show Winner</button><button type="submit" class="btn btn-primary waves-light mr-1" style="display:none" id="openDeclare3">Declare</button></div>

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
												<input class="form-control" type="number" name="open_pana" value="<?php echo $result['open_panna'];?>" id="open_pana" readonly="">
												
																							</div>
											<div class="form-group col-md-4">
												<label>Digit</label>
												<input class="form-control" type="number" name="open_result" value="<?php echo $result['open_digit'];?>" id="open_result" readonly="">
											</div>

										</div>
									
									</div>
								</div>
									<?php
									}
									
									    ?>
									    <div class="row close_panna_area" data-select2-id="690" style="display:none;">
									<div class="col-12 col-md-12" data-select2-id="689">
										<div class="row" data-select2-id="688">
											
											<div class="form-group col-md-4" data-select2-id="687">
											    <label>Pana</label>
												<select class="getDigitOpenResult select2 pana" name="close_pana" id="close_pana" onchange="showMe2(this.value)">
                                            <option value="">Select Pana</option>
                                            <?php $select_pana = mysqli_query($con,"SELECT * FROM game_number WHERE type LIKE '%Pana%' GROUP BY number");
                                            while($select = mysqli_fetch_array($select_pana)){
                                                ?><option value="<?php echo $select['number'];?>"><?php echo $select['number'];?></option><?php
                                            }?>
                                        </select>
                                        <script>
                                        
                						var PanaSelect = new SlimSelect({
                						  select: '#close_pana',
                						  placeholder : 'Select Pana'
                						});
                					</script>
                                        <script>
                                            function showMe2(i){
                                                var value = i;
                                               sum = 0;

                                                while (value) {
                                                    sum += value % 10;
                                                    value = Math.floor(value / 10);
                                                }
                                                var lastDigit = String(sum).substr(-1);
                                                document.getElementById('close_result').value = lastDigit;

                                            } 
                                        </script>
												
																							
											</div>
											<div class="form-group col-md-4">
												<label>Digit</label>
												<input class="form-control" type="number" name="close_result" id="close_result" readonly>
											</div>
											<script>
											    function CloseSaveData3(){
											        document.getElementById('closeDeclare3').style.display = 'inline-block';
											    }
											</script>
											<div class="form-group col-md-4" id="close_div_msg"><label>&nbsp;</label><button type="button" class="btn btn-primary waves-light mr-1" id="closeSaveBtn" name="closeSaveBtn" onclick="CloseSaveData3();">Save</button><button type="button" class="btn btn-warning waves-light mr-1" onclick="CloseResultWinner();" id="winner_close_btn">Show Winner</button><button type="submit" class="btn btn-primary waves-light mr-1" style="display:none" id="closeDeclare3">Declare</button></div>
										</div>
									</div>
								
								</div>
									    <?php
								
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
											<span>Open Result :-</span>
											<b><span id="open_result_data">0</span></b>
										</div>
									</div>
								<div class="row open_panna_area" data-select2-id="455">
									<div class="col-12 col-md-12" data-select2-id="454">
									
																				<div class="row" data-select2-id="453">
											<div class="form-group col-md-4" data-select2-id="452">
											    <label>Pana</label>
												<select class="getDigitOpenResult  pana" name="open_pana" id="open_pana" onchange="showMe1(this.value)">
                                            <option value="">Select Pana</option>
                                            <?php $select_pana = mysqli_query($con,"SELECT * FROM game_number WHERE type LIKE '%Pana%' GROUP BY number");
                                            while($select = mysqli_fetch_array($select_pana)){
                                                ?><option value="<?php echo $select['number'];?>"><?php echo $select['number'];?></option><?php
                                            }?>
                                        </select>
                                        <script>
                                        
                						var PanaSelect = new SlimSelect({
                						  select: '#open_pana',
                						  placeholder : 'Select Pana'
                						});
                					</script>
                                        <script>
                                            function showMe1(i){
                                                var value = i;
                                               sum = 0;

                                                while (value) {
                                                    sum += value % 10;
                                                    value = Math.floor(value / 10);
                                                }
                                                var lastDigit = String(sum).substr(-1);
                                                document.getElementById('open_result').value = lastDigit;

                                            } 
                                        </script>
												
																							</div>
											<div class="form-group col-md-4">
												<label>Digit</label>
												<input class="form-control" type="number" name="open_result" id="open_result" readonly="">
											</div>
											<script>
											    function OpenSaveData4(){
											        document.getElementById('openDeclare4').style.display = 'inline-block';
											    }
											</script>
											<div class="form-group col-md-4" id="open_div_msg"><label>&nbsp;</label><button type="button" class="btn btn-primary waves-light mr-1" id="openSaveBtn" name="openSaveBtn" onclick="OpenSaveData4();">Save</button><button type="button" class="btn btn-warning waves-light mr-1" onclick="OpenResultWinner();" id="winner_btn">Show Winner</button><button type="submit" class="btn btn-primary waves-light mr-1" style="display:none" id="openDeclare4">Declare</button></div>

										</div>
									
									</div>
								</div>
								
								
								<div class="row close_panna_area" data-select2-id="690" style="display:none;">
									<div class="col-12 col-md-12" data-select2-id="689">
										<div class="row" data-select2-id="688">
											
											<div class="form-group col-md-4" data-select2-id="687">
                                                <label>Pana</label>
												<select class="getDigitOpenResult select2 pana" name="close_pana" id="close_pana" onchange="showMe2(this.value)">
                                            <option value="">Select Pana</option>
                                            <?php $select_pana = mysqli_query($con,"SELECT * FROM game_number WHERE type LIKE '%Pana%' GROUP BY number");
                                            while($select = mysqli_fetch_array($select_pana)){
                                                ?><option value="<?php echo $select['number'];?>"><?php echo $select['number'];?></option><?php
                                            }?>
                                        </select>
                                        <script>
                                        
                						var PanaSelect = new SlimSelect({
                						  select: '#close_pana',
                						  placeholder : 'Select Pana'
                						});
                					</script>
                                        <script>
                                            function showMe2(i){
                                                var value = i;
                                               sum = 0;

                                                while (value) {
                                                    sum += value % 10;
                                                    value = Math.floor(value / 10);
                                                }
                                                var lastDigit = String(sum).substr(-1);
                                                document.getElementById('close_result').value = lastDigit;

                                            } 
                                        </script>
												
																							
											</div>
											<div class="form-group col-md-4">
												<label>Digit</label>
												<input class="form-control" type="number" name="close_result" id="close_result" readonly>
											</div>
											<script>
											    function CloseSaveData4(){
											        document.getElementById('closeDeclare4').style.display = 'inline-block';
											    }
											</script>
											<div class="form-group col-md-4" id="close_div_msg"><label>&nbsp;</label><button type="button" class="btn btn-primary waves-light mr-1" id="closeSaveBtn" name="closeSaveBtn" onclick="CloseSaveData4();">Save</button><button type="button" class="btn btn-warning waves-light mr-1" onclick="CloseResultWinner();" id="winner_close_btn">Show Winner</button><button type="submit" class="btn btn-primary waves-light mr-1" style="display:none" id="closeDeclare4">Declare</button></div>
										</div>
									</div>
								
								</div>

								<div class="form-group">
									<div id="error"></div>
								</div>
									
							</div>
                                    <?php
                                }
                                }else{
                                    if(mysqli_num_rows($get_result)>0){
                                    $result = mysqli_fetch_array($get_result);
                                    ?>
                                    <div class="card-body" data-select2-id="456">
								<h4 class="card-title">Declare Result</h4>
									<div class="mt-3" id="withdraw_data_details" style="display: none;">
										<div class="bs_box bs_box_light_withdraw">
											<span>Open Result :-</span>
											<b><span id="open_result_data">0</span></b>
										</div>
									</div>
									    <div class="row open_panna_area" data-select2-id="455"  style="display:none;">
									<div class="col-12 col-md-12" data-select2-id="454">
									
																				<div class="row" data-select2-id="453">
											<div class="form-group col-md-4" data-select2-id="452">
											    <label>Pana</label>
												<select class="getDigitOpenResult  pana" name="open_pana" id="open_pana" onchange="showMe1(this.value)">
                                            <option value="">Select Pana</option>
                                            <?php $select_pana = mysqli_query($con,"SELECT * FROM game_number WHERE type LIKE '%Pana%' GROUP BY number");
                                            while($select = mysqli_fetch_array($select_pana)){
                                                ?><option value="<?php echo $select['number'];?>"><?php echo $select['number'];?></option><?php
                                            }?>
                                        </select>
                                        <script>
                                        
                						var PanaSelect = new SlimSelect({
                						  select: '#open_pana',
                						  placeholder : 'Select Pana'
                						});
                					</script>
                                        <script>
                                            function showMe1(i){
                                                var value = i;
                                               sum = 0;

                                                while (value) {
                                                    sum += value % 10;
                                                    value = Math.floor(value / 10);
                                                }
                                                var lastDigit = String(sum).substr(-1);
                                                document.getElementById('open_result').value = lastDigit;

                                            } 
                                        </script>
												
																							</div>
											<div class="form-group col-md-4">
												<label>Digit</label>
												<input class="form-control" type="number" name="open_result" id="open_result" readonly="">
											</div>
											<script>
											    function OpenSaveData5(){
											        document.getElementById('openDeclare5').style.display = 'inline-block';
											    }
											</script>
											<div class="form-group col-md-4" id="open_div_msg"><label>&nbsp;</label><button type="button" class="btn btn-primary waves-light mr-1" id="openSaveBtn" name="openSaveBtn" onclick="OpenSaveData5();">Save</button><button type="button" class="btn btn-warning waves-light mr-1" onclick="OpenResultWinner();" id="winner_btn">Show Winner</button><button type="submit" class="btn btn-primary waves-light mr-1" style="display:none" id="openDeclare5">Declare</button></div>

										</div>
									
									</div>
								</div>
									    
									<?
									if($result['close_panna']==""){
									    ?>
									    <div class="row close_panna_area" data-select2-id="690">
									<div class="col-12 col-md-12" data-select2-id="689">
										<div class="row" data-select2-id="688">
											
											<div class="form-group col-md-4" data-select2-id="687">
											    <label>Pana</label>
												<select class="getDigitOpenResult select2 pana" name="close_pana" id="close_pana" onchange="showMe2(this.value)">
                                            <option value="">Select Pana</option>
                                            <?php $select_pana = mysqli_query($con,"SELECT * FROM game_number WHERE type LIKE '%Pana%' GROUP BY number");
                                            while($select = mysqli_fetch_array($select_pana)){
                                                ?><option value="<?php echo $select['number'];?>"><?php echo $select['number'];?></option><?php
                                            }?>
                                        </select>
                                        <script>
                                        
                						var PanaSelect = new SlimSelect({
                						  select: '#close_pana',
                						  placeholder : 'Select Pana'
                						});
                					</script>
                                        <script>
                                            function showMe2(i){
                                                var value = i;
                                               sum = 0;

                                                while (value) {
                                                    sum += value % 10;
                                                    value = Math.floor(value / 10);
                                                }
                                                var lastDigit = String(sum).substr(-1);
                                                document.getElementById('close_result').value = lastDigit;

                                            } 
                                        </script>
												
																							
											</div>
											<div class="form-group col-md-4">
												<label>Digit</label>
												<input class="form-control" type="number" name="close_result" id="close_result" readonly>
											</div>
											<script>
											    function CloseSaveData5(){
											        document.getElementById('closeDeclare5').style.display = 'inline-block';
											    }
											</script>
											<div class="form-group col-md-4" id="close_div_msg"><label>&nbsp;</label><button type="button" class="btn btn-primary waves-light mr-1" id="closeSaveBtn" name="closeSaveBtn" onclick="CloseSaveData5();">Save</button><button type="button" class="btn btn-warning waves-light mr-1" onclick="CloseResultWinner();" id="winner_close_btn">Show Winner</button><button type="submit" class="btn btn-primary waves-light mr-1" style="display:none" id="closeDeclare5">Declare</button></div>
										</div>
									</div>
								
								</div>
									    <?php
									}else{
									    ?>
									    <div class="row close_panna_area" data-select2-id="690">
									<div class="col-12 col-md-12" data-select2-id="689">
										<div class="row" data-select2-id="688">
											
											<div class="form-group col-md-4" data-select2-id="687">
											    <label>Pana</label>
												<input class="form-control" type="number" name="close_pana" id="close_pana" value="<?php echo $result['close_panna'];?>" readonly>
																							
											</div>
											<div class="form-group col-md-4">
												<label>Digit</label>
												<input class="form-control" type="number" name="close_result" id="close_result" value="<?php echo $result['close_digit'];?>" readonly>
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
											<span>Open Result :-</span>
											<b><span id="open_result_data">0</span></b>
										</div>
									</div>
								<div class="row open_panna_area" data-select2-id="455"  style="display:none;">
									<div class="col-12 col-md-12" data-select2-id="454">
									
																				<div class="row" data-select2-id="453">
											<div class="form-group col-md-4" data-select2-id="452">
											    <label>Pana</label>
												<select class="getDigitOpenResult  pana" name="open_pana" id="open_pana" onchange="showMe1(this.value)">
                                            <option value="">Select Pana</option>
                                            <?php $select_pana = mysqli_query($con,"SELECT * FROM game_number WHERE type LIKE '%Pana%' GROUP BY number");
                                            while($select = mysqli_fetch_array($select_pana)){
                                                ?><option value="<?php echo $select['number'];?>"><?php echo $select['number'];?></option><?php
                                            }?>
                                        </select>
                                        <script>
                                        
                						var PanaSelect = new SlimSelect({
                						  select: '#open_pana',
                						  placeholder : 'Select Pana'
                						});
                					</script>
                                        <script>
                                            function showMe1(i){
                                                var value = i;
                                               sum = 0;

                                                while (value) {
                                                    sum += value % 10;
                                                    value = Math.floor(value / 10);
                                                }
                                                var lastDigit = String(sum).substr(-1);
                                                document.getElementById('open_result').value = lastDigit;

                                            } 
                                        </script>
												
																							</div>
											<div class="form-group col-md-4">
												<label>Digit</label>
												<input class="form-control" type="number" name="open_result" id="open_result" readonly="">
											</div>
											<script>
											    function OpenSaveData6(){
											        document.getElementById('openDeclare6').style.display = 'inline-block';
											    }
											</script>
											<div class="form-group col-md-4" id="open_div_msg"><label>&nbsp;</label><button type="button" class="btn btn-primary waves-light mr-1" id="openSaveBtn" name="openSaveBtn" onclick="OpenSaveData6();">Save</button><button type="button" class="btn btn-warning waves-light mr-1" onclick="OpenResultWinner();" id="winner_btn">Show Winner</button><button type="submit" class="btn btn-primary waves-light mr-1" style="display:none" id="openDeclare6">Declare</button></div>

										</div>
									
									</div>
								</div>
								
								
								<div class="row close_panna_area" data-select2-id="690">
									<div class="col-12 col-md-12" data-select2-id="689">
										<div class="row" data-select2-id="688">
											
											<div class="form-group col-md-4" data-select2-id="687">
                                                <label>Pana</label>
												<select class="getDigitOpenResult select2 pana" name="close_pana" id="close_pana" onchange="showMe2(this.value)">
                                            <option value="">Select Pana</option>
                                            <?php $select_pana = mysqli_query($con,"SELECT * FROM game_number WHERE type LIKE '%Pana%' GROUP BY number");
                                            while($select = mysqli_fetch_array($select_pana)){
                                                ?><option value="<?php echo $select['number'];?>"><?php echo $select['number'];?></option><?php
                                            }?>
                                        </select>
                                        <script>
                                        
                						var PanaSelect = new SlimSelect({
                						  select: '#close_pana',
                						  placeholder : 'Select Pana'
                						});
                					</script>
                                        <script>
                                            function showMe2(i){
                                                var value = i;
                                               sum = 0;

                                                while (value) {
                                                    sum += value % 10;
                                                    value = Math.floor(value / 10);
                                                }
                                                var lastDigit = String(sum).substr(-1);
                                                document.getElementById('close_result').value = lastDigit;

                                            } 
                                        </script>
												
																							
											</div>
											<div class="form-group col-md-4">
												<label>Digit</label>
												<input class="form-control" type="number" name="close_result" id="close_result" readonly>
											</div>
											<script>
											    function CloseSaveData6(){
											        document.getElementById('closeDeclare6').style.display = 'inline-block';
											    }
											</script>
											<div class="form-group col-md-4" id="close_div_msg"><label>&nbsp;</label><button type="button" class="btn btn-primary waves-light mr-1" id="closeSaveBtn" name="closeSaveBtn" onclick="CloseSaveData6();">Save</button><button type="button" class="btn btn-warning waves-light mr-1" onclick="CloseResultWinner();" id="winner_close_btn">Show Winner</button><button type="submit" class="btn btn-primary waves-light mr-1" style="display:none" id="closeDeclare6">Declare</button></div>
										</div>
									</div>
								
								</div>

								<div class="form-group">
									<div id="error"></div>
								</div>
									
							</div>
                                    <?php
                                }
                                }
                                
                                
                                
                                
                                ?>
							

					</div>
				</div>
			</div>
		</div>