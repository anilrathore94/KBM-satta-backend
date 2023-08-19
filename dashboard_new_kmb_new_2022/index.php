<?php 
include('header.php');
include('sidebar.php');?>

<div class="main-content">	<div class="page-content">
    <div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-flex align-items-center justify-content-between">
					<h4 class="mb-0 font-size-18">Dashboard</h4>

					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
							<li class="breadcrumb-item active">Dashboard</li>
						</ol>
					</div>

				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-xl-4">
				<div class="card overflow-hidden">
					<div class="bg-soft-primary">
						<div class="row">
							<div class="col-7">
								<div class="text-primary p-3">
									<h5 class="text-primary">Welcome Back !</h5>
									<p>Admin Dashboard</p>
								</div>
							</div>
							<div class="col-5 align-self-end">
								<img src="assets/images/profile-img.png" alt="" class="img-fluid">
							</div>
						</div>
					</div>
					<div class="card-body pt-0 dboard_pro_mht"
						style = "background-color: rgba(255, 192, 203, 0.8);">
						<div class="row">
							<div class="col-sm-4">
								<div class="avatar-md profile-user-wid mb-4">
									<img src="assets/images/avatar-1.jpg" alt="" class="img-thumbnail rounded-circle">
								</div>
								<h5 class="font-size-15 text-truncate">
								<?php echo $app_name;?>								</h5>
								<p class="text-muted mb-0 text-truncate">Admin</p>
							</div>

							<div class="col-sm-8">
								<div class="pt-4">
                                <?php $unapproved_user = mysqli_num_rows(mysqli_query($con,"SELECT * FROM user_info WHERE status='0'"));?>
									<div class="row">
										<div class="col-6">
										    <a href="un-approved-users-list.php">
											<h5 class="font-size-15"><?php if($unapproved_user > 0){
											    echo $unapproved_user;
											}else{
											    echo "0";
											}?></h5>
											<p class="text-muted mb-0">Unapproved Users</p>
											</a>
										</div>
										<?php $approved_user = mysqli_num_rows(mysqli_query($con,"SELECT * FROM user_info WHERE status='1'"));?>
										<div class="col-6">
										    <a href="user-management.php">
											<h5 class="font-size-15"><?php if($approved_user > 0){
											    echo $approved_user;
											}else{
											    echo "0";
											}?></h5>
											<p class="text-muted mb-0">Approved Users</p>
											</a>
										</div>
									</div>
																	</div>
							</div>
						</div>
					</div>
				</div>				<div class="card">
					<div class="card-body">
						<h4 class="card-title mb-4">Market Bid Details</h4>
						<div class="row">
							<div class="col-sm-12">
								<p class="text-muted">Game Name</p>
								<form >
									<div class="form-group">
										<div class="input-group">
											<select id="game_name" name="game_name" class="form-control" onchange="get_bid_detail(this.value)">
												<option value=''>-Select Game Name-</option>
												<option value='all'>All Games</option>	
																									<?php $select_game = mysqli_query($con,"SELECT * FROM game_time GROUP BY game");
										while($select_g = mysqli_fetch_array($select_game)){
										    ?>
										    <option value="<?php echo $select_g['game'];?>"><?php echo $select_g['game'];?></option>
										    <?php
										}
										?>					
																								</select>
																					</div>
									</div>
									<script>
                                function get_bid_detail(val){
                                    $.ajax ({
                                        type: 'POST',
                                        url: 'ajax/get-bid-detail.php',
                                        data: {id: val},
                                        success : function(htmlresponse) {
                                            $('#bid_amt').html(htmlresponse);
                                        }
                                    });
                                }
                            </script>
								</form>
								
								<h3 id="bid_amt">N/A</h3>
								<p class="text-muted">Market Amount</p>
								
							</div>
							
						</div>
						
					</div>
				</div>			</div>
			
			<div class="col-xl-8">
				<div class="row">
					<div class="col-md-4">
						<div class="card mini-stats-wid"
						style = "background-color: rgba(0, 128, 255, 0.3);">
						     <a href="user-management.php">
							<div class="card-body">
								<div class="media">
									<div class="media-body">
									    <?php $total_user = mysqli_num_rows(mysqli_query($con,"SELECT * FROM user_info"));?>
									   	<p class=" font-weight-medium"style = "color: #000000;">Users</p>
										<h4 class="mb-0"><?php if($total_user > 0){
											    echo $total_user;
											}else{
											    echo "0";
											}?></h4>
									</div>

									<div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
										<span class="avatar-title">
											<i class="bx bx-user font-size-24"></i>
										</span>
									</div>
								</div>
							</div>
							</a>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card mini-stats-wid"
						style = "background-color: rgba(255, 0, 0, 0.3);">												    
						<a href="game-name.php">													
						<div class="card-body">
								<div class="media">
									<div class="media-body">
									    <?php $total_game = mysqli_num_rows(mysqli_query($con,"SELECT * FROM game_time GROUP BY game"));?>
										<p class=" font-weight-medium"style = "color: #000000;">Games</p>
										<h4 class="mb-0"><?php if($total_game > 0){
											    echo $total_game;
											}else{
											    echo "0";
											}?></h4>
									</div>

									<div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
										<span class="avatar-title rounded-circle bg-primary">
											<i class="bx bx-archive-in font-size-24"></i>
										</span>
									</div>
								</div>
							</div>
							</a>
						</div>
					</div>
					<div class="col-md-4">
					<div class="card mini-stats-wid"
						style = "background-color: rgba(255, 128, 0, 0.3);">
							<div class="card-body">
								<div class="media">
									<div class="media-body">
										<p class=" font-weight-medium"style = "color: #000000;">Bid Amount</p>
										<h4 class="mb-0"><?php 
										$date = date('Y-m-d');
										$bid_amount = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(points_action) as amount FROM user_bid_history WHERE date='$date'"));
        										if($bid_amount['amount']==""){
        										    $bid = "0";
        										}else{
        										    $bid = $bid_amount['amount'];
        										}
												 echo $bid;?></h4>
									</div>

									<div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
										<span class="avatar-title rounded-circle bg-primary">
											<i class="bx bx-purchase-tag-alt font-size-24"></i>
										</span>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
								<div class="card">
					<div class="card-body">
						<h4 class="card-title mb-4">Total Bids On Single Ank Of Date <?php echo date('d M Y');?></h4>
						<form id="searchForm" >
							<div class="row">
								<div class="form-group col-md-5">
									<label>Game Name</label>		
									<select id="bid_game_name" name="bid_game_name" class="form-control">
										<option value=''>-Select Game Name-</option>
																					<?php $select_game = mysqli_query($con,"SELECT * FROM game_time GROUP BY game");
										while($select_g = mysqli_fetch_array($select_game)){
										    ?>
										    <option value="<?php echo $select_g['game'];?>"><?php echo $select_g['game'];?></option>
										    <?php
										}
										?>		
																				</select>
								</div>
								<div class="form-group col-md-5">
									<label>Market Time</label>		
									<select id="market_status" name="market_status" class="form-control">
										<option value=''>-Select Market Time-</option>
											<option value="open_digit">Open Market</option>
											<option value="close_digit">Close Market</option>
											
									</select>
								</div>
								<div class="form-group col-md-2">
									<label>&nbsp;</label>	
									<button type="submit" class="btn btn-primary btn-block" id="searchBtn" name="searchBtn">Get</button>
								</div>
								
							</div>
							<script>
							    document.getElementById('searchForm').onsubmit = function() {
							        var name = document.getElementById('bid_game_name').value;
							        var market = document.getElementById('market_status').value
							        $.ajax ({
                                        type: 'POST',
                                        url: 'ajax/get-bids.php',
                                        data: {name: name, market: market},
                                        success : function(htmlresponse) {
                                            $('#search').html(htmlresponse);
                                        }
                                    });
    
                                return false;
                            };
							</script>
						</form>
					</div>	
				</div>	

				<div class="row">
					<div class="col-md-12">
						<div id="search">
							<div class="row-2_5 tot_bit_boxs">
																<div class="col-md-2_5">
									<div class="card border card_0">
										<div class="card-header bg-transparent card_0">
											<h5 class="my-0 text-primary">Total Bids <span id="bid0">0</span></h5>
										</div>
										<div class="card-body">
											<h2 id="total0">0</h2>
											<h5 class="card-title mt-0">Total Bid Amount</h5>
											
										</div>
										<div class="card-footer-ank">Ank <span>0</span></div>
									</div>
								</div>
																<div class="col-md-2_5">
									<div class="card border card_1">
										<div class="card-header bg-transparent card_1">
											<h5 class="my-0 text-primary">Total Bids <span id="bid1">0</span></h5>
										</div>
										<div class="card-body">
											<h2 id="total1">0</h2>
											<h5 class="card-title mt-0">Total Bid Amount</h5>
											
										</div>
										<div class="card-footer-ank">Ank <span>1</span></div>
									</div>
								</div>
																<div class="col-md-2_5">
									<div class="card border card_2">
										<div class="card-header bg-transparent card_2">
											<h5 class="my-0 text-primary">Total Bids <span id="bid2">0</span></h5>
										</div>
										<div class="card-body">
											<h2 id="total2">0</h2>
											<h5 class="card-title mt-0">Total Bid Amount</h5>
											
										</div>
										<div class="card-footer-ank">Ank <span>2</span></div>
									</div>
								</div>
																<div class="col-md-2_5">
									<div class="card border card_3">
										<div class="card-header bg-transparent card_3">
											<h5 class="my-0 text-primary">Total Bids <span id="bid3">0</span></h5>
										</div>
										<div class="card-body">
											<h2 id="total3">0</h2>
											<h5 class="card-title mt-0">Total Bid Amount</h5>
											
										</div>
										<div class="card-footer-ank">Ank <span>3</span></div>
									</div>
								</div>
																<div class="col-md-2_5">
									<div class="card border card_4">
										<div class="card-header bg-transparent card_4">
											<h5 class="my-0 text-primary">Total Bids <span id="bid4">0</span></h5>
										</div>
										<div class="card-body">
											<h2 id="total4">0</h2>
											<h5 class="card-title mt-0">Total Bid Amount</h5>
											
										</div>
										<div class="card-footer-ank">Ank <span>4</span></div>
									</div>
								</div>
																<div class="col-md-2_5">
									<div class="card border card_5">
										<div class="card-header bg-transparent card_5">
											<h5 class="my-0 text-primary">Total Bids <span id="bid5">0</span></h5>
										</div>
										<div class="card-body">
											<h2 id="total5">0</h2>
											<h5 class="card-title mt-0">Total Bid Amount</h5>
											
										</div>
										<div class="card-footer-ank">Ank <span>5</span></div>
									</div>
								</div>
																<div class="col-md-2_5">
									<div class="card border card_6">
										<div class="card-header bg-transparent card_6">
											<h5 class="my-0 text-primary">Total Bids <span id="bid6">0</span></h5>
										</div>
										<div class="card-body">
											<h2 id="total6">0</h2>
											<h5 class="card-title mt-0">Total Bid Amount</h5>
											
										</div>
										<div class="card-footer-ank">Ank <span>6</span></div>
									</div>
								</div>
																<div class="col-md-2_5">
									<div class="card border card_7">
										<div class="card-header bg-transparent card_7">
											<h5 class="my-0 text-primary">Total Bids <span id="bid7">0</span></h5>
										</div>
										<div class="card-body">
											<h2 id="total7">0</h2>
											<h5 class="card-title mt-0">Total Bid Amount</h5>
											
										</div>
										<div class="card-footer-ank">Ank <span>7</span></div>
									</div>
								</div>
																<div class="col-md-2_5">
									<div class="card border card_8">
										<div class="card-header bg-transparent card_8">
											<h5 class="my-0 text-primary">Total Bids <span id="bid8">0</span></h5>
										</div>
										<div class="card-body">
											<h2 id="total8">0</h2>
											<h5 class="card-title mt-0">Total Bid Amount</h5>
											
										</div>
										<div class="card-footer-ank">Ank <span>8</span></div>
									</div>
								</div>
																<div class="col-md-2_5">
									<div class="card border card_9">
										<div class="card-header bg-transparent card_9">
											<h5 class="my-0 text-primary">Total Bids <span id="bid9">0</span></h5>
										</div>
										<div class="card-body">
											<h2 id="total9">0</h2>
											<h5 class="card-title mt-0">Total Bid Amount</h5>
											
										</div>
										<div class="card-footer-ank">Ank <span>9</span></div>
									</div>
								</div>
															</div>
						</div>
					</div>
				</div>
				
			</div>
			
			
		</div>
	
	</div>

	<div class="row">
	    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">Bid Winning Report</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form id="searchForm1">
                                            <div class="form-row">
                                            <div class="form-group col-md-4">
                                            <label>Date</label>
                                            <input class="form-control" type="date" value="<?php echo date('Y-m-d');?>" name="start_date1" id="start_date1" placeholder="Enter Start Date">
                                            </div>
                                          
                                            <div class="form-group col-md-5">
                                                <label>Game Name</label>
                                                <select id="game_name1" name="game_name1" class="form-control" required>
																				<option value="all">-All-</option>
										<?php $select_game = mysqli_query($con,"SELECT * FROM game_time GROUP BY game");
										while($select_g = mysqli_fetch_array($select_game)){
										    ?>
										    <option value="<?php echo $select_g['game'];?>"><?php echo $select_g['game'];?></option>
										    <?php
										}
										?>										</select>
                                            </div>
                                            
                                           
                                        <div class="form-group col-md-3" style="align-self:flex-end;">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    
                                </div>
                                </form>
                            </div>
                            <script>
                            get_b();
                            function get_b(){
                                var date = document.getElementById('start_date1').value;
							        var name = document.getElementById('game_name1').value;
							        $.ajax ({
                                        type: 'POST',
                                        url: 'ajax/bid-win-report.php',
                                        data: {name: name, date: date},
                                        success : function(htmlresponse) {
                                            $('#bids1').html(htmlresponse);
                                        }
                                    });
                            }
							    document.getElementById('searchForm1').onsubmit = function() {
							        var date = document.getElementById('start_date1').value;
							        var name = document.getElementById('game_name1').value;
							        $.ajax ({
                                        type: 'POST',
                                        url: 'ajax/bid-win-report.php',
                                        data: {name: name, date: date},
                                        success : function(htmlresponse) {
                                            $('#bids1').html(htmlresponse);
                                        }
                                    });
    
                                    return false;
                                };
							</script>
                        </div>
					</div>
					</div>
	</div>
	
					
					<span id="bids1"></span>
					
					<script type="text/javascript">
	function OpenBidHistory()
{
var date = document.getElementById('start_date1').value;
							        var name = document.getElementById('game_name1').value;
	 
	$.ajax({
		type: "POST",
		url: "ajax/get-bid-report-list.php",
		data: {name:name,date:date},
		success: function (data) {
			
			$('#winHistory').html(data);
			
		}
	});
}
</script>
					
					<span id="bidHistory"></span>
<script type="text/javascript">

function OpenWinHistoryDetails()
{
	var date = document.getElementById('start_date1').value;
	var name = document.getElementById('game_name1').value;
	 
	$.ajax({
		type: "POST",
		url: "ajax/get-win-report-list.php",
		data: {name:name,date:date},
		success: function (data) {
			
			$('#winHistory').html(data);
			
		}
	});
		
}
</script>
<span id="winHistory"></span>
<div class="row">
			
			<div class="col-sm-12">
				<div class="card">
				  <div class="card-body">
				  <h4 class="card-title">Fund Request Auto Deposit History</h4>
					<div class="dt-ext table-responsive demo-gallery">
					  <table class="table table-striped table-bordered " id="autoFundRequestList">
						<thead>
						  <tr>
							<th>#</th>
							<th>User Name</th>
							<th>Amount</th>
							<th>Request No.</th>
							<th>Date</th>
							<th>Status</th>
							<th>Action</th>
						  </tr>
						</thead>
						<tbody>
						    <?php $select_data = mysqli_query($con,"SELECT * FROM user_auto_deposite where status = 0 ORDER BY id DESC");
					    $i= 1;
					    while($select = mysqli_fetch_array($select_data)){
					        ?>
					        <tr>
					        <td><?php echo $i;?></td>
					        <td><?php $select_u = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user_info WHERE phone = '$select[username]'"));
					        echo $select_u['name'];?> <a href="view-user.php?id=<?php echo $select_u['id'];?>"><i class="fa fa-external-link" aria-hidden="true"></i></a></td>
					        <!--<td><?php echo $select['username'];?></td>-->
					        <td><?php echo $select['amount'];?></td>
					        <td><?php echo $select['id'];?></td>
					        <td><?php echo $select['txt_date'];?></td>
					        <td><?php if($select['status']=="1"){
                            					        ?><badge class="badge badge-success">Accepted</badge><?php
                            					        }else if($select['status']=="0"){ ?>
                            					            <badge class="badge badge-danger">Pending</badge>
                            					        <?php }else{ ?>
                            					            <badge class="badge badge-danger">Rejected</badge>
                            					        <?php
                            					        }?></td>
                            					         <!--<td><button class="btn btn-success btn-xs accept" onclick="window.location.href = 'status/edit-fund-request.php?id=<?php echo $select['id'];?>';" <?php if(!$select['status']=="0"){echo 'disabled';}?> id="accept">Approve</button>

								<button class="btn btn-danger btn-xs reject" onclick="window.location.href = 'status/edit-fund-request.php?id=<?php echo $select['id'];?>';" <?php if(!$select['status']=="0"){echo 'disabled';}?> id="reject">Reject</button></td>-->
					       <td><input class="approve" id="<?php echo $select['id'];?>a" type="button"  value="Approve" style="border-radius: 5px;background: #51bb25;padding: 0.44em 0.7em;border: none;color: white;font-size: 75%;font-weight: 700;" data-id="<?php echo $select['id'];?>">
					        <input class="decline" id="<?php echo $select['id'];?>d" type="button" value="Decline" style="border-radius: 5px;background: #dc3545;padding: 0.44em 0.7em;border: none;color: white;font-size: 75%; font-weight: 700;" data-id="<?php echo $select['id'];?>">
					        <input id="<?php echo $select['id'];?>r" disabled type="button" value="None" style="border-radius: 5px;background: #dc3545;padding: 0.44em 0.7em;border: none;color: white;font-size: 75%; font-weight: 700; display:none;"></td>-->
					        
					        <script type="text/javascript">
                                    $(document).ready(function(){
                                        $(".approve").click(function(){
                                            var id= $(this).data("id");
                                        var elem = document.getElementById(id+"a");
                                        elem.style.display = "none";
                                        var elem = document.getElementById(id+"d");
                                        elem.style.display = "none";
                                        var res = document.getElementById(id+"r");
                                        res.style.display = "";
                                        res.value = "Approved";
                                        res.style.background = "#51bb25";
                                        
                                        //alert(id);
                                        var response = "1";
                                        $.ajax({
                                            type: 'POST',
                                            url: 'status/edit-auto-deposit.php',
                                            data: {id:id,response:response},
                                            success: function(result) {
                                                //alert(result);
                                                
                                            }
                                        });
                                   });
                                   
                                });
                                </script>
                                <script type="text/javascript">
                                    $(document).ready(function(){
                                   $(".decline").click(function(){
                                       
                                        var id=$(this).data("id");
                                        var elem = document.getElementById(id+"a");
                                        elem.style.display = "none";
                                        var elem = document.getElementById(id+"d");
                                        elem.style.display = "none";
                                        var res = document.getElementById(id+"r");
                                        res.style.display = "";
                                        res.value = "Declined";
                                        res.style.background = "#dc3545";
                                        var response = "-1";
                                       $.ajax({
                                            type: 'POST',
                                            url: 'status/edit-auto-deposit.php',
                                            data: {'id':id,'response':response},
                                            success: function(result) {
                                              //  alert(result);
                                                
                                            }
                                        });
                                   });
                                });
                                </script>
								</tr>
								
					        <?php
					        $i++;
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
</div>
</div>
<script>
    $(document).ready( function () {
    $('#autoFundRequestList').DataTable();
} );
</script>
	
	<?php include('footer.php');?>