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
$table = 'wallet_history';
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
	array( 'db' => 'remark', 'dt' => 2 ),
	array( 'db' => 'date', 'dt' => 3 ),
	array( 'db' => 'time', 'dt' => 4 )
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
$where="amount > 0 AND phone_number=$username";
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
