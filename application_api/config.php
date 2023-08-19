
<?php
date_default_timezone_set('Asia/kolkata');
define('DB_HOST', 'localhost');
define('DB_USER', 'u299108802_dragon');
define('DB_PASSWORD', 'u299108802_Dragon');
define('DB_NAME', 'u299108802_dragon');

$con=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)or die("Failed connect".mysqli_connect_error());
?>