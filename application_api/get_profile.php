<?php include('../dashboard/config.php');

    $user = $_REQUEST['phone_number'];

    $select = mysqli_query($con,"SELECT * FROM user_info WHERE phone = '$user'");

    if(mysqli_num_rows($select) > 0){
        
            $check = mysqli_fetch_array($select);
            $mobile = $check['phone'];
            $data = array(
                'phone_number' => $mobile,
                'name' => $check['name'],
                'email' => $check['email'],
                'wallet' => $check['wallet'],
                'phonepay' => $check['phonepay'],
                'googlepay' => $check['googlepay'],
                'paytm' => $check['paytm']
            );
            $result = array(
                'success' => '1',
                'data' => $data
            );
        
    }else{
        $data = array(
            'msg' => 'User Not Found!'
        );
        $result = array(
            'success' => '0',
            'data' => $data
        );
    }
    echo json_encode($result);
?>