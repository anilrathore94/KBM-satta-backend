<?php 
include('header.php');
include('sidebar.php');?>
<style>.card-body {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    min-height: 1px;
    padding: 3.25rem;
}</style>
<div class="main-content">	
<div class="page-content">
	<div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">Winning Report</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form id="searchForm">
                                            <div class="form-row">
                                            <div class="form-group col-md-4">
                                            <label>Date</label>
                                            <input class="form-control" type="date" value="<?php echo date('Y-m-d');?>" name="start_date" id="start_date" placeholder="Enter Start Date">
                                            </div>
                                          
                                            <div class="form-group col-md-5">
                                                <label>Game Name</label>
                                                <select id="game_name" name="game_name" class="form-control" required>
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
							    document.getElementById('searchForm').onsubmit = function() {
							        var date = document.getElementById('start_date').value;
							        var name = document.getElementById('game_name').value;
							        $.ajax ({
                                        type: 'POST',
                                        url: 'ajax/bid-win-report.php',
                                        data: {name: name, date: date},
                                        success : function(htmlresponse) {
                                            $('#bids').html(htmlresponse);
                                        }
                                    });
    
                                    return false;
                                };
							</script>
                        </div>
					</div>
					</div>
					</div>
					<span id="bids"></span>
					
					<script type="text/javascript">
	function OpenBidHistory()
{
var date = document.getElementById('start_date').value;
							        var name = document.getElementById('game_name').value;
	 
	$.ajax({
		type: "POST",
		url: "ajax/get-bid-report-list.php",
		data: {name:name,date:date},
		success: function (data) {
			
			$('#bidHistory').html(data);
			$('#bidList').dataTable();
			
		}
	});
}
</script>
					
					<span id="bidHistory"></span>
<script type="text/javascript">

function OpenWinHistoryDetails()
{
	var date = document.getElementById('start_date').value;
							        var name = document.getElementById('game_name').value;
	 
	$.ajax({
		type: "POST",
		url: "ajax/get-win-report-list.php",
		data: {name:name,date:date},
		success: function (data) {
			
			$('#winHistory').html(data);
			$('#winList').dataTable();
			
		}
	});
		
}
</script>
<span id="winHistory"></span>
	
<?php include('footer.php');?>