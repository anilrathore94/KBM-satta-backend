<?php 
include('../config.php');
$date = $_POST['date'];
$select_result1 = mysqli_query($con,"SELECT * FROM starline_result_chart WHERE date = '$date' AND open_panna !='' AND open_digit!=''");
if(mysqli_num_rows($select_result1)>0){
   
   ?>	
   
   <div class="container-fluid">
	<div class="row row_col">	
		<div class="col-12 col-md-12 col-lg-12">		
			<div class="card">	
				<div class="card-body">
					<h4 class="card-title">Result Declaration</h4>		
					<div class="table-responsive m-t-10">	
						<table class="table table-bordered table-striped">
							<thead>						
								<tr>					
									<th class="w-20">Games Name</th>
									<th>Open Time</th> 	
									<th>Open Result</th> 	
								</tr>
							</thead>
							<tbody>
							    
							    <?php 
							    
							    while($select1 = mysqli_fetch_array($select_result1)){
							        ?>
							        <tr>
							            <td><?php echo $select1['game_name'];?></td>
							            <?php $select_time1 = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM starline_game_name WHERE games_name='$select1[game_name]'"))?>
									<td><?php echo $select_time1['open_time'];?></td>
									<?php $open_panna = $select1['open_panna'];
									    $open_digit = $select1['open_digit'];
									    
									    ?>
									<td><span class="sub_s"><?php echo $open_panna;?></span><span class="hyphen">-</span><span class="sub_s"><?php echo $open_digit;?></span>
																		<a style="cursor:pointer" onclick="return confirm('Are you sure you want to delete?')"  href="delete/delete-starline-result.php?id=<?php echo $select1['id']; ?>"><badge class="badge badge-danger">Delete</badge></a></td>
									
							        </tr>
							        <?php
							    }
							    ?>
															
							</tbody>
						</table>	
					</div>
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