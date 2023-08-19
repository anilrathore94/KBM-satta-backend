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
			  <h4 class="card-title d-flex align-items-center justify-content-between">Game Result History</h4>
				  <table class="table table-bordered" id="starlineGameResultHistory">
					<thead>
					  <tr>
						<th>#</th>
						<th>Game Name</th>
						<th>Result Date</th>
						<th>Number</th>
					  </tr>
					</thead>
					<tbody>
                  <?php $select_starline_result_history = mysqli_query($con,"SELECT * FROM starline_result_chart ORDER BY date DESC");
								            $i = 1;
								            while($select = mysqli_fetch_array($select_starline_result_history)){
								                
								                ?>
								                <tr>
            										<td><?php echo $i;?></td>
            										<td><?php echo $select['game_name'];?></td>
            										<td><?php echo date('d M Y',strtotime($select['date']));?></td>
            										<td><?php echo $select['open_panna'];?>-<?php echo $select['open_digit'];?></td>
            										</div>
										            </td>
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
    $('#starlineGameResultHistory').DataTable();
} );
												
</script>
		
	
  <?php include('footer.php');?>