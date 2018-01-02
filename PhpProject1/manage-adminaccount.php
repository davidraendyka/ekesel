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
      <li><a href="adminaccount.php">Overview</a></td>
      <li><a href="manage-adminaccount.php">Manage Account</a></td>
		</ul>
	</div>
	<div class="content-layer">
		<br>
		<center><h1>Manage Administrator Account</h1></center><br><br>
		<div class="content-1">
        <script type="text/javascript">
        function validateFormfindaccount() {
    var inputadminaccountname = document.forms["findaccount"]["input-admin-account-username"].value;
    var inputadminaccounttype = document.forms["findaccount"]["input-action"].value;
    
    if (inputadminaccountname == "") {
        alert("Please input administrator name!");
        return false;
    }
    
    else if (inputadminaccounttype == "action") {
        alert("Please select an action!");
        return false;
    }
    else if (inputadminaccounttype == "add" &&  inputadminaccountname != ""){
        $.post("find-adminaccount-process.php", {inputadminaccountname:inputadminaccountname, inputadminaccounttype:inputadminaccounttype},function(result){
            if(result == "ok"){
            document.getElementById('forminputadminaccountedit').reset();
            document.getElementById('forminputadminaccountdelete').reset();
            document.getElementById('forminputadminaccountedit').reset();
            document.getElementById('forminputadminaccountedit').style.display = 'none';
            document.getElementById('forminputadminaccountdelete').style.display = 'none';

            document.getElementById('forminputadminaccountadd').style.display = 'none';
            document.getElementById('forminputadminaccountadd').style.display = 'inherit';
            document.forms["inputaccountadd"]["input-admin-account-username-add"].value = inputadminaccountname;
        }
        else if(result == "exist"){
            document.getElementById('forminputadminaccountadd').style.display = 'none';
            
            document.getElementById('forminputadminaccountedit').style.display = 'none';
            document.getElementById('forminputadminaccountdelete').style.display = 'none';
            alert("Administrator account already exist!");
        }
        else{
            alert(result);
        }
        });
        return false;

    }


    else if (inputadminaccounttype == "edit" &&  inputadminaccountname != ""){
        $.post("find-adminaccount-process.php", {inputadminaccountname:inputadminaccountname, inputadminaccounttype:inputadminaccounttype},function(result){
            if(result != "noaccount"){
                var obj = JSON.parse(result);
                // alert(obj.usernameadminedit);
            document.getElementById('forminputadminaccountadd').reset();
            document.getElementById('forminputadminaccountdelete').reset();
            document.getElementById('forminputadminaccountedit').reset();
            document.getElementById('forminputadminaccountadd').style.display = 'none';
            document.getElementById('forminputadminaccountdelete').style.display = 'none';

            document.getElementById('forminputadminaccountedit').style.display = 'none';
            document.getElementById('forminputadminaccountedit').style.display = 'inherit';

            document.getElementById('unedit').value = obj.usernameadminedit;
            document.getElementById('naedit').value = obj.nameedit;
            
        }
        else if(result == "noaccount"){
            document.getElementById('forminputadminaccountadd').style.display = 'none';
            
            document.getElementById('forminputadminaccountedit').style.display = 'none';
            document.getElementById('forminputadminaccountdelete').style.display = 'none';
            alert("Administrator account not found!");
        }
        else{
            alert(result);
        }
        });
        return false;
    }

    else if (inputadminaccounttype == "delete" &&  inputadminaccountname != ""){
        $.post("find-adminaccount-process.php", {inputadminaccountname:inputadminaccountname, inputadminaccounttype:inputadminaccounttype},function(result){
            if(result != "noaccount"){
                var obj = JSON.parse(result);
                // alert(obj.usernameadminedit);
            document.getElementById('forminputadminaccountadd').reset();
            document.getElementById('forminputadminaccountedit').reset();
            document.getElementById('forminputadminaccountdelete').reset();
            document.getElementById('forminputadminaccountadd').style.display = 'none';
            document.getElementById('forminputadminaccountedit').style.display = 'none';
            
            document.getElementById('forminputadminaccountdelete').style.display = 'none';
            document.getElementById('forminputadminaccountdelete').style.display = 'inherit';

            document.getElementById('undelete').value = obj.usernameadmindelete;
            document.getElementById('nadelete').value = obj.namedelete;
            
        }
        else if(result == "noaccount"){
            document.getElementById('forminputadminaccountadd').style.display = 'none';

            document.getElementById('forminputadminaccountedit').style.display = 'none';
            document.getElementById('forminputadminaccountdelete').style.display = 'none';
            alert("Administrator account not found!");
        }
        else{
            alert(result);
        }
        });
        return false;
    }
        }
        </script>
			<form method="post" name="findaccount" onsubmit="return validateFormfindaccount()">
			<div class="content-1-left">
			<select name="input-action" class="input-select" style="float: left;">
		  <option value="action">--Select Action--</option>
		  <option value="add">Add Account</option>
		  <option value="edit">Edit Account</option>
		  <option value="delete">Delete Account</option>
		  </select>
			<br>
			<br>
                        <br> 
			
			</div>
			<div class="content-1-right">
                        <input type="text" name="input-admin-account-username" class="input-text" placeholder="Username" style="float: right;"><br><br>
			<br><input type="submit" class="submit-button" name="submit-find-account" value="Go" style="float: right;" id="submit-find-account">                        
                        <br></div>
			</form>	


<!-- form add adminaccount            		 -->
<form method="post" action="manage-adminaccount-process.php" name="inputaccountadd" onsubmit="return validateForminputaccountadd()" style="display: none;" id="forminputadminaccountadd">
        <div class="content-1">
        <br>&nbsp;<br>
        <table width="100%" style="margin-top: 50px;">
  <tbody>
    <tr>
      <td>Username</td>
      <td><input type="text" name="input-admin-account-username-add" class="input-text" placeholder="Username" style="float: right;" disabled ></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="password" name="input-admin-account-password-add" class="input-text" placeholder="Password" style="float: right;"></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><input type="text" name="input-admin-account-name-add" class="input-text" placeholder="Name" style="float: right; text-transform: capitalize;"></td>
    </tr>
	<tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit-add-admin-account" class="submit-button" value="Add" style="float: right; margin-top:15px;"></td>
    </tr>
  </tbody>
</table>
		
		</div>
		</form>


<!-- form edit admin account -->

<form method="post" action="manage-adminaccount-process.php" name="inputaccountedit" onsubmit="return validateForminputaccountedit()" id="forminputadminaccountedit" style="display:none;">
			<div class="content-1">
				<table width="100%">
		<tbody>
			<tr>
				<td>Username</td>
				<td><input type="text" id="unedit"name="input-admin-account-username-edit" class="input-text" placeholder="Username" style="float: right;" ></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="input-admin-account-password-edit" class="input-text" placeholder="Click to change password" style="float: right;"></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="text" id="naedit"name="input-admin-account-name-edit" class="input-text" placeholder="Name" style="float: right; text-transform: capitalize;"></td>
			</tr>
		<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="submit-edit-admin-account" class="submit-button" value="Edit" style="float: right; margin-top:15px;"></td>
			</tr>
		</tbody>
	</table>
			
			</div>
			</form>


<!-- form delete admin account -->

<form method="post" action="manage-adminaccount-process.php" name="inputaccountdelete" onsubmit="return validateForminputaccountdelete()" style="display:none;" id="forminputadminaccountdelete">
			<div class="content-1">
				<table width="100%">
		<tbody>
			<tr>
				<td>Username</td>
				<td><input type="text" name="input-admin-account-username-edit" class="input-text" placeholder="Username" style="float: right;" id="undelete" disabled></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="input-admin-account-password-edit" class="input-text" placeholder="*****" style="float: right;" disabled></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="text" name="input-admin-account-name-edit" class="input-text" placeholder="Name" style="float: right; text-transform: capitalize;" id="nadelete" disabled></td>
			</tr>
		<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="submit-delete-admin-account" class="submit-button" value="Delete" style="float: right; margin-top:15px;"></td>
			</tr>
		</tbody>
	</table>
			
			</div>
			</form>


    
		
		</div><br>
	</div>
</body>
<script type="text/javascript">
function adminaccountaddedsuccess() {
    alert("administrator account successfully added!");
    window.location.href = "manage-adminaccount.php";
    return false;
}

function adminaccountaddedfailed() {
    alert("Failed to add administrator account!");
    window.location.href = "manage-adminaccount.php";
    return false;
}

function adminaccounteditsuccess() {
    alert("Administrator account successfully edited!");
    window.location.href = "manage-adminaccount.php";
    return false;
}

function adminaccounteditfailed() {
    alert("Failed to edit administrator account!");
    window.location.href = "manage-adminaccount.php";
    return false;
}

function adminaccountdeletesuccess() {
    alert("Administrator account successfully deleted!");
    window.location.href = "manage-adminaccount.php";
    return false;
}

function adminaccountdeletefailed() {
    alert("Failed to delete administrator account!");
    window.location.href = "manage-adminaccount.php";
    return false;
}</script>

<?php 

				if(isset($_GET["addsuccess"])){
				echo '<script type="text/javascript">',
                                                     'adminaccountaddedsuccess();',
                                                    '</script>';
                                                    
				}
				else if(isset($_GET["addfailed"])){
				echo '<script type="text/javascript">',
                                                     'adminaccountaddedfailed();',
                                                    '</script>';
                                }
                                else if(isset($_GET["editsuccess"])){
				echo '<script type="text/javascript">',
                                                     'adminaccounteditsuccess();',
                                                    '</script>';
				}
				else if(isset($_GET["editfailed"])){
				echo '<script type="text/javascript">',
                                                     'adminaccounteditfailed();',
                                                    '</script>';
                                }
                                
                                else if(isset($_GET["deletesuccess"])){
				echo '<script type="text/javascript">',
                                                     'adminaccountdeletesuccess();',
                                                    '</script>';
				}
				else if(isset($_GET["deletefailed"])){
				echo '<script type="text/javascript">',
                                                     'adminaccountdeletefailed();',
                                                    '</script>';
                                }
                                
                                else if(isset($_GET["noadminaccountname"])){
				echo "Please input adminaccount name!";
                                }
			?>
</html>
