
<?php include('../config.php');

$date = mysqli_real_escape_string($con,$_POST['date']);
$name = mysqli_real_escape_string($con,$_POST['name']);

$select_array = mysqli_query($con,"SELECT * FROM user_bid_history WHERE game_name = '$name' AND date = '$date' ORDER BY id DESC");

if(mysqli_num_rows($select_array) > 0){ ?>
<div class="container-fluid">
	<div class="row row_col">	
		<div class="col-12 col-md-12 col-lg-12">		
			<div class="card">	
				<div class="card-body">
					<h4 class="card-title">Bid History List <a style="cursor:pointer" onclick="return confirm('Are you sure you want to Revert?')"  href="delete/bid-revert.php?date=<?php echo $date;?>&name=<?php echo $name;?>"><badge class="btn btn-primary btn-sm btn-float clear_btn">Clear &amp; Refund All</badge></a></h4>		
						<div class="table-responsive">
						  <div class="row">
						      <div class="col-sm-12">
				      <table class="table table-bordered" id="myTable">
							<thead>						
								<tr role="row">					
									<th class="w-20">Date</th>
									<th>Username</th> 
									<th>Game Type</th> 
									<th>Points</th>
								</tr>
							</thead>
							<tbody>
						        <?php 
						            while($select = mysqli_fetch_array($select_array)){
    						            ?>
    						                <tr>
    						                    <td><?php echo $select['date'];?></td>
    						                    <td><?php 
    						                    $select_user = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user_info WHERE phone = '$select[username]'"));
    						                    echo $select_user['name'];
    						                    ?>  <a href="view-user.php?id=<?php echo $select_user['id'];?>"><i class="fa fa-external-link" aria-hidden="true"></i></a></td>
    						                    <td><?php echo $select['game_type'];?></td>
    						                    <td><?php echo $select['points_action'];?></td>
    						                </tr>
    						            <?php
						            }
						        ?>
						        </tbody>
						        </table>
						        
					</div>
					</div>
					<div class="row">
					    <div class="col-sm-12 col-md-5"></div>
					    <div class="col-sm-12 col-md-7">
					        <div class="dataTables_paginate paging_simple_numbers" id="myTable_paginate"></div>
					        </div>
					        </div>
					        </div>
					</div>
					<div id="msg"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
   <?php
    
}else{
    echo "No Bid Found";
}
?>

						