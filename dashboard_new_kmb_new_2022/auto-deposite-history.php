<?php 
include('header.php');
include('sidebar.php');?>

<div class="main-content">	<div class="page-content">
	<div class="container-fluid">


                <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header"></h4>
                            </div>
                            <div class="card-body">
                                Auto Deposit
                                <div class="basic-form">
                                    <form id="transformFrm">
                                            <div class="form-row">
                                            <div class="form-group col-md-6">
                                            <label>Date</label>
                        <input class="form-control" type="date" value="<?php echo date('Y-m-d');?>" name="start_date" id="start_date" placeholder="Enter Start Date" onchange="changeDate();" >
                                            </div>
                                          
                                <!--     <div class="form-group col-md-6" style="align-self:flex-end;">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        </div> -->
                                    
                                </div>
                                </form>
                                <script>
                                   function changeDate() {
							        var date = document.getElementById('start_date').value;
							        $.ajax ({
                                        type: 'POST',
                                        url: 'ajax/get-auto-deposit-report.php',
                                        data: {date: date},
                                        success : function(htmlresponse) {
                                            $('#bids').html(htmlresponse);
                                            $('#resultHistory').DataTable();
                                        }
                                    });
                                    
                                    return false;
                                }
                                
                                 $(document).ready( function () {
                                    changeDate();
                                 } );
							</script>
                            </div>
                        </div>
					</div>
		</div>
		</div>
		<span id="bids"></span>
</div>
	
<?php include('footer.php');?>