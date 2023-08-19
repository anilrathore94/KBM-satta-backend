<?php include('../dashboard/config.php');

$name = $_POST['name'];
$phone = $_POST['phone'];
$enquiry = $_POST['enquiry'];
$date=date('Y-m-d h:i:s A');


    $insert = mysqli_query($con,"INSERT INTO `user_query`(`username`, `mobile`,  `query`, `date`, `status`) VALUES ('$name','$phone','$enquiry','$date','1')");

if($insert){
   $result = array(
        'success' => '1',
        'msg' => 'Enquiry Submitted!'
        );
}
else{
     $result = array(
        'success' => '0',
        'msg' => 'Some Error Occured! Try Again Later'
        );
     
}

echo json_encode($result);
?>