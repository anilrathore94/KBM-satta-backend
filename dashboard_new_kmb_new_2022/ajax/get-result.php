<?php 
include('../config.php');
$date = $_POST['date'];
$select_result1 = mysqli_query($con,"SELECT * FROM result_chart WHERE date = '$date' AND open_panna !='' AND open_digit!=''");
if(mysqli_num_rows($select_result1)>0){
   
   ?>	
   
   <div class="container-fluid">
	<div class="row row_col">	
		<div class="col-12 col-md-12 col-lg-12">		
			<div class="card">	
				<div class="card-body">
					<h4 class="card-title">Result Declaration</h4>		
					<div class="table-responsive m-t-10">	
						<table class="table table-bordered table-striped" id="resultHistory">
							<thead>						
								<tr>					
									<th class="w-20">Games Name</th>
									<th>Open Time</th> 		
									<th>Close Time</th>
									<th>Open Result</th> 			
									<th>Close Result</th> 	
								</tr>
							</thead>
							<tbody>
							    
							    <?php 
							    
							    while($select1 = mysqli_fetch_array($select_result1)){
							        ?>
							        <tr>
							            <td><?php echo $select1['game_name'];?></td>
							            <?php $select_time1 = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM games_management WHERE games_name='$select1[game_name]'"))?>
									<td><?php echo $select_time1['open_time'];?></td>
									<td><?php echo $select_time1['close_time'];?></td>
									<?php $open_panna = $select1['open_panna'];
									    $open_digit = $select1['open_digit'];
									    if($select1['close_panna'] == ""){
									        $close_panna = "***";
									    }else{
									        $close_panna = $select1['close_panna'];
									    }
									    if($select1['close_digit'] == ""){
									        $close_digit = "*";
									    }else{
									        $close_digit = $select1['close_digit'];
									    }
									    ?>
									<td><span class="sub_s"><?php echo $open_panna;?></span><span class="hyphen">-</span><span class="sub_s"><?php echo $open_digit;?></span>
																		<a style="cursor:pointer" onclick="return confirm('Are you sure you want to delete?')"  href="delete/delete-open-result1.php?id=<?php echo $select1['id']; ?>"><badge class="badge badge-danger">Delete</badge></a></td>
									<td><span class="sub_s"><?php echo $close_digit;?></span><span class="hyphen">-</span><span class="sub_s"><?php echo $close_panna;?></span>
									<?php
									if($select1['close_panna'] == ""){
									        
									    }else{
									        ?>
									        <a style="cursor:pointer" onclick="return confirm('Are you sure you want to delete?')" href="delete/delete-close-result1.php?id=<?php echo $select1['id']; ?>"><badge class="badge badge-danger">Delete</badge></a>
									        <?php
									    }
									?>
									</td>
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