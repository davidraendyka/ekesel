<?php
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
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
$table = 'subjectlist';
 
// Table's primary key
$primaryKey = 'idsubject';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'idsubject', 'dt' => 0 ),
    array( 'db' => 'subjectname',  'dt' => 1 ),
    array( 'db' => 'subjecttype',   'dt' => 2 ),
    array( 'db' => 'subjectgrade',   'dt' => 3 ),
    array( 'db' => 'subjectdepartment',   'dt' => 4 )

);
 
// SQL server connection information
$sql_details = array(
    'user' => 'ekesel',
    'pass' => 'm41n@i13',
    'db'   => 'ekesel',
    'host' => 'localhost'
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
//require( 'ssp.class.php' );

$include_dirs = array(
	realpath('ssp.class.php'),
    'admin/subject/ssp.class.php',
    '/admin/subject/ssp.class.php',
    '../admin/subject/ssp.class.php',
    '../../admin/subject/ssp.class.php',
    '../../../admin/subject/ssp.class.php',
    'subject/ssp.class.php',
    '/subject/ssp.class.php',
    '../subject/ssp.class.php',
    '../../subject/ssp.class.php',
    '../../../subject/ssp.class.php',
	'../ssp.class.php'
);
foreach ($include_dirs as $include_path) {
	if (@file_exists($include_path)) {
		require($include_path);
		break;
	}
}

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);