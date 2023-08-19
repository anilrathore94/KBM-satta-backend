<?php 
include('header.php');
include('sidebar.php');?>

<div class="main-content">	<div class="page-content">
    <div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-flex align-items-center justify-content-between">
					<h4 class="mb-0 font-size-18">User List</h4>

					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
							<li class="breadcrumb-item active">User List</li>
						</ol>
					</div>

				</div>
			</div>
		</div>
		
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title d-flex align-items-center justify-content-between">&nbsp; <a href="un-approved-users-list.php" class="btn btn-primary waves-effect waves-light btn-sm">Un-approved Users List</a></h4>
					<div class="table-responsive">
					<table id="userList" class="table table-bordered">
						<thead>
						  <tr>
							<th>#</th>
							<th>User Name</th>
							<th>Mobile</th>
							<th>email</th>
							<th>Date</th>
							<th>Balance</th>
							<th>Betting</th>
							<th>Transfer</th>
							<th>Active</th>
							<th>View</th>
						  </tr>
						</thead>
					
					</table>
					<div id="msg"></div>
				</div>
				</div>
			</div>
		</div>
		
		
	</div>
</div>	
<script>
/* $(document).ready( function () {
    $('#userList').dataTable({
});
} ); */

$(document).ready(function() {
    $('#userList').DataTable( {
        "processing": true,
        "serverSide": true,
        "order": [[ 0, "desc" ]], 
        "ajax": "scripts/server_processing.php"
    } );
} );
												
</script>
<script>
    function user_status(id){
        var elem = document.getElementById(id+"s");
        if (elem.innerHTML=="Yes"){ 
            elem.innerHTML = "No";
            elem.style.color = "#FF4847";
            elem.style.backgroundColor = "#f46a6a2e";
        }
        else{  
             elem.innerHTML = "Yes";
            elem.style.color = "#2BC155";
            elem.style.backgroundColor = "#34c38f2e";
        }
        $.ajax({
            type: 'POST',
            url: 'status/edit-user-status.php',
            data: {id:id},
            success: function(result) {
                
            }
        });
    }
</script>
<script>
    function transfer_status(id){
       
        var elem = document.getElementById(id+"t");
        if (elem.innerHTML=="Yes"){ 
            elem.innerHTML = "No";
            elem.style.color = "#FF4847";
            elem.style.backgroundColor = "#f46a6a2e";
        }
        else{  
             elem.innerHTML = "Yes";
            elem.style.color = "#2BC155";
            elem.style.backgroundColor = "#34c38f2e";
        }
        $.ajax({
            type: 'POST',
            url: 'status/edit-transfer-status.php',
            data: {id:id},
            success: function(result) {
                
            }
        });
    }
</script>
<script>
    function betting_status(id){
       
        var elem = document.getElementById(id+"b");
        if (elem.innerHTML=="Yes"){ 
            elem.innerHTML = "No";
            elem.style.color = "#FF4847";
            elem.style.backgroundColor = "#f46a6a2e";
        }
        else{  
             elem.innerHTML = "Yes";
            elem.style.color = "#2BC155";
            elem.style.backgroundColor = "#34c38f2e";
        }
        $.ajax({
            type: 'POST',
            url: 'status/edit-betting-status.php',
            data: {id:id},
            success: function(result) {
                
            }
        });
    }
</script>
<?php include('footer.php');?>