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

<title>e-KeSel - Administrator</title>
<script src="assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/function.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css"/>
 
<script type="text/javascript" src="assets/datatables/datatables.min.js"></script>

</head>

<body>
	<div class="navbar">
	<?php
		include "admin/navbar.php";
	?>
	</div>
	<div class="menubar">
		<ul class="menubarul">
      <li><a href="adminaccount.php">Overview</a></td>
      <li><a href="manage-adminaccount.php">Manage Account</a></td>
		</ul>
	</div>
	<div class="content-layer">
		<br>&nbsp;<br>
		<center><h1>Administrator Account Overview</h1></center>
		<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>
		<div class="accoverviewwrap">
		<?php
		require "admin/adminaccount/ssp.class.php";
		include "admin/adminaccount/adminaccountdatatables.php";

		?>
		</div>
</div>
</body>
</html>

