<?php include('header.php');
include('sidebar.php');

$id = $_GET['id'];
$select_game = mysqli_fetch_array(mysqli_query($con,"SELECT * from game_time WHERE id='$id'"));
?>
<div class="main-content">
        <div class="page-content"><br>
          
      	<div class="container-fluid">
	<div class="row">
	<!-- Zero Configuration  Starts-->	
		<div class="col-sm-12">
			<div class="card">
			  <div class="card-body">
			  <h4 class="card-title">Edit Game Time</h4>		  
			  <form class="theme-form" method="post" action="edit/edit-game-time.php" >
			<div class="row">
				<input type="hidden" name="id" value="<?php echo $id;?>">
				<div class="form-group col-12">
					<label for="game_name">Game Name</label>
					<input type="text" name="game_name" id="game_name" class="form-control" placeholder="Enter Game Name" value="<?php echo $select_game['game']?>" readonly>
				</div>
				<!-- sunday -->
				<?php $select = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM game_time WHERE game='$select_game[game]' AND day='Sunday'")); ?>
				<label><strong>Sunday</strong></label><br/>
				<div class="row col-12">
				    
				<div class="form-group col-6">
                            <label for="sunday_open_time">Open Time</label>
                              <input name="sunday_open_time" id="sunday_open_time" class="form-control digits" type="time" required value="<?php echo date("H:i", strtotime($select['open_time']));?>">
                            
                </div>
                <div class="form-group col-6">
                            <label for="sunday_close_time">Close Time</label>
                              <input name="sunday_close_time" id="sunday_close_time" class="form-control digits" type="time" required value="<?php echo date("H:i", strtotime($select['close_time']));?>">
                            
                </div>
                <div class="form-group col-6">
                            <label for="sunday_status">Status</label>
                              <select name="sunday_status" id="sunday_status" class="form-control" required>
                                  <option value="0" <?php if($select['status']==="0"){echo "selected";}?>>Inactive</option>
                                  <option value="1" <?php if($select['status']==="1"){echo "selected";}?>>Active</option>
                            </select>
                </div>
               </div>
               <!-- monday -->
               <?php $select = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM game_time WHERE game='$select_game[game]' AND day='Monday'")); ?>
               <label><strong>Monday</strong></label><br/>
				<div class="row col-12">
				    
				<div class="form-group col-6">
                            <label for="monday_open_time">Open Time</label>
                              <input name="monday_open_time" id="monday_open_time" class="form-control digits" type="time" required value="<?php echo date("H:i", strtotime($select['open_time']));?>">
                            
                </div>
                <div class="form-group col-6">
                            <label for="monday_close_time">Close Time</label>
                              <input name="monday_close_time" id="monday_close_time" class="form-control digits" type="time" required value="<?php echo date("H:i", strtotime($select['close_time']));?>">
                            
                </div>
                <div class="form-group col-6">
                            <label for="monday_status">Status</label>
                              <select name="monday_status" id="monday_status" class="form-control" required>
                                  <option value="0" <?php if($select['status']==="0"){echo "selected";}?>>Inactive</option>
                                  <option value="1" <?php if($select['status']==="1"){echo "selected";}?>>Active</option>
                            </select>
                </div>
               </div>
               <!-- tuesday -->
               <?php $select = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM game_time WHERE game='$select_game[game]' AND day='Tuesday'")); ?>
               <label><strong>Tuesday</strong></label><br/>
				<div class="row col-12">
				    
				<div class="form-group col-6">
                            <label for="tuesday_open_time">Open Time</label>
                              <input name="tuesday_open_time" id="tuesday_open_time" class="form-control digits" type="time" required value="<?php echo date("H:i", strtotime($select['open_time']));?>">
                            
                </div>
                <div class="form-group col-6">
                            <label for="tuesday_close_time">Close Time</label>
                              <input name="tuesday_close_time" id="tuesday_close_time" class="form-control digits" type="time" required value="<?php echo date("H:i", strtotime($select['close_time']));?>">
                            
                </div>
                <div class="form-group col-6">
                            <label for="tuesday_status">Status</label>
                              <select name="tuesday_status" id="tuesday_status" class="form-control" required>
                                  <option value="0" <?php if($select['status']==="0"){echo "selected";}?>>Inactive</option>
                                  <option value="1" <?php if($select['status']==="1"){echo "selected";}?>>Active</option>
                            </select>
                </div>
               </div>
               <!-- wednesday -->
               <?php $select = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM game_time WHERE game='$select_game[game]' AND day='Wednesday'")); ?>
               <label><strong>Wednesday</strong></label><br/>
				<div class="row col-12">
				    
				<div class="form-group col-6">
                            <label for="wednesday_open_time">Open Time</label>
                              <input name="wednesday_open_time" id="wednesday_open_time" class="form-control digits" type="time" required value="<?php echo date("H:i", strtotime($select['open_time']));?>">
                            
                </div>
                <div class="form-group col-6">
                            <label for="wednesday_close_time">Close Time</label>
                              <input name="wednesday_close_time" id="wednesday_close_time" class="form-control digits" type="time" required value="<?php echo date("H:i", strtotime($select['close_time']));?>">
                            
                </div>
                <div class="form-group col-6">
                            <label for="wednesday_status">Status</label>
                              <select name="wednesday_status" id="wednesday_status" class="form-control" required>
                                  <option value="0" <?php if($select['status']==="0"){echo "selected";}?>>Inactive</option>
                                  <option value="1" <?php if($select['status']==="1"){echo "selected";}?>>Active</option>
                            </select>
                </div>
               </div>
               <!-- thursday -->
               <?php $select = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM game_time WHERE game='$select_game[game]' AND day='Thursday'")); ?>
               <label><strong>Thursday</strong></label><br/>
				<div class="row col-12">
				    
				<div class="form-group col-6">
                            <label for="thursday_open_time">Open Time</label>
                              <input name="thursday_open_time" id="thursday_open_time" class="form-control digits" type="time" required value="<?php echo date("H:i", strtotime($select['open_time']));?>">
                            
                </div>
                <div class="form-group col-6">
                            <label for="thursday_close_time">Close Time</label>
                              <input name="thursday_close_time" id="thursday_close_time" class="form-control digits" type="time" required value="<?php echo date("H:i", strtotime($select['close_time']));?>">
                            
                </div>
                <div class="form-group col-6">
                            <label for="thursday_status">Status</label>
                              <select name="thursday_status" id="thursday_status" class="form-control" required>
                                  <option value="0" <?php if($select['status']==="0"){echo "selected";}?>>Inactive</option>
                                  <option value="1" <?php if($select['status']==="1"){echo "selected";}?>>Active</option>
                            </select>
                </div>
               </div>
               <!-- friday -->
               <?php $select = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM game_time WHERE game='$select_game[game]' AND day='Friday'")); ?>
               <label><strong>Friday</strong></label><br/>
				<div class="row col-12">
				    
				<div class="form-group col-6">
                            <label for="friday_open_time">Open Time</label>
                              <input name="friday_open_time" id="friday_open_time" class="form-control digits" type="time" required value="<?php echo date("H:i", strtotime($select['open_time']));?>">
                            
                </div>
                <div class="form-group col-6">
                            <label for="friday_close_time">Close Time</label>
                              <input name="friday_close_time" id="friday_close_time" class="form-control digits" type="time" required value="<?php echo date("H:i", strtotime($select['close_time']));?>">
                            
                </div>
                <div class="form-group col-6">
                            <label for="friday_status">Status</label>
                              <select name="friday_status" id="friday_status" class="form-control" required>
                                  <option value="0" <?php if($select['status']==="0"){echo "selected";}?>>Inactive</option>
                                  <option value="1" <?php if($select['status']==="1"){echo "selected";}?>>Active</option>
                            </select>
                </div>
               </div>
               <!-- saturday -->
               <?php $select = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM game_time WHERE game='$select_game[game]' AND day='Saturday'")); ?>
               <label><strong>Saturday</strong></label><br/>
				<div class="row col-12">
				    
				<div class="form-group col-6">
                            <label for="saturday_open_time">Open Time</label>
                              <input name="saturday_open_time" id="saturday_open_time" class="form-control digits" type="time" required value="<?php echo date("H:i", strtotime($select['open_time']));?>">
                            
                </div>
                <div class="form-group col-6">
                            <label for="saturday_close_time">Close Time</label>
                              <input name="saturday_close_time" id="saturday_close_time" class="form-control digits" type="time" required value="<?php echo date("H:i", strtotime($select['close_time']));?>">
                            
                </div>
                <div class="form-group col-6">
                            <label for="saturday_status">Status</label>
                              <select name="saturday_status" id="saturday_status" class="form-control" required>
                                  <option value="0" <?php if($select['status']==="0"){echo "selected";}?>>Inactive</option>
                                  <option value="1" <?php if($select['status']==="1"){echo "selected";}?>>Active</option>
                            </select>
                </div>
               </div>
				
				<div class="form-group col-12">
					<button type="submit" class="btn btn-success waves-light m-t-10" id="submitBtn" name="submitBtn" >Submit</button>
					
					<button type="reset" class="btn btn-danger waves-light m-t-10" >Reset</button>
				
				</div>
			</div>
			<div class="form-group">
				<div id="msg"></div>
			</div>
		</form>
				</div>
			</div>
		</div>
	</div>
</div>
	</div>
<?php include('footer.php');?>