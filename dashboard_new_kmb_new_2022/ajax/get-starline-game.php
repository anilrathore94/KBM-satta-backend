<?php include('../config.php');
$date = $_POST['date']; ?>
<label class="col-form-label">Game Name </label>

									<select class="form-control" name="game_name" id="game_name" required>
										<option value="">Select Name</option>

										<?php $select_ = mysqli_query($con,"SELECT * FROM starline_game_name WHERE game_status='1'");
										while($select = mysqli_fetch_array($select_)){
										     $check_game = mysqli_query($con,"SELECT * FROM starline_result_chart WHERE game_name='$select[games_name]' AND date = '$date'");
										    if(mysqli_num_rows($check_game)>0){
										        $check_entry = mysqli_query($con,"SELECT * FROM starline_result_chart WHERE game_name='$select[games_name]' AND date = '$date' AND  open_panna !='' AND open_digit !=''");
										        if(mysqli_num_rows($check_entry)>0){
										            
										        }else{
										            ?>
										        <option value="<?php echo $select['games_name'];?>"><?php echo $select['games_name'];?> (<?php echo $select['open_time'];?>)</option>
										    <?php 
										        }
										    }else{
										        ?>
										        <option value="<?php echo $select['games_name'];?>"><?php echo $select['games_name'];?> (<?php echo $select['open_time'];?>)</option>
										    <?php
										    }
										    
										}
										?></select>
										
										

