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
			  <h4 class="card-title d-flex align-items-center justify-content-between">Sub Admin List			  
			  <a class="btn btn-primary btn-sm btn-float m-b-10" href="#addSubAdminModal" role="button" data-toggle="modal">Add Sub Admin</a></h4>
				 
				  <table class="table table-striped table-bordered" id="subAdminList">
					<thead>
					  <tr>
						<th>#</th>
						<th>Full Name</th>
						<th>User Name</th>
						<th>Admin Email</th>
						<th>Creation Date</th>
						<th>Status</th>
						<th>Action</th>
						  </tr>
						</thead>
						<tbody>
						    
								<?php $select_sub_admin = mysqli_query($con,"SELECT * FROM sub_admin ");
								    if($select_sub_admin){
								        if(mysqli_num_rows($select_sub_admin)>0){
								            $i = 1;
								            while($select = mysqli_fetch_array($select_sub_admin)){
								                
								                ?>
								                <tr>
            										<td><?php echo $i;?></td>
            										<td><?php echo $select['name'];?></td>
            										<td><?php echo $select['user_name'];?></td>
            										<td><?php echo $select['email'];?></td>
            										<td><?php echo $select['date'];?></td>
            										<td><?php if($select['status']==1){
            										        ?>
            										        <span id="<?php echo $select['id'];?>b" class="badge badge-pill badge-soft-success font-size-12" onclick="status(<?php echo $select['id'];?>)">Active</span>
            										        <?php
            										    }else{
            										        ?>
            										        <span id="<?php echo $select['id'];?>b" class="badge badge-pill badge-soft-danger font-size-12" onclick="status(<?php echo $select['id'];?>)">Inactive</span>
            										        <?php
            										    }?>
                            <script>
            										    function status(id){
            										       
            										        var elem = document.getElementById(id+"b");
                                                            if (elem.innerHTML=="Active"){ 
                                                                elem.innerHTML = "Inactive";
                                                                elem.style.color = "#FF4847";
                                                                elem.style.backgroundColor = "#f46a6a2e";
                                                            }
                                                            else{  
                                                                 elem.innerHTML = "Active";
                                                                elem.style.color = "#2BC155";
                                                                elem.style.backgroundColor = "#34c38f2e";
                                                            }
            										        $.ajax({
                                                                type: 'POST',
                                                                url: 'status/sub-admin.php',
                                                                data: {id:id},
                                                                success: function(result) {
                                                                    
                                                                }
                                                            });
            										    }
            										</script></td>
            										
            										<td>
            											<div class="edit-icon-css">
            										    	<a onclick="return confirm('Are you sure you want to delete?')" href="delete/delete-sub-admin.php?id=<?php echo $select['id'];?>"><button class="btn btn-danger btn-xs mr-1" type="button">Delete</button></a>
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
					<div id="msg"></div>
				</div>
				</div>
			</div>
		</div>
		
		
	</div>
</div>	
<script>
				$(document).ready( function () {
    $('#subAdminList').DataTable();
} );
												
</script>



<div class="modal fade" id="addSubAdminModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal_right_side" role="document">
	<div class="modal-content col-12 col-md-5">
	  <div class="modal-header">
		<h5 class="modal-title">Add SubAdmin</h5>
		<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  </div>
	  <div class="modal-body">
		<form method="POST" action="action-code/add-sub-admin.php">
		    
			<div class="row">
				<input type="hidden" name="admin_id" value="">
				<div class="form-group col-12">
					<label for="exampleInputEmail1">Name</label>
					<input type="text" class="form-control" placeholder="Enter Name" name="name" required>
				</div>
				
				<div class="form-group col-12">
					<label for="exampleInputEmail1">Email</label>
					<input type="text" class="form-control" placeholder="Enter Email Id" name="email" required>
				</div>
				
				<div class="form-group col-12">
					<label for="exampleInputEmail1">User Name</label>
					<input type="text" class="form-control" placeholder="Enter User Name" name="user_name" required>
				</div>
				
				<div class="form-group col-12">
					<label for="exampleInputEmail1">Password</label>
					<input type="text" class="form-control" placeholder="Password" name="password" required>
				</div>
				
				
				<div class="form-group col-12">
					<button type="submit" class="btn btn-primary waves-light m-t-10" id="submitBtn" name="submitBtn">Submit</button>
					<button type="reset" class="btn btn-danger waves-light m-t-10">Reset</button>
				
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

<div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal_right_side" role="document">
	<div class="modal-content col-12 col-md-5">
	  <div class="modal-header">
		<h5 class="modal-title">Edit Category</h5>
		<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  </div>
	  <div class="modal-body batch_body">
	  
	  </div>
	</div>
  </div>
</div>	

<?php include('footer.php');?>