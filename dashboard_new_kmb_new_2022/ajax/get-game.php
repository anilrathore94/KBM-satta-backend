<?php include('../config.php');
$date = $_POST['date']; ?>

									<label class="col-form-label">Game Name </label>

									<select class="form-control" name="game_name" id="game_name" required>
										<option value="">Select Name</option>
                                        
										<?php
										$select_market_open_time = mysqli_fetch_array(mysqli_query($con,"SELECT market_open_time FROM admin_settings"));
        							    $dateTime = new DateTime($select_market_open_time['market_open_time']);
                                        if ($dateTime->diff(new DateTime)->format('%R') == '+') {
                                          $today = $date;
                                        }else{
                                            $today = date('Y-m-d', strtotime($date .' -1 day'));
                                        }
                                        $day = date('l', $today);
									$select_game = mysqli_query($con,"SELECT * FROM game_time WHERE day='$day' AND status='1' ORDER BY close_time ASC");
										while($select = mysqli_fetch_array($select_game)){
										    $check_game = mysqli_query($con,"SELECT * FROM result_chart WHERE game_name='$select[game]' AND date = '$today'");
										    if(mysqli_num_rows($check_game)>0){
										        $check_entry = mysqli_query($con,"SELECT * FROM result_chart WHERE game_name='$select[game]' AND date = '$today' AND (close_panna !='' AND close_digit !='' AND open_panna !='' AND open_digit !='')");
										        if(mysqli_num_rows($check_entry)>0){
										            
										        }else{
										            ?>
										        <option value="<?php echo $select['game'];?>"><?php echo $select['game'];?> (<?php echo $select['open_time'];?>-<?php echo $select['close_time'];?>)</option>
										    <?php 
										        }
										    }else{
										        ?>
										        <option value="<?php echo $select['game'];?>"><?php echo $select['game'];?> (<?php echo $select['open_time'];?>-<?php echo $select['close_time'];?>)</option>
										    <?php
										    }
										    
										}
										?>
																		</select>

