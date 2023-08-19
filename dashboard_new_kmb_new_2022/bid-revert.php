<?php 
include('header.php');
include('sidebar.php');?>

<div class="main-content">	<div class="page-content">
	<div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header"></h4>
                            </div>
                            <div class="card-body">
                                Bid Revert
                                <div class="basic-form">
                                    <form class="theme-form mega-form" id="customerSellFrm" name="customerSellFrm">

							<div class="row">
																<div class="form-group col-md-2" style="margin-top:auto;">

									<label>Date</label>

									

										<div class="input-group">

										  <input type="date" value="<?php echo date('Y-m-d');?>"  class="form-control" name="start_date" id="start_date" placeholder="Enter Start Date" >

										</div>

								</div>
								 
								
								
								<div class="form-group col-md-2">	
									<label class="col-form-label">Game Name</label>		
									<select id="game_name" name="game_name" class="form-control">
																					<?php $select_game = mysqli_query($con,"SELECT * FROM game_time GROUP BY game");
										while($select_g = mysqli_fetch_array($select_game)){
										    ?>
										    <option value="<?php echo $select_g['game'];?>"><?php echo $select_g['game'];?></option>
										    <?php
										}
										?>		
																				</select>	
								</div>
								 
								
								<div class="form-group col-md-2" style="align-self:flex-end;">

									<button type="submit" class="btn btn-primary waves-light m-t-25" id="submitBtn" name="submitBtn" data-original-title="" title="">Submit</button>

								</div>

							</div>

							</form>
							<script>
							    document.getElementById('customerSellFrm').onsubmit = function() {
							        var name = document.getElementById('game_name').value;
							        var date = document.getElementById('start_date').value;
							        $.ajax ({
                                        type: 'POST',
                                        url: 'ajax/get-bid-revert.php',
                                        data: {name: name, date: date},
                                        success : function(htmlresponse) {
                                            $('#bids').html(htmlresponse);
                                            $('#myTable').DataTable();
                                        }
                                    });
    
    return false;
};
							</script>
                            </div>
                        </div>
					</div>
					</div>
		<!--end page wrapper -->
<span id="bids"></span></div>
	
</div>


<div class="modal fade" id="revertModel" tabindex="-1" role="dialog" aria-hidden="true" >
  <div class="modal-dialog modal-frame modal-top modal-md">
	<div class="modal-content">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
  </div>
	  <div class="modal-body">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-left">
						<h5>Are you sure you want to clean and refund bid amount...?</h5>
					</div>
					<div class="col-md-4 text-left">
						<button onclick="data_refund()" id="data_clean_date" class="btn btn-danger waves-effect waves-light">Yes</button>
						<button class="btn btn-info waves-effect waves-light" data-dismiss="modal">No</button>
					</div>
					<div class="error_msg">
				</div>
			</div>
	  </div>
	</div>
  </div>
</div>
</div>

	
<?php include('footer.php');?>