<?php 
include('header.php');
include('sidebar.php');?>

<div class="main-content">	<div class="page-content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
				  <div class="card-body">
			<h4 class="card-title d-flex align-items-center justify-content-between">Notice Managment	<a class="btn btn-primary btn-sm btn-float m-b-10" href="#addNoticeModal" role="button" data-toggle="modal">Add Notice</a></h4>
					<div class="">
					  <table id="noticeList" class="table table-striped">
						<thead>
						  <tr>
							<th>#</th>
							<th>Notice Title</th>
							<th>Content</th>
							<th>Notice Date</th>
							<th>Status</th>
							<th>Action</th>
							
							
						    </tr>
							    </thead>
							    <tbody>
								<?php $select_notice = mysqli_query($con,"SELECT * FROM notice");
								    if($select_notice){
								        if(mysqli_num_rows($select_notice)>0){
								            $i = 1;
								            while($select = mysqli_fetch_array($select_notice)){
								                
								                ?>
								                <tr>
            										<td><?php echo $i;?></td>
            										<td><?php echo $select['title'];?></td>
            										<td><?php echo $select['content'];?></td>
            										<td><?php echo $select['date'];?></td>
            										<td>
            										<a href="status/notice.php?id=<?php echo $select['id'];?>"><?php if($select['status']==='0'){
            										    ?> <badge class="badge badge-danger">Inactive</badge><?php
            										}else{ ?><badge class="badge badge-success">Active</badge> <?php }?>
            										</td>
            										
            										<td>
            											<div class="edit-icon-css">
            											    
            		<!--<a href="delete/delete-notice.php?id=<?php echo $select['id'];?>"><button class="btn btn-outline-primary btn-xs m-l-5" type="button" title="edit">Edit</button></a>-->
            										    	<a onclick="return confirm('Are you sure you want to delete?')" href="delete/delete-notice.php?id=<?php echo $select['id'];?>"><button class="btn btn-danger btn-xs mr-1" type="button">Delete</button></a>
            											</div>
										            </td>
            									</tr>
								                <?php
								                $i++;
								            }
								        }else{
								            ?>
								            <tr>
            									<td colspan="6">No Data Added!</td>
            								</tr>
								            <?php    
								        }
								    }else{
								        ?>
								            <tr>
            									<td colspan="6">No Data Found!</td>
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
    $('#noticeList').DataTable();
} );
												
</script>


<div class="modal fade" id="addNoticeModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal_right_side" role="document">
	<div class="modal-content col-12 col-md-5">
	  <div class="modal-header">
		<h5 class="modal-title">Add Notice</h5>
		<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  </div>
	  <div class="modal-body">
	      
		<form method="post" action="action-code/add-notice.php">
		    
			<div class="row">
					<div class="form-group col-6">
					<label for="exampleInputEmail1">Notice Title</label>
					<input type="text" class="form-control" placeholder="Enter Title" name="title" required>
				</div>	
				<div class="form-group col-6">
					<label>Notice Date</label>
										<div class="date-picker">
						<div class="input-group">
						  <input type="date" class="form-control" placeholder="" name="date" value="<?php echo date('Y-m-d');?>" required>
						</div>
					</div>
				</div>
				<div class="form-group col-12">
					<label>Notice Content</label>
					<textarea class="form-control" placeholder="Enter Notice Content" name="content" required></textarea>
				</div>
				
				<div class="form-group col-12">
					<button type="submit" class="btn btn-primary waves-light m-t-10" id="submitBtn" name="submitBtn">Submit</button>
					<button type="reset" class="btn btn-danger waves-light m-t-10">Reset</button>
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
<div class="modal fade" id="editNoticeModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal_right_side" role="document">
	<div class="modal-content col-12 col-md-5">
	  <div class="modal-header">
		<h5 class="modal-title">Edit Notice</h5>
		<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  </div>
	  <div class="modal-body batch_body">	  
	  </div>
	</div>
  </div>
</div>
	
<?php include('footer.php');?>