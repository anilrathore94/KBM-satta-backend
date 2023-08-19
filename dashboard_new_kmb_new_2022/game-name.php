<?php 
include('header.php');
include('sidebar.php');?>

<div class="main-content">	<div class="page-content">
	<div class="container-fluid">
		<div class="row">
		<!-- Zero Configuration  Starts-->	
			<div class="col-sm-12">
				<div class="card">
				  <div class="card-body">
				  <h4 class="card-title d-flex align-items-center justify-content-between">Game Name List				  <a class="btn btn-primary btn-sm btn-float" href="#addgameModal" role="button" data-toggle="modal">Add Game </a></h4>
					<div class="table-responsive">
					    <table class="table table-bordered" id="gameList">
						<thead>
						  <tr>
							<th>#</th>
							<th>Game Name</th>
							<th>Today Open</th>
							<th>Today Close</th>
							<th>Active</th>
							<th>Market Status</th>
							<th>Action</th>
						  </tr>
						</thead>
						<tbody>
									<?php 
									$day = date('l');
									$select_game_time = mysqli_query($con,"SELECT * FROM game_time WHERE day='$day' GROUP BY game");
								    if($select_game_time){
								        if(mysqli_num_rows($select_game_time)>0){
								            $i = 1;
								            while($select = mysqli_fetch_array($select_game_time)){
								                
								                ?>
								                <tr>
            										<td><?php echo $i;?></td>
            										<td><?php echo $select['game'];?></td>
            										<td><?php echo $select['open_time'];?></td>
            										<td><?php echo $select['close_time'];?></td>
            										<td><?php if($select['status']==='0'){
            										    ?><span class="badge badge-pill badge-soft-danger font-size-12">NO</span><?php
            										}else{ ?><span class="badge badge-pill badge-soft-success font-size-12">YES</span><?php }?></td>
            										<td><?php 
            										$current_time = strtotime(date('h:i a'));
            										$open_time = strtotime($select['open_time']);
            										$close_time = strtotime($select['close_time']);
            										$start = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM admin_settings"));
            										$start_time = strtotime($start['market_open_time']);
            										if($current_time < $start_time OR ($current_time > $open_time AND $current_time > $close_time) OR $select['status']==='0'){
            										    ?><span class="badge badge-pill badge-soft-danger font-size-12">Market Closed</span><?php
            										}else{ ?><span class="badge badge-pill badge-soft-success font-size-12">Market Running</span><?php }?></td>
            										<td>
            											<div class="edit-icon-css">
            										    	<a href="edit-week-game.php?id=<?php echo $select['id'];?>"><span class="btn btn-primary btn-xs mr-1">EDIT</span></a>
            												<a onclick="return confirm('Are you sure you want to delete?')" href="delete/delete-game-name.php?id=<?php echo $select['id'];?>"><span class="btn btn-danger btn-xs mr-1">DELETE</span></a>
            											</div>
										            </td>
            									</tr>
								                <?php
								                $i++;
								            }
								        }else{
								            ?>
								            <tr>
            									<td colspan="7">No Data Added!</td>
            								</tr>
								            <?php    
								        }
								    }else{
								        ?>
								            <tr>
            									<td colspan="7">No Data Found!</td>
            								</tr>
								        <?php
								    }
								    ?>
								</tbody>
						</table>
					</div>
					  
					
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="addgameModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal_right_side" role="document">
	<div class="modal-content col-12 col-md-5">
	  <div class="modal-header">
		<h5 class="modal-title">Add Game</h5>
		<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  </div>
	  <div class="modal-body">
		<form method="POST" action="action-code/add-game.php">
			<div class="row">
				<input type="hidden" name="game_id" value="">
				<div class="form-group col-12">
					<label for="game_name">Game Name</label>
					<input type="text" name="game_name" id="game_name" class="form-control" placeholder="Enter Game Name"/>
				</div>
				
				<div class="form-group col-12">
					<label for="game_name_hindi">Game Name Hindi</label>
					<input type="text" name="game_name_hindi" id="game_name_hindi" class="form-control" placeholder="Enter Game Name In Hindi"/>
				</div>
				
				<div class="form-group col-6">
                            <label  for="open_time">Open Time</label>
                              <input name="open_time" id="open_time" class="form-control digits" type="time" value="">
                            
                </div>
                <div class="form-group col-6">
                            <label for="close_time">Close Time</label>
                              <input name="close_time" id="close_time" class="form-control digits" type="time" value="">
                            
                </div>
               
				<div class="form-group col-12">
					<button type="submit" class="btn btn-primary waves-light mr-1" id="submitBtn" name="submitBtn">Submit</button>
					<button type="reset" class="btn btn-danger waves-light mr-1">Reset</button>
				
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

<div class="modal fade" id="updategameModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal_right_side" role="document">
	<div class="modal-content col-12 col-md-5">
	  <div class="modal-header">
		<h5 class="modal-title">Update Game</h5>
		<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  </div>
	  <div class="modal-body modal_update_game_body">
</div>
</div>
</div>
<script>
    $(document).ready( function () {
    $('#gameList').DataTable();
} );
</script>
</div>

<?php include('footer.php');?>