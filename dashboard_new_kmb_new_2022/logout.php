<?php 

session_start();
          $_SESSION['admin_email']="";
          // remove all session variables
session_unset();

// destroy the session
session_destroy();
          header("Location: login.php");
?>