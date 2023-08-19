<?php include('../config.php'); 
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// DB table to use
$table = 'user_fund_request';
$username=$_REQUEST['user_id'];
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'id', 'dt' => 0 ),
	array( 'db' => 'amount', 'dt' => 1 ),
	array( 'db' => 'id', 'dt' => 2 ),
   /* array(
        'db'        => 'receipe_image',
        'dt'        => 3,
        'formatter' => function( $d, $row ) {
               if($d == "") { 
                   return  'Not Found'; 
               } else{ 
                  return $d ;
               }
        }
    ), */
	array( 'db' => 'date', 'dt' => 3 ),
	array(
        'db'        => 'status',
        'dt'        => 4,
        'formatter' => function( $d, $row ) {
               if($d == 1) { 
                   return  '<badge class="badge badge-success">Sent</badge>'; 
               } else if($d == -1){ 
                  return '<badge class="badge badge-danger">Cancelled</badge>';
               } else{
				   return '<badge class="badge badge-primary">Pending</badge>';
			   }
        }
    ),
    array(
        'db'        => 'status',
        'dt'        => 5,
        'formatter' => function( $d, $row ) {
			if(!$d=="0"){
			return '<button class="btn btn-success btn-xs accept" onclick="window.location.href = status/edit-fund-request.php?id='.$row['0'].'" "disabled"
			 id="accept">Approve</button><button class="btn btn-danger btn-xs reject" onclick="window.location.href = status/edit-fund-request.php?id='.$row['0'].'" "disabled" id="reject">Reject</button>';
        }else{
		    return '<button class="btn btn-success btn-xs accept" onclick="window.location.href = status/edit-fund-request.php?id='.$row['0'].'" id="accept">Approve</button><button class="btn btn-danger btn-xs reject" onclick="window.location.href = status/edit-fund-request.php?id='.$row['0'].'"  id="reject">Reject</button>';	
			
		}
    }	
    )
    );
 
// SQL server connection information
// $sql_details = array(
//     'user' => 'u299108802_RatanKhatri',
//     'pass' => 'u299108802_RatanKhatri',
//     'db'   => 'u299108802_RatanKhatri',
//     'host' => 'LOCALHOST'
// );
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );
$where="username = $username";
$result=SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns, null, $where);
 $start=$_REQUEST['start'];
    $idx=0;
    foreach($result['data'] as &$res){
        $res[0]=(string)$start + 1;
        $start++;
        $idx++;
    } 
echo json_encode($result);
?>
