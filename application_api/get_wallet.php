<?php include('../dashboard/config.php');

    $user = $_REQUEST['phone_number'];

    $select = mysqli_query($con,"SELECT * FROM user_info WHERE phone = '$user'");
    $select_num = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM contact_detail"));
    $select_upi = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM admin_settings"));

    if(mysqli_num_rows($select) > 0){
        
            $check = mysqli_fetch_array($select);
            $mobile = $check['phone'];
            $data = array(
                'phone_number' => $mobile,
                'wallet' => $check['wallet'],
                'status' => $check['status'],
                'start_time' => '01:00',
                'admin_mobile'=>$select_num['mobile'],
                'admin_wp' => $select_num['wp_mobile'],
                'upi_name' => 'Tinku Kumar Meena',
                'upi_payment_id' => $select_upi['upi_payment_id'],
                'upi_phone' => $select_upi['phonepepay_upi'],
                'upi_google' => $select_upi['gpay_upi'],
                'alert_message' => $select_upi['alert_message'],
                'how_to_play' => $select_upi['how_to_play'],
                'm_pin' => $check['m_pin'],
                'min_limit'=>$select_upi['min_bid_amt'],
                'max_limit'=>$select_upi['max_bid_amt'],
                'share_url'=>$select_upi['app_link'],
                'share_message'=>$select_upi['content'],
                'min_withdraw'=>$select_upi['withdraw_open_time'],
                'max_withdraw'=>$select_upi['withdraw_close_time'],
                'min_deposite'=>$select_upi['min_deposite'],
                'max_deposite'=>$select_upi['max_deposite']
            );
            $result = array(
                'success' => '1',
                'data' => $data
            );
        
    }else{
        $data = array(
            'admin_wp' => $select_num['wp_mobile'],
            'msg' => 'User Not Found!'
        );
        $result = array(
            'success' => '0',
            'data' => $data
        );
    }
    echo json_encode($result);
?>