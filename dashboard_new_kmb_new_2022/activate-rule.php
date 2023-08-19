<?php include('header.php');
include('sidebar.php');?>
        <div class="content-body"><br>
          
      	<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
			  <div class="card-body">
			  <h4 class="card-title">Activation Rule</h4>
				<div class="dt-ext table-responsive">
				  <div id="imagesList_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12"><table id="imagesList" class="table table-striped dataTable no-footer" role="grid" aria-describedby="imagesList_info" style="width: 930px;">
					<thead>
					  <tr role="row">
					      <th>#</th>
					      <th>Mobile App</th>
					  <th>Status</th>
					  <th>Action</th>
					  </tr>
					</thead>
					<tbody>
					    <?php $select_data = mysqli_query($con,"SELECT * FROM activate_rule");
					    $i= 1;
					    while($select = mysqli_fetch_array($select_data)){
					        ?>
					        <tr>
					        <td><?php echo $i;?></td>
					        <td>User Activation</td>
					        
					        <td><?php if($select['status']=="1"){
					        ?><badge class="badge badge-success">Auto</badge><?php
					        }else{ ?>
					            <badge class="badge badge-danger">Manual</badge>
					        <?php } ?></td>
					        <td><a style="cursor:pointer" href="status/edit-activate-rule.php?id=<?php echo $select['id']; ?>"><?php if($select['status']=="0"){
					        ?><badge class="badge badge-success">Auto Activation</badge><?php
					        }else{ ?>
					            <badge class="badge badge-danger">Manual Activation</badge>
					        <?php } ?></a>
					        </td>
					        </tr>
					        <?php
					        $i++;
					    }
					    ?>
					    </tbody></table></div></div></div>
					</div>
					<div id="msg"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="addSliderImageModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal_right_side" role="document">
	<div class="modal-content col-12 col-md-5">
	  <div class="modal-header">
		<h5 class="modal-title">Add Slider Image</h5>
		<button class="close" type="button" data-dismiss="modal" aria-label="Close" data-original-title="" title=""><span aria-hidden="true">×</span></button>
	  </div>
	  <div class="modal-body">
		<form class="theme-form" name="sliderImageFrm" method="post" action="back/add-slider.php" enctype="multipart/form-data">
			<div class="row">
				
				<div class="form-group col-12">
					<label for="">Slider Image<span class="Img_ext">(Allow Only.jpeg,.jpg,.png)</span></label>
					<input class="form-control" name="image" id="file" type="file"  data-original-title="" title="">
				</div>
				
				<div class="form-group col-12">
					<label for="exampleInputEmail1">Display Order</label>
					<input type="number" name="display_order" id="display_order" class="form-control" placeholder="Enter Image Display Order" data-original-title="" title="">
				</div>
				
				<div class="form-group col-12">
					<button type="submit" class="btn btn-primary waves-light m-t-10" id="submitBtn" name="submitBtn" data-original-title="" title="">Submit</button>
					<button type="reset" class="btn btn-danger waves-light m-t-10" data-original-title="" title="">Reset</button>
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

<div class="modal fade" id="imageDeleteModal" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog modal-frame modal-top modal-md">
		<div class="modal-content">
		  <div class="modal-body">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<p>Are you sure you want to delete this?</p>
					</div>
					<div class="col-md-12">
						<button class="btn btn-info waves-effect waves-light" data-dismiss="modal" data-original-title="" title="">No</button>
						<button onclick="delete_this(this.value)" id="delete_id" class="btn btn-danger waves-effect waves-light" data-original-title="" title="">Yes</button>
						
					</div>
				</div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
	</div>
<?php include('footer.php');?>