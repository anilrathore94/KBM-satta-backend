<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(isset($_SESSION['admin'])){
        if($_SESSION['admin'] == ""){
            ?>
            <script type="text/javascript">
                window.location = "login.php";
            </script>
            <?php
        }else{
        }
    }else{
        ?>
            <script type="text/javascript">
                window.location = "login.php";
            </script>
        <?php
    }
    include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Dashboard</title>
    
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="assets/images/logo2.png">

	<!-- Bootstrap Css -->
	<link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
	<!-- Icons Css -->
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
	<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
	<!-- App Css-->
	<link href="assets/css/app.min.css?v=2" id="app-style" rel="stylesheet" type="text/css" />
	
	<link href="assets/css/custom.css?v=11" rel="stylesheet" type="text/css" />
	<link href='//cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css' rel='stylesheet'>
	<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
	<script src="assets/libs/jquery/jquery.min.js"></script>
	
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.21.0/slimselect.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.21.0/slimselect.min.css" rel="stylesheet"></link>	
  </head>
  <body data-sidebar="dark">
    
	<div id="layout-wrapper">
	<header id="page-topbar">
	<div class="navbar-header">
		<div class="d-flex">
			<!-- LOGO -->
			<div class="navbar-brand-box">
				<a href="index.php" class="logo logo-dark">
					<span class="logo-sm">
						<img src="assets/images/logo1.png" alt="" height="22">
					</span>
					<span class="logo-lg" style="    font-size: 18px;
    background: orange;
    color: black;
    font-weight: 600;
    padding: 5px;">
						<?php echo $app_name;?>
					</span>
				</a>

				<a href="index.php" class="logo logo-light">
					<span class="logo-sm">
						<img src="assets/images/logo1.png" alt="" height="22">
					</span>
					<span class="logo-lg" style="    font-size: 18px;
    background: orange;
    color: black;
    font-weight: 600;
    padding: 5px;">
						<?php echo $app_name;?>
					</span>
				</a>
			</div>

			<button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
				<i class="fa fa-fw fa-bars"></i>
			</button>
			
			<button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
				<b><a href="index.php">Home</a></b>
			</button>

	
		</div>

		<div class="d-flex">
			
			
			<div class="dropdown d-none d-lg-inline-block ml-1">
				<button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
					<i class="bx bx-fullscreen"></i>
				</button>
			</div>

			
			<div class="dropdown d-inline-block">
				<button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
					data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img class="rounded-circle header-profile-user" src="assets/images/avatar-1.jpg"
						alt="Header Avatar">
					<span class="d-none d-xl-inline-block ml-1" key="t-henry">Admin</span>
					<i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
				</button>
				<div class="dropdown-menu dropdown-menu-right">
					<!-- item-->
					<a class="dropdown-item" href="change-password.php"><i class="bx bx-user font-size-16 align-middle mr-1"></i> <span key="t-lock-screen">Change Password</span></a>
					<a class="dropdown-item d-block" href="main-settings.php"><i class="bx bx-wrench font-size-16 align-middle mr-1"></i> <span key="t-settings">Settings</span></a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item text-danger" href="#logoutModal" data-toggle="modal"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> <span key="t-logout">Logout</span></a>
				</div>
			</div>

			

		</div>
	</div>
</header>