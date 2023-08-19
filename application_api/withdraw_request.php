<?php include('../dashboard/config.php');

$phone_number = $_REQUEST['phone_number'];
$points = $_REQUEST['amount'];
$remark = $_REQUEST['remark'];
$date = date('Y-m-d');

$limits = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM admin_settings"));

$min_limit = $limits['min_withdrawal'];
$max_limit = $limits['max_withdrawal'];

if($points <= $max_limit && $points >= $min_limit){
 
$sql = "INSERT INTO `user_withdraw_request`(`username`, `points`, `amount`,  `receipe_image`, `date`, `remark`, `status`) VALUES ('$phone_number','$points',' ','','$date','$remark','0')";

$check_pass = mysqli_query($con,"SELECT * FROM user_withdraw_request WHERE username = '$phone_number' AND (status = '0')");
        if(mysqli_num_rows($check_pass) > 0)
        {
        $result = array(
        'success' => '0',
        'msg' => 'Still pending your last request'
        );
        }
        else
        {
            $insert=mysqli_query($con, $sql);
if($insert){
   $result = array(
        'success' => '1',
        'msg' => 'Withdraw Request Added Successfully!!'
        );
}
else{
     $result = array(
        'success' => '0',
        'msg' => 'Some Error Occured! Try Again Later!!'
        );
     
}
        }




}else{
    $result = array(
        'success' => '0',
        'msg' => 'Limit does not match!! Minimum Limit is '.$min_limit.' & Maximum Limit is '.$max_limit
        );
}
echo json_encode($result);
?>