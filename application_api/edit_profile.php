<?php 
    include('../dashboard/config.php');
    
    $phone = $_REQUEST['phone_number'];
    $phonepe = $_REQUEST['phonpe'];
    $googlepay = $_REQUEST['gpay'];
    $paytm = $_REQUEST['paytm'];
    
    $select = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user_info WHERE phone = '$phone'"));
    
    if($phonepe == ""){
        $phonepe = $select['phonepay'];
    }
    if($googlepay == ""){
        $googlepay = $select['googlepay'];
    }
    if($paytm == ""){
        $paytm = $select['paytm'];
    }
    
    $update = mysqli_query($con,"UPDATE user_info SET phonepay = '$phonepe', googlepay = '$googlepay', paytm = '$paytm' WHERE phone = '$phone'");
    
    if($update){
   $result = array(
        'success' => '1',
        'msg' => 'Profile Updated Successfully'
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