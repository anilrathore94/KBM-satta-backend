<link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<style>
    tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
    tfoot {
        display: table-header-group;
    }
</style>
<?php include('../config.php');

$date = mysqli_real_escape_string($con,$_POST['date']);
$name = mysqli_real_escape_string($con,$_POST['name']);
$type = mysqli_real_escape_string($con,$_POST['type']);

if($name == "all"){
    if($type=="all"){
        $select_array = mysqli_query($con,"SELECT * FROM user_bid_history WHERE date = '$date' ORDER BY id DESC");
    }else{
        $select_array = mysqli_query($con,"SELECT * FROM user_bid_history WHERE game_type = '$type' AND date = '$date' ORDER BY id DESC");
    }
}else{
    if($type=="all"){
        $select_array = mysqli_query($con,"SELECT * FROM user_bid_history WHERE game_name = '$name' AND date = '$date' ORDER BY id DESC");
    }else{
        $select_array = mysqli_query($con,"SELECT * FROM user_bid_history WHERE game_name = '$name' AND game_type = '$type' AND date = '$date' ORDER BY id DESC");
    }
}

if(mysqli_num_rows($select_array) > 0){ ?>
<div class="container-fluid">
	<div class="row row_col">	
		<div class="col-12 col-md-12 col-lg-12">		
			<div class="card">	
				<div class="card-body">
					<h4 class="card-title">Bid History List</h4>		
						<div class="table-responsive">
				      <table class="table table-striped table-bordered" id="bidHistory1" role="grid" aria-describedby="myTable_info" style="width: 1236px;">
							<thead>						
								<tr role="row">					
									<th class="w-20">Date</th>
									<th>Username</th> 		
									<th>Game Name</th>
									<th>Game Type</th> 
									<th>Session</th>
									<th>Open Pana</th>
									<th>Open Result</th>
									<th>Close Pana</th>
									<th>Close Result</th> 
									<th>Points</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
                                <tr>
                                    <th class="w-20">Date</th>
									<th>Username</th> 		
									<th>Game Name</th>
									<th>Game Type</th> 
									<th>Session</th>
									<th>Open Pana</th>
									<th>Open Result</th>
									<th>Close Pana</th>
									<th>Close Result</th> 
									<th>Points</th>
									<th>Action</th>
                                </tr>
                            </tfoot>
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
    						                    <td><?php echo $select['game_name'];?></td>
    						                    <td><?php echo $select['game_type'];?></td>
    						                    <td><?php echo $select['session'];?></td>
    						                    <td><?php echo $select['open_pana'];?></td>
    						                    <td><?php echo $select['open_digit'];?></td>
    						                    <td><?php echo $select['close_pana'];?></td>
    						                    <td><?php echo $select['close_digit'];?></td>
    						                    <td><?php echo $select['points_action'];?></td>
    						                    <td><a href="edit_bid1.php?id=<?php echo $select['id'];?>"  class="btn btn-outline-primary btn-xs m-l-5">EDIT BID</a></td>
    						                </tr>
    						            <?php
						            }
						        ?>
						        </tbody>
						        </table>
						        
					</div>
					<div id="msg"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

   <?php
    
}else{
    echo "No Result Found";
}
?>
<script>
    $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#bidHistory1 tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search" />' );
    } );
 
    // DataTable
    var table = $('#bidHistory1').DataTable({
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });
 
} );
</script>
						