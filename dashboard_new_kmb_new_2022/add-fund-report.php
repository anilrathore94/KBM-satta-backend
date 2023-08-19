<?php include('header.php');
include('sidebar.php');?>
<div class="main-content">	
<div class="page-content">
<div class="container-fluid">

				<!-- Add Order -->
				<div class="modal fade" id="addOrderModalside">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Event</h5>
								<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="form-group">
										<label class="text-black font-w500">Event Name</label>
										<input type="text" class="form-control">
									</div>
									<div class="form-group">
										<label class="text-black font-w500">Event Date</label>
										<input type="date" class="form-control">
									</div>
									<div class="form-group">
										<label class="text-black font-w500">Description</label>
										<input type="text" class="form-control">
									</div>
									<div class="form-group">
										<button type="button" class="btn btn-primary">Create</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Add Fund Report</a></li>
					</ol>
                </div>
                <!-- row -->


                <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">Add Fund Report</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form id="transformFrm">
                                            <div class="form-row">
                                            <div class="form-group col-md-6">
                                            <label>Date</label>
                                            <input class="form-control" type="date" value="<?php echo date('Y-m-d');?>" name="start_date" id="start_date" placeholder="Enter Start Date" >
                                            </div>
                                          
                                        <div class="form-group col-md-6" style="align-self:flex-end;">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    
                                </div>
                                </form>
                                <script>
							    document.getElementById('transformFrm').onsubmit = function() {
							        var date = document.getElementById('start_date').value;
							        $.ajax ({
                                        type: 'POST',
                                        url: 'ajax/get-fund-report.php',
                                        data: {date: date},
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
		</div>
		<span id="bids"></span>
		</div>
		<!--end page wrapper -->

		
		<?php include('footer.php');?>