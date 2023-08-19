<?php date_default_timezone_set('Asia/Kolkata');
    $dbhost = 'LOCALHOST';
    $dbuser = 'u214419219_kmb';
    $dbpass = 'u214419219_Kmb';
    $dbname = 'u214419219_kmb';
    
    $sql_details = array(
    'user' => 'u214419219_kmb',
    'pass' => 'u214419219_Kmb',
    'db'   => 'u214419219_kmb',
    'host' => 'LOCALHOST'
    );
    
    
    $con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    $web_url = "http://kubermatkabooking.tech/dashboard_new_Kuberbooking";
    $app_name = "KMB 2022";
    $pay_key = "";
?>