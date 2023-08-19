<?php include('../dashboard/config.php');

    $user = $_REQUEST['phone_number'];
    $password = $_REQUEST['password'];
    $token_id=$_REQUEST['token_id'];

    $select = mysqli_query($con,"SELECT * FROM user_info WHERE phone = '$user'");

    if(mysqli_num_rows($select) > 0){
        $check_pass = mysqli_query($con,"SELECT * FROM user_info WHERE phone = '$user' AND (password = '$password')");
        if(mysqli_num_rows($check_pass) > 0){
            $check_status=mysqli_query($con,"SELECT * FROM user_info WHERE phone = '$user' AND (password = '$password') ");
            if(mysqli_num_rows($check_status)>0){
                $check_token = mysqli_query($con,"SELECT * FROM device_token WHERE mobile = '$user'");
                if(mysqli_num_rows($check_token)>0){
                    $update = mysqli_query($con,"UPDATE device_token SET token_id = '$token_id' WHERE mobile = '$user'");
                }else{
                    $insert_token = mysqli_query($con,"INSERT INTO device_token (mobile,token_id,status) VALUES ('$user','$token_id','1')");
                }
            $check = mysqli_fetch_array($select);
            $mobile = $check['phone'];
            $data = array(
                'phone_number' => $mobile,
                'name' => $check['name'],
                'email' => $check['email'],
				'm_pin' => $check['m_pin'],
                'wallet' => $check['wallet'],
                'status' => $check['status'],
                'phonepay' => $check['phonepay'],
                'googlepay' => $check['googlepay'],
                'paytm' => $check['paytm']
            );
            $result = array(
                'success' => '1',
                'data' => $data
            );}else{
                $data = array(
                'msg' => 'Contact Admin to Activate your Account!'
            );
            $result = array(
                'success' => '0',
                'data' => $data
            );
            }
        }else{
            $data = array(
                'msg' => 'Wrong Password!'
            );
            $result = array(
                'success' => '0',
                'data' => $data
            );
        }
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