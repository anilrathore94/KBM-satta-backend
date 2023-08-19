<?php
include('../config.php');

if($_SERVER['REQUEST_METHOD']=="POST"){
    
    $user = mysqli_real_escape_string($con,$_POST['user']);
    $title = mysqli_real_escape_string($con,$_POST['title']);
    $message = mysqli_real_escape_string($con,$_POST['message']);
    
    if($user == "all"){
        $select_device = mysqli_query($con,"SELECT * FROM device_token WHERE token_id != ''");
    }else{
        $select_device = mysqli_query($con,"SELECT * FROM device_token WHERE token_id != '' AND mobile='$user'");
    }


    if(mysqli_num_rows($select_device)>0){
        while($tokens=mysqli_fetch_array($select_device)){
            
                $token1[] = $tokens['token_id'];
        }
    }else{
        $token1 ="";
    }
    
    $url = 'https://fcm.googleapis.com/fcm/send';
    $message1 = $title. " @@@ ".$message;

$fields = array
 (
'registration_ids' => $token1,
'data' => array ("message" => $message1)
 );

$fields = json_encode ( $fields );
$headers = array (
'Authorization: key='.$pay_key,
'Content-Type: application/json'
);
$ch = curl_init ();
curl_setopt ( $ch, CURLOPT_URL, $url );
curl_setopt ( $ch, CURLOPT_POST, true );
curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

$result = curl_exec ( $ch );
        ?>
        <script>alert('Notifications Sent Successfully!!');
        window.location = '../send-notification.php';</script>
        <?php
    }

?>
