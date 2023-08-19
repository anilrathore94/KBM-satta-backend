<?php include('../config.php');
	
		$email = mysqli_real_escape_string($con,$_POST['email']);
		$password = mysqli_real_escape_string($con,$_POST['password']);

		$select = mysqli_query($con,"SELECT id FROM admin WHERE email='$email' AND password='$password'");
		if($select){
			if(mysqli_num_rows($select)){
				if (session_status() == PHP_SESSION_NONE) {
				    
				    session_start();
				}
				$_SERVER['HTTP_USER_AGENT'] == 1;
				$_SESSION['admin'] = $email;
				
				
				?>
					<script type="text/javascript">
						window.location = '../index.php';
					</script>
				<?php
			}else{
				?>
					<script type="text/javascript">
						window.location = '../index.php';
					</script>
				<?php
			}
		}
	
?>