<?php 
include('header.php');
include('sidebar.php');?>

<div class="main-content">	<div class="page-content">
	<div class="container-fluid">

		<div class="row">

			<div class="col-sm-6 col-md-6 mr-auto ml-auto">

				<div class="card">

				  <div class="card-body">

				  <h4 class="card-title">Send Notification</h4>

				<form method="POST" action="action-code/send-notification.php">


				<div class="">
			

						<div class="form-group">

						<label for="exampleInputEmail1">User List</label>

						<select name="user_id" id="user_id" class="form-control select2">
							<option value="">Select Users</option>
							<option value="all">All</option>
							 <?php $select_user = mysqli_query($con,"SELECT * FROM user_info");
                                                    while($select = mysqli_fetch_array($select_user)){
                                                        ?>
                                                        <option value="<?php echo $select['phone'];?>"><?php echo $select['name'];?> (<?php echo $select['phone'];?>)</option>
                                                        <?php
                                                    }
                                                    ?>
						</select>
					    </div>	

					
					<div class="form-group">

						<label for="exampleInputEmail1">Notice Title</label>
                       <input type="text" class="form-control" placeholder="Enter Title" name ="title" >
					</div>	
			

					<div class="form-group">

						<label>Notification Content</label>
                        <textarea class="form-control" placeholder="Enter Notification Content" name="message"></textarea>
					    </div>
		

					<div class="form-group">

						<button type="submit" class="btn btn-primary waves-light m-t-10" id="submitBtn" name="submitBtn">Submit</button>


					</div>

				</div>

				<div class="form-group">

					<div id="error"></div>

				</div>

			</form>


					</div>

				</div>

			</div>

		</div>

	</div>
</div>	
<?php include('footer.php');?>