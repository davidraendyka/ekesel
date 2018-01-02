<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "test";

// $conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
// /* check connection */
// if (mysqli_connect_errno()) {
//     printf("Connect failed: %s\n", mysqli_connect_error());
//     exit();
// } 

include "connect.php";
  
$limit = 5;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  

// $sql = "SELECT * FROM adminacc ORDER BY idadmin ASC LIMIT $start_from, $limit";  
// $rs_result = mysqli_query($conn, $sql);  

// $rs_result = mysqli_prepare($conn, 'Call select_adminaccountoverview(?, ?)');
// $rs_result->bind_param('ii', $start_from, $limit);
// $rs_result->execute();

$conn->query("SET @start_from =  "."'" . $start_from . "'"." , @limit = "."'". $limit . "'"."");
$rs_result = $conn->query("CALL select_adminaccountoverview(@start_from, @limit)");

?> 

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="assets/style/style.css" rel="stylesheet" type="text/css">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css"> -->
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css"/>
 
<script type="text/javascript" src="assets/datatables/datatables.min.js"></script>
<link rel="stylesheet" href="dist/simplePagination.css" />
<script src="dist/jquery.simplePagination.js"></script>
<title></title>
<script>
</script>
</head>
<body>
<div class="container" style="padding-top:20px;">
<table class="tbladminoverview">  
<thead>  
<tr>  
<th>ID</th>  
<th>Name</th>
<th>Username</th>  
</tr>  
</thead>  
<tbody>  
<?php  
while ($row = mysqli_fetch_assoc($rs_result)) {
?>  
            <tr>  
            <td><?php echo $row['idadmin']; ?></td>  
            <td style="text-transform: capitalize;"><?php echo $row['namaadmin']; ?></td>  
			<td><?php echo $row['usernameadmin']; ?></td>  
            </tr>  
<?php  
};  
?>  
</tbody>  
</table>
  <br>
<?php  
include "connect.php";
//$sql = "SELECT COUNT(idadmin) FROM adminacc";  
//$rs_result = mysqli_query($conn, $sql);
$rs_result = $conn->query("CALL count_totaladminaccount");  
$row = mysqli_fetch_row($rs_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);  
$pagLink = "<nav><ul class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) {  
             $pagLink .= "<li><a href='index.php?page=".$i."'>".$i."</a></li>";  
};  
echo $pagLink . "</ul></nav>";  
?>
</div>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
$('.pagination').pagination({
        items: <?php echo $total_records;?>,
        itemsOnPage: <?php echo $limit;?>,
        cssStyle: 'dark-theme',
		currentPage : <?php echo $page;?>,
		hrefTextPrefix : 'adminaccount.php?page='
    });
	});
</script>