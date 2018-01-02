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

</head>

<body>
	<div class="navbar">
	<?php
		include "admin/navbar.php";
	?>
	</div>
	<div class="menubar">
		<ul class="menubarul">
      <li><a href="teacheraccount.php">Overview</a></td>
      <li><a href="manage-teacheraccount.php">Manage Account</a></td>
		</ul>
	</div>
	<div class="content-layer">
		<br>
		<center><h1>Teacher Account Overview</h1></center>
		<br><br>
		<div class="accoverviewwrap">
		<?php
		include "admin/teacheraccount/teacheraccounttableoverview.php";
		?>
		</div>
</div>
</body>
</html>

