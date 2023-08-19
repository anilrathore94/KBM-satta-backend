<?php 
include('header.php');
include('sidebar.php');?>

<div class="main-content">	<div class="page-content">
    <div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-flex align-items-center justify-content-between">
					<h4 class="mb-0 font-size-18">UnApproved User List</h4>

					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
							<li class="breadcrumb-item active">User List</li>
						</ol>
					</div>

				</div>
			</div>
		</div>
		
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title d-flex align-items-center justify-content-between">&nbsp; <a href="un-approved-users-list.php" class="btn btn-primary waves-effect waves-light btn-sm">Un-approved Users List</a></h4>
					<div class="table-responsive">
					<table id="userList" class="table table-bordered">
						<thead>
						  <tr>
							<th>#</th>
							<th>User Name</th>
							<th>Mobile</th>
							<th>email</th>
							<th>Date</th>
							<th>Balance</th>
							<th>Betting</th>
							<th>Transfer</th>
							<th>Active</th>
							<th>View</th>
						  </tr>
						</thead>
						<tbody>
						    
									<?php $select_user = mysqli_query($con,"SELECT * FROM user_info WHERE status='0' ORDER BY id DESC");
								    if($select_user){
								        if(mysqli_num_rows($select_user)>0){
								            $i = 1;
								            while($select = mysqli_fetch_array($select_user)){
								                
								                ?>
								                <tr>
            										<td><?php echo $i;?></td>
            										<td><a href="view-user.php?id=<?php echo $select['id'];?>" class="mr-3 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Details"><?php echo $select['name'];?></a></td>
            										<td><?php echo $select['phone'];?></td>
            										<td><?php echo $select['email'];?></td>
            										<td><?php echo $select['date'];?></td>
            										<td><?php echo $select['wallet'];?></td>
            										<td><?php if($select['betting_status']==1){
            										        ?>
            										        <span id="<?php echo $select['id'];?>b" class="badge badge-pill badge-soft-success font-size-12" onclick="betting_status(<?php echo $select['id'];?>)">Yes</span>
            										        <?php
            										    }else{
            										        ?>
            										        <span id="<?php echo $select['id'];?>b" class="badge badge-pill badge-soft-danger font-size-12" onclick="betting_status(<?php echo $select['id'];?>)">No</span>
            										        <?php
            										    }?>
                            <script>
            										    function betting_status(id){
            										       
            										        var elem = document.getElementById(id+"b");
                                                            if (elem.innerHTML=="Yes"){ 
                                                                elem.innerHTML = "No";
                                                                elem.style.color = "#FF4847";
                                                                elem.style.backgroundColor = "#f46a6a2e";
                                                            }
                                                            else{  
                                                                 elem.innerHTML = "Yes";
                                                                elem.style.color = "#2BC155";
                                                                elem.style.backgroundColor = "#34c38f2e";
                                                            }
            										        $.ajax({
                                                                type: 'POST',
                                                                url: 'status/edit-betting-status.php',
                                                                data: {id:id},
                                                                success: function(result) {
                                                                    
                                                                }
                                                            });
            										    }
            										</script></td>
            										<td>
            										<?php if($select['transfer_status']==1){
            										        ?>
            										        <span id="<?php echo $select['id'];?>t" class="badge badge-pill badge-soft-success font-size-12" onclick="transfer_status(<?php echo $select['id'];?>)">Yes</span>
            										        <?php
            										    }else{
            										        ?>
            										        <span id="<?php echo $select['id'];?>t" class="badge badge-pill badge-soft-danger font-size-12" onclick="transfer_status(<?php echo $select['id'];?>)">No</span>
            										        <?php
            										    }?>
                            <script>
            										    function transfer_status(id){
            										       
            										        var elem = document.getElementById(id+"t");
                                                            if (elem.innerHTML=="Yes"){ 
                                                                elem.innerHTML = "No";
                                                                elem.style.color = "#FF4847";
                                                                elem.style.backgroundColor = "#f46a6a2e";
                                                            }
                                                            else{  
                                                                 elem.innerHTML = "Yes";
                                                                elem.style.color = "#2BC155";
                                                                elem.style.backgroundColor = "#34c38f2e";
                                                            }
            										        $.ajax({
                                                                type: 'POST',
                                                                url: 'status/edit-transfer-status.php',
                                                                data: {id:id},
                                                                success: function(result) {
                                                                    
                                                                }
                                                            });
            										    }
            										</script></td>
            										
            										<td>
            										    <?php if($select['status']==1){
            										        ?>
            										        <span id="<?php echo $select['id'];?>s" class="badge badge-pill badge-soft-success font-size-12" onclick="user_status(<?php echo $select['id'];?>)">Yes</span>
            										        <?php
            										    }else{
            										        ?>
            										        <span id="<?php echo $select['id'];?>s" class="badge badge-pill badge-soft-danger font-size-12" onclick="user_status(<?php echo $select['id'];?>)">No</span>
            										        <?php
            										    }?>
            										<script>
            										    function user_status(id){
            										        var elem = document.getElementById(id+"s");
                                                            if (elem.innerHTML=="Yes"){ 
                                                                elem.innerHTML = "No";
                                                                elem.style.color = "#FF4847";
                                                                elem.style.backgroundColor = "#f46a6a2e";
                                                            }
                                                            else{  
                                                                 elem.innerHTML = "Yes";
                                                                elem.style.color = "#2BC155";
                                                                elem.style.backgroundColor = "#34c38f2e";
                                                            }
            										        $.ajax({
                                                                type: 'POST',
                                                                url: 'status/edit-user-status.php',
                                                                data: {id:id},
                                                                success: function(result) {
                                                                    
                                                                }
                                                            });
            										    }
            										</script>
            										</td>
            										<td>
            											<div class="edit-icon-css">
            										    	<a href="view-user.php?id=<?php echo $select['id'];?>"><span class="badge badge-rounded badge-outline-primary"><i class="mdi mdi-eye font-size-18"></i></span></a>
            											</div>
										            </td>
            									</tr>
								                <?php
								                $i++;
								            }
								        }else{
								            ?>
								            <tr>
            									<td colspan="8">No Data Added!</td>
            								</tr>
								            <?php    
								        }
								    }else{
								        ?>
								            <tr>
            									<td colspan="8">No Data Found!</td>
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
    $('#userList').DataTable();
} );
												
</script>
<?php include('footer.php');?>