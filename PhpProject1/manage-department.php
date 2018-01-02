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
<script>
function validateForminputdepartmentedit() {
    var x = document.forms["inputdepartment"]["input-department-departmentname-edit"].value;
    var y = document.forms["inputdepartment"]["input-department-password-edit"].value;
    var z = document.forms["inputdepartment"]["input-department-name-edit"].value;
    
    if (x == "") {
        alert("Please input departmentname!");
        return false;
    }
    
    else if (y == "") {
        if (confirm('The password field is empty. If you keep this empty, your password won`t be changed. Are you sure to continue?')) {
    return;  
        } else {
    return false;
        }
    }
    else if (z == "") {
        alert("Please input name!");
        return false;
    }
    
}

function validateForminputdepartmentadd() {
    var x = document.forms["inputdepartment"]["input-departmentname-add"].value;
    var y = document.forms["inputdepartment"]["input-department-password-add"].value;
    var z = document.forms["inputdepartment"]["input-department-name-add"].value;
    
    if (x == "") {
        alert("Please input department name!");
        return false;
    }
    
    else if (y == "") {
        alert("Please input password!");
        return false;
    }
    else if (z == "") {
        alert("Please input name!");
        return false;
    }
    
}



function validateForminputdepartmentdelete() {
    if (confirm('Are you sure want to delete this department?')) {
    return;  
        } else {
    return false;
        }
    }

function showhideselectdepartment(){
    var a = document.forms["inputdepartment"]["input-department-type"].value;

    if(a == "type" or a == "normative"){
        document.getElementById("trsug").style.display = "none";
        document.getElementById("trsud").style.display = "none"; 
        document.getElementById("trsuc").style.display = "none"; 
        document.getElementById("trsug1").value = "" ; 
        document.getElementById("trsud1").value = "" ; 
        document.getElementById("trsuc1").value = "" ;
    }
    else if(a == "productive"){
        document.getElementById("trsug").style.display = "table-row";
        document.getElementById("trsud").style.display = "table-row"; 
        document.getElementById("trsuc").style.display = "table-row"; 
    } 
}

</script>
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
		<br>
		<center><h1>Manage Department</h1></center><br><br>
		<div class="content-1">
        <script type="text/javascript">
        function validateFormfinddepartment() {
    var inputdepartmentname = document.forms["finddepartment"]["input-department-name"].value;
    var inputdepartmenttype = document.forms["finddepartment"]["input-action"].value;
    
    if (inputdepartmentname == "") {
        alert("Please input department name!");
        return false;
    }
    
    else if (inputdepartmenttype == "action") {
        alert("Please select an action!");
        return false;
    }
    else if (inputdepartmentname != "" && inputdepartmenttype =="add") {
        $.post("find-department-process.php", {departmentnamefind:inputdepartmentname, departmenttypefind:inputdepartmenttype},function(result){
            if(result == "exist"){

                document.getElementById('forminputdepartmentadd').reset();
                document.getElementById('forminputdepartmentedit').reset();
                document.getElementById('forminputdepartmentdelete').reset();
                document.getElementById('forminputdepartmentadd').style.display = 'none';
                document.getElementById('forminputdepartmentdelete').style.display = 'none';
                document.getElementById('forminputdepartmentedit').style.display = 'none';
                alert("department name already exist!");
                return false;
            }
            else if(result == "ok"){


        document.getElementById('forminputdepartmentedit').reset();
        document.getElementById('forminputdepartmentadd').reset();
        document.getElementById('forminputdepartmentdelete').reset();
        document.getElementById('forminputdepartmentedit').style.display = 'none';
        document.getElementById('forminputdepartmentdelete').style.display = 'none';
        document.getElementById('forminputdepartmentadd').style.display = 'none';

        document.getElementById('forminputdepartmentadd').style.display = 'inherit';
        document.forms["inputdepartmentadd"]["input-departmentname-add"].value = inputdepartmentname;

        return false;
            }
            else {
                alert(result);
            }
        });
        return false;
    }

    else if (inputdepartmentname != "" && inputdepartmenttype =="edit") {
        

        $.post("find-department-process.php", {departmentnamefind:inputdepartmentname, departmenttypefind:inputdepartmenttype},function(result){
            if(result=="nodepartment"){

                document.getElementById('forminputdepartmentadd').reset();
                document.getElementById('forminputdepartmentedit').reset();
                document.getElementById('forminputdepartmentdelete').reset();
                document.getElementById('forminputdepartmentadd').style.display = 'none';
                document.getElementById('forminputdepartmentdelete').style.display = 'none';
                document.getElementById('forminputdepartmentedit').style.display = 'none';


                alert("department doesn't exist!");
                return false;
            }
            else if(result!="nodepartment"){
                var obj = JSON.parse(result);
                document.getElementById('forminputdepartmentadd').reset();
                document.getElementById('forminputdepartmentedit').reset();
                document.getElementById('forminputdepartmentdelete').reset();
                document.getElementById('forminputdepartmentadd').style.display = 'none';
                document.getElementById('forminputdepartmentdelete').style.display = 'none';
                document.getElementById('forminputdepartmentedit').style.display = 'none';
               
                document.getElementById('forminputdepartmentedit').style.display = 'inherit';
            
                document.getElementById('denedit').value = obj.departmentnameedit;
            

            }
                return false;
            });
        }

        else if (inputdepartmentname != "" && inputdepartmenttype =="delete") {
        

        $.post("find-department-process.php", {departmentnamefind:inputdepartmentname, departmenttypefind:inputdepartmenttype},function(result){
            if(result=="nodepartment"){

                document.getElementById('forminputdepartmentadd').reset();
                document.getElementById('forminputdepartmentedit').reset();
                document.getElementById('forminputdepartmentdelete').reset();
                document.getElementById('forminputdepartmentadd').style.display = 'none';
                document.getElementById('forminputdepartmentdelete').style.display = 'none';
                document.getElementById('forminputdepartmentedit').style.display = 'none';


                alert("department doesn't exist!");
                return false;
            }
            else if(result!="nodepartment"){
                var obj = JSON.parse(result);
                document.getElementById('forminputdepartmentadd').reset();
                document.getElementById('forminputdepartmentedit').reset();
                document.getElementById('forminputdepartmentdelete').reset();
                document.getElementById('forminputdepartmentadd').style.display = 'none';
                document.getElementById('forminputdepartmentedit').style.display = 'none';
                document.getElementById('forminputdepartmentdelete').style.display = 'none';
                
                document.getElementById('forminputdepartmentdelete').style.display = 'inherit';
                
                document.getElementById('dendelete').value = obj.departmentnamedelete;
            

            }
                return false;
            });
        }
        return false;
        }
        
        </script>
			<form method="post" name="finddepartment" onsubmit="return validateFormfinddepartment()">
			<div class="content-1-left">
			<select name="input-action" class="input-select" style="float: left;">
		  <option value="action">--Select Action--</option>
		  <option value="add">Add department</option>
		  <option value="edit">Edit department</option>
		  <option value="delete">Delete department</option>
		  </select>
			<br>
			<br>
                        <br> 

			</div>
			<div class="content-1-right">
                        <input type="text" name="input-department-name" class="input-text" placeholder="department Name" style="float: right; text-transform:capitalize;" autocomplete="off"><br><br>
			<br><input type="submit" class="submit-button" name="submit-find-department" value="Go" style="float: right;" >                        
                        <br></div>
                        </form>	


<!-- form add department -->
            <form method="post" action="manage-department-process.php" name="inputdepartmentadd" onsubmit="return validateForminputdepartmentadd()" style="display:none;" id="forminputdepartmentadd">
        <div class="content-1">
        <br>&nbsp;<br>
			<table width="100%" style="margin-top: 50px;">
  <tbody>
  <tr>
  <td>Department Name</td>
  <td><input type="text" name="input-departmentname-add" class="input-text" placeholder="departmentname" style="float: right;text-transform: capitalize;" disabled></td>
</tr>
	<tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit-add-department" class="submit-button" value="Add" style="float: right; margin-top:15px;"></td>
    </tr>
  </tbody>
</table>
		
		</div>
		</form>	

<!-- form edit department -->

<form method="post" action="manage-department-process.php" name="inputdepartmentedit" onsubmit="return validateForminputdepartmentedit()" style="display:none;" id="forminputdepartmentedit">
<div class="content-1">
<br>&nbsp;<br>
    <table width="100%" style="margin-top: 50px;">
<tbody>
<tr>
<td>Department Name</td>
<td><input type="text" name="input-departmentname-edit" class="input-text" placeholder="departmentname" style="float: right;text-transform: capitalize;" id="denedit"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" name="submit-edit-department" class="submit-button" value="Edit" style="float: right; margin-top:15px;"></td>
</tr>
</tbody>
</table>

</div>
</form>	

<!-- form delete department -->

<form method="post" action="manage-department-process.php" name="inputdepartment" onsubmit="return validateForminputdepartmentadd()" style="display:none;" id="forminputdepartmentdelete">
        <div class="content-1">
        <br>&nbsp;<br>
			<table width="100%" style="margin-top: 50px;">
  <tbody>
  <tr>
  <td>Department Name</td>
  <td><input type="text" name="input-department-departmentname-delete" id="dendelete" class="input-text" placeholder="departmentname" style="float: right;text-transform: capitalize;" disabled></td>
</tr>
	<tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit-delete-department" class="submit-button" value="Delete" style="float: right; margin-top:15px;"></td>
    </tr>
  </tbody>
</table>
		
		</div>
		</form>	
	
            
    
		
		</div><br>
	</div>
    <script type="text/javascript">
function departmentaddedsuccess() {
    alert("Department successfully added!");
    window.location.href = "manage-department.php";
    return false;
}

function departmentaddedfailed() {
    alert("Failed to add department!");
    window.location.href = "manage-department.php";
    return false;
}

function departmenteditsuccess() {
    alert("Department successfully edited!");
    window.location.href = "manage-department.php";
    return false;
}

function departmenteditfailed() {
    alert("Failed to edit department!");
    window.location.href = "manage-department.php";
    return false;
}

function departmentdeletesuccess() {
    alert("Department successfully deleted!");
    window.location.href = "manage-department.php";
    return false;
}

function departmentdeletefailed() {
    alert("Failed to delete department!");
    window.location.href = "manage-department.php";
    return false;
}</script>
    <?php 
				if(isset($_GET["noaction"])){
				echo "Please select an action!";
				}
				else if(isset($_GET["addsuccess"])){
				echo '<script type="text/javascript">',
                                                     'departmentaddedsuccess();',
                                                    '</script>';
                                                    
				}
				else if(isset($_GET["addfailed"])){
				echo '<script type="text/javascript">',
                                                     'departmentaddedfailed();',
                                                    '</script>';
                                }
                                else if(isset($_GET["editsuccess"])){
				echo '<script type="text/javascript">',
                                                     'departmenteditsuccess();',
                                                    '</script>';
				}
				else if(isset($_GET["editfailed"])){
				echo '<script type="text/javascript">',
                                                     'departmenteditfailed();',
                                                    '</script>';
                                }
                                
                                else if(isset($_GET["deletesuccess"])){
				echo '<script type="text/javascript">',
                                                     'departmentdeletesuccess();',
                                                    '</script>';
				}
				else if(isset($_GET["deletefailed"])){
				echo '<script type="text/javascript">',
                                                     'departmentdeletefailed();',
                                                    '</script>';
                                }
                                
                                else if(isset($_GET["nodepartmentname"])){
				echo "Please input department name!";
                                }
			?>
</body>
</html>
