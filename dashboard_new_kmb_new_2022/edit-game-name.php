<?php include('header.php');
include('sidebar.php');

$id = $_GET['id'];
$select = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM starline_game_name WHERE id='$id'"));
?>
<div class="main-content">
        <div class="page-content"><br>
          
      	<div class="container-fluid">
	<div class="row">
	<!-- Zero Configuration  Starts-->	
		<div class="col-sm-12">
			<div class="card">
			  <div class="card-body">
			  <h4 class="card-title">Edit Game</h4>		  
			  <form class="theme-form" method="post" action="edit/edit-game.php" >
			<div class="row">
				<input type="hidden" name="game_id" >
				<div class="form-group col-12">
					<label for="game_name">Game Name</label>
					<input type="text" name="game_name" id="game_name" class="form-control" placeholder="Enter Game Name" value="<?php echo $select['games_name']?>" readonly>
				</div>
				<div class="row col-12">
				<div class="form-group col-6">
                            <label for="open_time">Open Time</label>
                              <input name="open_time" id="open_time" class="form-control digits" type="time" required value="<?php echo date("H:i", strtotime($select['open_time']));?>">
                            
                </div>
               </div>
				
				<div class="form-group col-12">
					<button type="submit" class="btn btn-primary waves-light m-t-10" id="submitBtn" name="submitBtn" >Submit</button>
					
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