<?php
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../assets/style/style.css" rel="stylesheet" type="text/css">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css"> -->
<link rel="stylesheet" type="text/css" href="../../assets/datatables/datatables.min.css"/>
 
<script type="text/javascript" src="../../assets/datatables/datatables.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css"/>
 
<script type="text/javascript" src="assets/datatables/datatables.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "admin/department/departmentdatatables-process.php"
    } );
} );
</script>
<title></title>
<table id="example" class="display" cellspacing="0" width="100%" style="text-transform: capitalize;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
        </thead>
    </table>