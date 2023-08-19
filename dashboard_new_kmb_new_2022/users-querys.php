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
			  <h4 class="card-title d-flex align-items-center justify-content-between">Users Query List</h4>
				  <table class="table table-striped table-bordered display" id="example">
					<thead>
					  <tr>
						<th>#</th>
						<th>User Name</th>
						<th>Mobile</th>
						<th>Email</th>
						<th>Query</th>
						<th>Date</th>
					  </tr>
					</thead>
					<tbody>
                  <?php $select_user_query = mysqli_query($con,"SELECT * FROM user_query");
                            $i = 1;
                            while($select = mysqli_fetch_array($select_user_query)){
                                
                                ?>
                                <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $select['username'];?></td>
                                <td><?php echo $select['mobile'];?></td>
                                <td><?php echo $select['email'];?></td>
                                <td><?php echo $select['query'];?></td>
                                <td><?php echo $select['date'];?></td>
                                
                              </tr>
                                <?php
                                $i++;
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
    $('#example').DataTable();
} );
												
</script>
		
	
  <?php include('footer.php');?>