<style type="text/css">
	h5{
		font-weight: bold;
		text-align-last: center;
	}
	.bord{
		border: 1px solid black;
	    padding: 3px;
	}
	.badge{
		min-width: 50px;
	}
	.st_br_hb{
		text-align-last: center;
	}
	.st_br_ht{
		text-align-last: center;
	}
    .sr_title{
        border: 2px dotted black;
        margin: 5px 0px;
        padding: 5px;
    }
    
</style>
<?php include('../config.php');

$name = mysqli_real_escape_string($con,$_POST['name']);
$type = mysqli_real_escape_string($con,$_POST['type']);
$date = mysqli_real_escape_string($con,$_POST['date']);
if($type === "Single Digit" ){
    $digit = "digit";
    ?>
    <div class="container-fluid">
	<div class="row">
	<!-- Zero Configuration  Starts-->	
		<div class="col-sm-12">
			<div class="card">
			  <div class="card-body">
			 
				 <div class="mytable"><div class="row">
				     <div class="col-md-12 sr_title"><h5>Single Digit</h5></div>
			    </div>
			    <div class="row sr_td_data">
			        <div class="form-group bord st_br_l col-md-2"><h5 class="st_br_ht">Digit</h5><h5 class="st_br_hb">Point</h5></div>
			        <?php

			        $select_number = mysqli_query($con,"SELECT * FROM game_number WHERE type = 'Single Digit'");

			        while($select = mysqli_fetch_array($select_number)){
			            
			        	$select_bid = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(points_action) as sum FROM starline_bid_history WHERE date = '$date' AND game_name = '$name' AND game_type='$type' AND $digit = '$select[number]'"));
			        	
			        	$sum = $select_bid['sum'];
			        	
			        	if($sum == ""){
			        	    $sum = 0;
			        	}

			        	?>
			        		<div class="form-group bord col-md-1"><h5 class="st_br_ht"><?php echo $select['number'];?></h5><h5 class="st_br_hb"><badge class="badge <?php if($sum == '0'){ echo 'badge-danger';}else{ echo 'badge-success';}?>"><?php echo $sum;?></badge></h5></div>
			        	<?php
			        }
			        ?>
			        </div>
			        </div>
			        </div>
			        </div>
			        </div>
			        </div>
			        </div>
			        <?
											
}else if($type === 'Single Pana'){
$pana = "pana";
?>
    <div class="container-fluid">
	<div class="row">
	<!-- Zero Configuration  Starts-->	
		<div class="col-sm-12">
			<div class="card">
			  <div class="card-body">
			 
				 <div class="mytable"><div class="row">
				     <div class="col-md-12 sr_title"><h5>Single Pana</h5></div>
			    </div>
			    <div class="row sr_td_data">
			        <div class="form-group bord st_br_l col-md-2"><h5 class="st_br_ht">Digit</h5><h5 class="st_br_hb">Point</h5></div>
			        <?php

			        $select_number = mysqli_query($con,"SELECT * FROM game_number WHERE type LIKE '%Single Pana%'");

			        while($select = mysqli_fetch_array($select_number)){
			            
			        	$select_bid = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(points_action) as sum FROM starline_bid_history WHERE date = '$date' AND game_name = '$name' AND game_type='$type' AND $pana='$select[number]'"));
			        	
			        	$sum = $select_bid['sum'];
			        	
			        	if($sum == ""){
			        	    $sum = 0;
			        	}

			        	?>
			        		<div class="form-group bord col-md-1"><h5 class="st_br_ht"><?php echo $select['number'];?></h5><h5 class="st_br_hb"><badge class="badge <?php if($sum == '0'){ echo 'badge-danger';}else{ echo 'badge-success';}?>"><?php echo $sum;?></badge></h5></div>
			        	<?php
			        }

 ?>
			        </div>
			        </div>
			        </div>
			        </div>
			        </div>
			        </div>
			        </div>
			        <? }else if($type === 'Double Pana'){
$pana = "pana";
?>
    <div class="container-fluid">
	<div class="row">
	<!-- Zero Configuration  Starts-->	
		<div class="col-sm-12">
			<div class="card">
			  <div class="card-body">
			 
				 <div class="mytable"><div class="row">
				     <div class="col-md-12 sr_title"><h5>Double Pana</h5></div>
			    </div>
			    <div class="row sr_td_data">
			        <div class="form-group bord st_br_l col-md-2"><h5 class="st_br_ht">Digit</h5><h5 class="st_br_hb">Point</h5></div>
			        <?php

			        $select_number = mysqli_query($con,"SELECT * FROM game_number WHERE type LIKE '%Double Pana%'");

			        while($select = mysqli_fetch_array($select_number)){
			            
			        	$select_bid = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(points_action) as sum FROM starline_bid_history WHERE date = '$date' AND game_name = '$name' AND game_type='$type' AND $pana='$select[number]'"));
			        	
			        	$sum = $select_bid['sum'];
			        	
			        	if($sum == ""){
			        	    $sum = 0;
			        	}

			        	?>
			        		<div class="form-group bord col-md-1"><h5 class="st_br_ht"><?php echo $select['number'];?></h5><h5 class="st_br_hb"><badge class="badge <?php if($sum == '0'){ echo 'badge-danger';}else{ echo 'badge-success';}?>"><?php echo $sum;?></badge></h5></div>
			        	<?php
			        }

 ?>
			        </div>
			        </div>
			        </div>
			        </div>
			        </div>
			        </div>
			        </div>
			        <? }else if($type === 'Triple Pana'){
$pana = "pana";
?>
    <div class="container-fluid">
	<div class="row">
	<!-- Zero Configuration  Starts-->	
		<div class="col-sm-12">
			<div class="card">
			  <div class="card-body">
			 
				 <div class="mytable"><div class="row">
				     <div class="col-md-12 sr_title"><h5>Triple Pana</h5></div>
			    </div>
			    <div class="row sr_td_data">
			        <div class="form-group bord st_br_l col-md-2"><h5 class="st_br_ht">Digit</h5><h5 class="st_br_hb">Point</h5></div>
			        <?php

			        $select_number = mysqli_query($con,"SELECT * FROM game_number WHERE type LIKE '%Tripple Pana%'");

			        while($select = mysqli_fetch_array($select_number)){
			            
			        	$select_bid = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(points_action) as sum FROM starline_bid_history WHERE date = '$date' AND game_name = '$name' AND game_type='$type' AND $pana='$select[number]'"));
			        	
			        	$sum = $select_bid['sum'];
			        	
			        	if($sum == ""){
			        	    $sum = 0;
			        	}

			        	?>
			        		<div class="form-group bord col-md-1"><h5 class="st_br_ht"><?php echo $select['number'];?></h5><h5 class="st_br_hb"><badge class="badge <?php if($sum == '0'){ echo 'badge-danger';}else{ echo 'badge-success';}?>"><?php echo $sum;?></badge></h5></div>
			        	<?php
			        }

 ?>
			        </div>
			        </div>
			        </div>
			        </div>
			        </div>
			        </div>
			        </div>
			        <? }else{
    
    $digit = "digit";
    ?>
    <div class="container-fluid">
	<div class="row">
	<!-- Zero Configuration  Starts-->	
		<div class="col-sm-12">
			<div class="card">
			  <div class="card-body">
			 
				 <div class="mytable"><div class="row">
				     <div class="col-md-12 sr_title"><h5>Single Digit</h5></div>
			    </div>
			    <div class="row sr_td_data">
			        <div class="form-group bord st_br_l col-md-2"><h5 class="st_br_ht">Digit</h5><h5 class="st_br_hb">Point</h5></div>
			        <?php

			        $select_number = mysqli_query($con,"SELECT * FROM game_number WHERE type = 'Single Digit'");

			        while($select = mysqli_fetch_array($select_number)){
			            
			        	$select_bid = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(points_action) as sum FROM starline_bid_history WHERE date = '$date' AND game_name = '$name' AND game_type='Single Digit' AND $digit = '$select[number]'"));
			        	
			        	$sum = $select_bid['sum'];
			        	
			        	if($sum == ""){
			        	    $sum = 0;
			        	}

			        	?>
			        		<div class="form-group bord col-md-1"><h5 class="st_br_ht"><?php echo $select['number'];?></h5><h5 class="st_br_hb"><badge class="badge <?php if($sum == '0'){ echo 'badge-danger';}else{ echo 'badge-success';}?>"><?php echo $sum;?></badge></h5></div>
			        	<?php
			        }
											



?>


			        </div>
			        </div>
			        </div>
			        </div>
			        </div>
			        </div>
			        </div>
			        
<?


$pana = "pana";
?>
    <div class="container-fluid">
	<div class="row">
	<!-- Zero Configuration  Starts-->	
		<div class="col-sm-12">
			<div class="card">
			  <div class="card-body">
			 
				 <div class="mytable"><div class="row">
				     <div class="col-md-12 sr_title"><h5>Single Pana</h5></div>
			    </div>
			    <div class="row sr_td_data">
			        <div class="form-group bord st_br_l col-md-2"><h5 class="st_br_ht">Digit</h5><h5 class="st_br_hb">Point</h5></div>
			        <?php

			        $select_number = mysqli_query($con,"SELECT * FROM game_number WHERE type LIKE '%Single Pana%'");

			        while($select = mysqli_fetch_array($select_number)){
			            
			        	$select_bid = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(points_action) as sum FROM starline_bid_history WHERE date = '$date' AND game_name = '$name' AND game_type='Single Pana' AND $pana='$select[number]'"));
			        	
			        	$sum = $select_bid['sum'];
			        	
			        	if($sum == ""){
			        	    $sum = 0;
			        	}

			        	?>
			        		<div class="form-group bord col-md-1"><h5 class="st_br_ht"><?php echo $select['number'];?></h5><h5 class="st_br_hb"><badge class="badge <?php if($sum == '0'){ echo 'badge-danger';}else{ echo 'badge-success';}?>"><?php echo $sum;?></badge></h5></div>
			        	<?php
			        }
?>
 </div>
			        </div>
			        </div>
			        </div>
			        </div>
			        </div>
			        </div>
<?

$pana = "pana";
?>
    <div class="container-fluid">
	<div class="row">
	<!-- Zero Configuration  Starts-->	
		<div class="col-sm-12">
			<div class="card">
			  <div class="card-body">
			 
				 <div class="mytable"><div class="row">
				     <div class="col-md-12 sr_title"><h5>Double Pana</h5></div>
			    </div>
			    <div class="row sr_td_data">
			        <div class="form-group bord st_br_l col-md-2"><h5 class="st_br_ht">Digit</h5><h5 class="st_br_hb">Point</h5></div>
			        <?php

			        $select_number = mysqli_query($con,"SELECT * FROM game_number WHERE type LIKE '%Double Pana%'");

			        while($select = mysqli_fetch_array($select_number)){
			            
			        	$select_bid = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(points_action) as sum FROM starline_bid_history WHERE date = '$date' AND game_name = '$name' AND game_type='Double Pana' AND $pana='$select[number]'"));
			        	
			        	$sum = $select_bid['sum'];
			        	
			        	if($sum == ""){
			        	    $sum = 0;
			        	}

			        	?>
			        		<div class="form-group bord col-md-1"><h5 class="st_br_ht"><?php echo $select['number'];?></h5><h5 class="st_br_hb"><badge class="badge <?php if($sum == '0'){ echo 'badge-danger';}else{ echo 'badge-success';}?>"><?php echo $sum;?></badge></h5></div>
			        	<?php
			        }

?>
 </div>
			        </div>
			        </div>
			        </div>
			        </div>
			        </div>
			        </div>
<?
$pana = "pana";
?>
    <div class="container-fluid">
	<div class="row">
	<!-- Zero Configuration  Starts-->	
		<div class="col-sm-12">
			<div class="card">
			  <div class="card-body">
			 
				 <div class="mytable"><div class="row">
				     <div class="col-md-12 sr_title"><h5>Triple Pana</h5></div>
			    </div>
			    <div class="row sr_td_data">
			        <div class="form-group bord st_br_l col-md-2"><h5 class="st_br_ht">Digit</h5><h5 class="st_br_hb">Point</h5></div>
			        <?php

			        $select_number = mysqli_query($con,"SELECT * FROM game_number WHERE type LIKE '%Tripple Pana%'");

			        while($select = mysqli_fetch_array($select_number)){
			            
			        	$select_bid = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(points_action) as sum FROM starline_bid_history WHERE date = '$date' AND game_name = '$name' AND game_type='Triple Pana' AND $pana='$select[number]'"));
			        	
			        	$sum = $select_bid['sum'];
			        	
			        	if($sum == ""){
			        	    $sum = 0;
			        	}

			        	?>
			        		<div class="form-group bord col-md-1"><h5 class="st_br_ht"><?php echo $select['number'];?></h5><h5 class="st_br_hb"><badge class="badge <?php if($sum == '0'){ echo 'badge-danger';}else{ echo 'badge-success';}?>"><?php echo $sum;?></badge></h5></div>
			        	<?php
			        }

?>
			        </div>
			        </div>
			        </div>
			        </div>
			        </div>
			        </div>
			        </div>
			        <? 
}?>