<?php 
include('header.php');
include('sidebar.php');?>

<div class="main-content">	<div class="page-content">
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
			  <div class="card-body">
			  <h4 class="card-title d-flex align-items-center justify-content-between">Slider Image Management			 <a class="btn btn-primary btn-sm btn-float m-b-10" href="#addSliderImageModal" role="button" data-toggle="modal">Add Slider Image</a></h4>
				  <table id="imagesList" class="table table-striped table-bordered">
					<thead>
					  <tr>
						<th>#</th>
						<th>Slider Image</th>
						<th>Display Order</th>
						<th>Creation Date</th>
						<th>Status</th>
						<th>Action</th>
					  </tr>
						</thead>
						<tbody>
						    
									<?php $select_slider_images = mysqli_query($con,"SELECT * FROM slider_images ");
								    if($select_slider_images){
								        if(mysqli_num_rows($select_slider_images)>0){
								            $i = 1;
								            while($select = mysqli_fetch_array($select_slider_images)){
								                
								                ?>
								                <tr>
            										<td><?php echo $i;?></td>
            										<td><img src="/image/<?php echo $select['slider_image'];?>" width="150"></td>
            										<td><?php echo $select['display_order'];?></td>
            										<td><?php echo $select['creation_date'];?></td>
            										<td>
            										<a href="status/slider-images.php?id=<?php echo $select['id'];?>"><?php if($select['status']==='0'){
            										    ?> <badge class="badge badge-danger">Inactive</badge><?php
            										}else{ ?><badge class="badge badge-success">Active</badge> <?php }?>
            										</td>
            										
            										<td>
            											<div class="edit-icon-css">
            										    	<a onclick="return confirm('Are you sure you want to delete?')" href="delete/delete-slider-images.php?id=<?php echo $select['id'];?>"><button class="btn btn-danger btn-xs mr-1" type="button">Delete</button></a>
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
    $('#imagesList').DataTable();
} );
</script>


<div class="modal fade" id="addSliderImageModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal_right_side" role="document">
	<div class="modal-content col-12 col-md-5">
	  <div class="modal-header">
		<h5 class="modal-title">Add Slider Image</h5>
		<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  </div>
	  <div class="modal-body">
		<form method="POST" action="action-code/add-slider.php" enctype="multipart/form-data">
		    
			<div class="row">
				
				<div class="form-group col-12">
					<label for="">Slider Image<span class="Img_ext">(Allow Only.jpeg,.jpg,.png)</span></label>
					<input class="form-control" name="slide" id="slide" type="file" onchange="return validateImageExtensionOther(this.value,1)">
				</div>
				
				
				<div class="form-group col-12">
					<label for="exampleInputEmail1">Display Order</label>
					<input type="number" name="display_order" id="display_order" class="form-control" placeholder="Enter Image Display Order"/>
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

	
<?php include('footer.php');?>