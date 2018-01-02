<?php
session_start();
include "./admin/admin-validation.php";
include "connect.php";
?> 
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<link href="assets/style/style.css" rel="stylesheet" type="text/css">

<title>e-KeSel - Department</title>
<script src="assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/function.js" type="text/javascript"></script>

</head>

<body>
	<div class="navbar">
	<?php
		include "admin/navbar.php";
	?>
	</div>
	<div class="menubar">
		<ul class="menubarul">
      <li><a href="department.php">Overview</a></td>
      <li><a href="manage-department.php">Manage Department</a></td>
		</ul>
	</div>
	<div class="content-layer">
	<br>&nbsp;<br>
		<center><h1>Department Overview</h1></center>
		<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>
		<div class="accoverviewwrap">
		<?php
		require "admin/department/ssp.class.php";
		include "admin/department/departmentdatatables.php";
		?>
		</div>
</div>
</body>
</html>

