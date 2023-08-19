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
$table = 'user_info';
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'id', 'dt' => 0 ),
    array(
        'db'        => 'name',
        'dt'        => 1,
        'formatter' => function( $d, $row ) {
            return '<a href="view-user.php?id='.$row['0'].'" class="mr-3 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Details">'.$d.'</a>';
        }
    ),
// array( 'db' => 'name', 'dt' => 1 ),
    array( 'db' => 'phone', 'dt' => 2 ),
    array( 'db' => 'email', 'dt' => 3 ),
    array( 'db' => 'date', 'dt' => 4 ),
    array( 'db' => 'wallet', 'dt' => 5 ),
        array(
        'db'        => 'betting_status',
        'dt'        => 6,
        'formatter' => function( $d, $row ) {
               if($d == 1) { 
                   return  '<span id="'.$row['0'].'b" class="badge badge-pill badge-soft-success font-size-12" onclick="betting_status('.$row['0'].')">Yes</span>'; 
               } else{ 
                  return '<span id="'.$row['0'].'b" class="badge badge-pill badge-soft-danger font-size-12" onclick="betting_status('.$row['0'].'>)">No</span>' ;
               }
        }
    ),
    array(
        'db'        => 'transfer_status',
        'dt'        => 7,
        'formatter' => function( $d, $row ) {
               if($d == 1) { 
                   return  '<span id="'.$row['0'].'t" class="badge badge-pill badge-soft-success font-size-12" onclick="transfer_status('.$row['0'].')">Yes</span>'; 
               } else{ 
                  return '<span id="'.$row['0'].'t" class="badge badge-pill badge-soft-danger font-size-12" onclick="transfer_status('.$row['0'].')">No</span>' ;
               }
        }
    ), 
    array(
        'db'        => 'status',
        'dt'        => 8,
        'formatter' => function( $d, $row ) {
               if($d == 1) { 
                   return  '<span id="'.$row['0'].'s" class="badge badge-pill badge-soft-success font-size-12" onclick="user_status('.$row['0'].')">Yes</span>'; 
               } else{ 
                  return '<span id="'.$row['0'].'>s" class="badge badge-pill badge-soft-danger font-size-12" onclick="user_status('.$row['0'].')">No</span>' ;
               }
        }
    ), 
    array(
        'db'        => 'id',
        'dt'        => 9,
        'formatter' => function( $d, $row ) {
            return '<a href="view-user.php?id='.$row['0'].'"><span class="badge badge-rounded badge-outline-primary"><i class="mdi mdi-eye font-size-18"></i></span></a>';
        }
    )
   // array( 'db' => 'status', 'dt' => 9 )
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
$result=SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns );
 $start=$_REQUEST['start'];
    $idx=0;
    foreach($result['data'] as &$res){
        $res[0]=(string)$start + 1;
        $start++;
        $idx++;
    } 
echo json_encode($result);
?>
