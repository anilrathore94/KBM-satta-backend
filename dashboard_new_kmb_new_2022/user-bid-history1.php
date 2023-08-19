<?php 
include('header.php');
include('sidebar.php');?>

<div class="main-content">	
<div class="page-content">
<div class="container-fluid">

	<div class="row">

		<div class="col-sm-12 col-xl-12 col-md-12">

            <div class="row">

				<div class="col-sm-12">

                    <div class="card">

						<div class="card-header p-t-15 p-b-15">

							

						</div>

						<div class="card-body">
                            <h5>Bid History Report</h5>
							<form class="theme-form mega-form" id="customerSellForm" method="post">

							<div class="row">
																<div class="form-group col-md-2" style="margin-top:auto;">

									<label>Date</label>

									

										<div class="input-group">

										  <input type="date" value="<?php echo date('Y-m-d');?>"  class="form-control" name="start_date" id="start_date" placeholder="Enter Start Date" >

										</div>

								</div>
								 
								
								
								<div class="form-group col-md-4" >	
									<label class="col-form-label">Game Name</label>		
									<select id="game_name" name="game_name" class="form-control">
										<option value="all">All</option>
																					<?php $select_game = mysqli_query($con,"SELECT * FROM games_management");
										while($select_g = mysqli_fetch_array($select_game)){
										    ?>
										    <option value="<?php echo $select_g['games_name'];?>"><?php echo $select_g['games_name'];?></option>
										    <?php
										}
										?>		
																				</select>	
								</div>
								
									
								<div class="form-group col-md-4">	
									<label class="col-form-label">Game Type</label>		
									<select id="game_type" name="game_type" class="form-control">
										<option value="all">All</option>
											<option value="Single Digit">Single Digit</option>
											<option value="Jodi Digit">Jodi Digit</option>
										
											<option value="Single Pana">Single Pana</option>
												<option value="Double Pana">Double Pana
											</option>
											<option value="Triple Pana">Triple Pana</option>
											 
									</select>	
								</div>
								 
								
								<div class="form-group col-md-2" style="align-self:flex-end;">

									<button type="submit" class="btn btn-primary waves-light m-t-25" >Submit</button>

								</div>

							</div>

							</form>
							<script>
							hello();
							function hello(){
							    var name = document.getElementById('game_name').value;
							        var date = document.getElementById('start_date').value;
							        var type = document.getElementById('game_type').value
							        $.ajax ({
                                        type: 'POST',
                                        url: 'ajax/get-bid-list.php',
                                        data: {name: name, date: date, type:type},
                                        success : function(htmlresponse) {
                                            $('#bids').html(htmlresponse);
                                        }
                                    });
							}
							    document.getElementById('customerSellForm').onsubmit = function() {
							        var name = document.getElementById('game_name').value;
							        var date = document.getElementById('start_date').value;
							        var type = document.getElementById('game_type').value
							        $.ajax ({
                                        type: 'POST',
                                        url: 'ajax/get-bid-list1.php',
                                        data: {name: name, date: date, type:type},
                                        success : function(htmlresponse) {
                                            $('#bids').html(htmlresponse);
                                            $('#bidHistory').DataTable();
                                        }
                                    });
    
    return false;
};
							</script>
							
						</div>

                    </div>

                </div>

			</div>

		</div>

	</div>

</div>
<span id="bids"></span>
</div>
<div class="modal fade" id="updatebidhistoryModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal_right_side" role="document">
	<div class="modal-content col-12 col-md-3">
	  <div class="modal-header">
		<h5 class="modal-title">Update Bid</h5>
		<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  </div>
	  <div class="modal-body modal_update_edibidhistory">
		</div>
	</div>
   </div>
</div>



<?php include('footer.php');?>