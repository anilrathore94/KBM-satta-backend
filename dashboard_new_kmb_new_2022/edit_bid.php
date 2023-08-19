<?php include('header.php');
include('sidebar.php');

$id = $_GET['id'];

$select = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user_bid_history WHERE id='$id'"));
?>
<div class="main-content">
        <div class="page-content"><br>
          
      	<div class="container-fluid">
	<div class="row">
	<!-- Zero Configuration  Starts-->	
		<div class="col-sm-12">
			<div class="card">
			  <div class="card-body">
			  <h4 class="card-title">Edit Bid</h4>		  
			  <form class="theme-form" method="post" action="edit/edit-bid.php">
			<div class="row">
				<input type="hidden" name="id" value="<?php echo $id;?>">
				<div class="form-group col-12">
					<label for="game_name">Game Name</label>
					<input type="text" name="game_name" id="game_name" class="form-control" placeholder="Enter Game Name" value="<?php echo $select['game_name']?>" readonly>
				</div>
				<div class="row col-12">
				   <?php /* if($select['session'] === "Open"){ */
				    ?>
				    <!--<input name="close_pana" id="close_pana" class="form-control digits" type="text" required value="<?php echo $select['close_pana'];?>" hidden>
				    <input name="close_digit" id="close_digit" class="form-control digits" type="text" required value="<?php echo $select['close_digit'];?>" hidden>-->
				    <div class="form-group col-6">
                            <label for="open_pana">Open Pana</label>
                              <input name="open_pana" id="open_pana" class="form-control digits" type="text" required value="<?php echo $select['open_pana'];?>">
                            
                </div>
                <div class="form-group col-6">
                            <label for="open_digit">Open Digit</label>
                              <input name="open_digit" id="open_digit" class="form-control digits" type="text" required value="<?php echo $select['open_digit'];?>">
                            
                </div>
				    <?php
				 /*   }else{ */
				    ?>
				    <!--<input name="open_pana" id="open_pana" class="form-control digits" type="text" required value="<?php echo $select['open_pana'];?>" hidden>
				    <input name="open_digit" id="open_digit" class="form-control digits" type="text" required value="<?php echo $select['open_digit'];?>" hidden> -->
				    <div class="form-group col-6">
                            <label for="close_pana">Close Pana</label>
                            
                              <input name="close_pana" id="close_pana" class="form-control digits" type="text" required value="<?php echo $select['close_pana'];?>">
                            
                </div>
                <div class="form-group col-6">
                            <label for="close_digit">Close Digit</label>
                            
                              <input name="close_digit" id="close_digit" class="form-control digits" type="text" required value="<?php echo $select['close_digit'];?>">
                            
                </div>
				    <?php
				    /*}*/?>
				
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