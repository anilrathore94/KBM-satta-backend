<?php include('../dashboard/config.php');

    $user = $_REQUEST['phone_number'];

    $select = mysqli_query($con,"SELECT * FROM user_info WHERE phone = '$user'");

    if(mysqli_num_rows($select) > 0){
         $data = array(
                'msg' => 'User Found!'
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