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
<title>e-KeSel - Teacher</title>
<script src="assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/function.js" type="text/javascript"></script>
</head>
<script>
    function validatenoteacheraccount() {
    alert("Teacher account not found!");
    return false;
}

function validateFormfindaccount() {
    var x = document.forms["findaccount"]["input-teacher-account-username"].value;
    var y = document.forms["findaccount"]["input-action"].value;
    
    if (x == "") {
        alert("Please input username!");
        return false;
    }
    
    else if (y == "action") {
        alert("Please select an action!");
        return false;
    }
    
    
}

function teacheraccountaddedsuccess() {
    alert("Teacher account successfully added!");
    window.location.href = "manage-teacheraccount.php";
    return false;
}

function teacheraccountaddedfailed() {
    alert("Failed to add teacher account!");
    window.location.href = "manage-teacheraccount.php";
    return false;
}

function teacheraccounteditsuccess() {
    alert("Teacher account successfully edited!");
    window.location.href = "manage-teacheraccount.php";
    return false;
}

function teacheraccounteditfailed() {
    alert("Failed to edit teacher account!");
    window.location.href = "manage-teacheraccount.php";
    return false;
}

function teacheraccountdeletesuccess() {
    alert("Teacher account successfully deleted!");
    window.location.href = "manage-teacheraccount.php";
    return false;
}

function teacheraccountdeletefailed() {
    alert("Failed to delete teacher account!");
    window.location.href = "manage-teacheraccount.php";
    return false;
}

function teacheraccountexist() {
    alert("Teacher account already exist!");
    window.location.href = "manage-teacheraccount.php";
    return false;
}



function validateForminputaccountedit() {
    var x = document.forms["inputaccount"]["input-teacher-account-username-edit"].value;
    var y = document.forms["inputaccount"]["input-teacher-account-password-edit"].value;
    var z = document.forms["inputaccount"]["input-teacher-account-name-edit"].value;
    
    if (x == "") {
        alert("Please input username!");
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

function validateForminputaccountadd() {
    var x = document.forms["inputaccount"]["input-teacher-account-username-edit"].value;
    var y = document.forms["inputaccount"]["input-teacher-account-password-edit"].value;
    var z = document.forms["inputaccount"]["input-teacher-account-name-edit"].value;
    
    if (x == "") {
        alert("Please input username!");
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



function validateForminputaccountdelete() {
    if (confirm('Are you sure want to delete this teacher account?')) {
    return;  
        } else {
    return false;
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
      <li><a href="teacheraccount.php">Overview</a></td>
      <li><a href="manage-teacheraccount.php">Manage Account</a></td>
		</ul>
	</div>
	<div class="content-layer">
		<br>
		<center><h1>Manage teacher Account</h1></center><br><br>
		<div class="content-1">
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
			<?php 
				if(isset($_GET["noaction"])){
				echo "Please select an action!";
				}
				else if(isset($_GET["addsuccess"])){
				echo '<script type="text/javascript">',
                                                     'teacheraccountaddedsuccess();',
                                                    '</script>';
                                                    header('location:manage-teacheraccount.php');
				}
				else if(isset($_GET["addfailed"])){
				echo '<script type="text/javascript">',
                                                     'teacheraccountaddedfailed();',
                                                    '</script>';
                                }
                                else if(isset($_GET["editsuccess"])){
				echo '<script type="text/javascript">',
                                                     'teacheraccounteditsuccess();',
                                                    '</script>';
				}
				else if(isset($_GET["editfailed"])){
				echo '<script type="text/javascript">',
                                                     'teacheraccounteditfailed();',
                                                    '</script>';
                                }
                                
                                else if(isset($_GET["deletesuccess"])){
				echo '<script type="text/javascript">',
                                                     'teacheraccountdeletesuccess();',
                                                    '</script>';
				}
				else if(isset($_GET["deletefailed"])){
				echo '<script type="text/javascript">',
                                                     'teacheraccountdeletefailed();',
                                                    '</script>';
                                }
                                
                                else if(isset($_GET["nousername"])){
				echo "Please input username!";
                                }
			?>
			</div>
			<div class="content-1-right">
                        <input type="text" name="input-teacher-account-username" class="input-text" placeholder="Username" style="float: right;"><br><br>
			<br><input type="submit" class="submit-button" name="submit-find-account" value="Go" style="float: right;">                        
                        <br></div>
			</form>			
			<?php 
			if(isset($_POST['submit-find-account'])){
                                
				$action = $_POST['input-action'];
				$usernameinput = $_POST['input-teacher-account-username'];
                                
                               
                                     
                                    
				if($action == "add" && $usernameinput != ""){
                                
                                $checkaccount = mysqli_prepare($conn, 'Call select_teacheraccountforedit(?, @usernameteacher, @nameteacher, @idteacher)');
                                $checkaccount->bind_param('s', $usernameinput);
				                $checkaccount->execute();
                                        
                                $selectedaccount = mysqli_query($conn, 'SELECT @usernameteacher');
                                $checkedaccount = mysqli_fetch_assoc($selectedaccount);
                                if($checkedaccount['@usernameteacher'] != ""){
                                    echo '<script type="text/javascript">',
                                                     'teacheraccountexist();',
                                                    '</script>';
                                }    
                                    
                                else {
				$_SESSION['teacherusername'] = $usernameinput;
				//header('location:manage-teacheraccount.php?addaccount');
                                
                                $teacherusername = $_SESSION['teacherusername'];
                                echo
		"
		<form method='post' action='manage-teacheraccount-process.php' name='inputaccount' onsubmit='return validateForminputaccountadd()'>
        <div class='content-1'>
        <br>&nbsp;<br>
        <table width='100%' style='margin-top: 50px;'>
  <tbody>
    <tr>
      <td>Username</td>
      <td><input type='text' name='input-teacher-account-username-edit' class='input-text' placeholder='Username' style='float: right;' value=".$teacherusername." disabled></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type='password' name='input-teacher-account-password-edit' class='input-text' placeholder='Password' style='float: right;'></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><input type='text' name='input-teacher-account-name-edit' class='input-text' placeholder='Name' style='float: right;'></td>
    </tr>
	<tr>
      <td>&nbsp;</td>
      <td><input type='submit' name='submit-add-teacher-account' class='submit-button' value='Add' style='float: right; margin-top:15px;'></td>
    </tr>
  </tbody>
</table>
		
		</div>
		</form>
		";
                                
                                
                                
				}
                                }
				else if($action == "edit" && $usernameinput != ""){
					$inputaccount = mysqli_prepare($conn, 'Call select_teacheraccountforedit(?, @usernameteacher, @nameteacher, @idteacher)');
					$inputaccount->bind_param('s', $usernameinput);
					$inputaccount->execute();
                                        
                                        $selectaccount = mysqli_query($conn, 'SELECT @usernameteacher, @nameteacher, @idteacher');
                                        $dataaccountedit = mysqli_fetch_assoc($selectaccount);
					//header('location:manage-teacheraccount.php?editaccount');
                                        
                                        
                                        $teacherusername = $dataaccountedit['@usernameteacher'];
                                        $teachername      = $dataaccountedit['@nameteacher'];
                                        
                                        if($teacherusername == ""){
                                            echo '<script type="text/javascript">',
                                                     'validatenoteacheraccount();',
                                                    '</script>';
;
                                        }
                                        else{
                                        
                        echo
			"
			<form method='post' action='manage-teacheraccount-process.php' name='inputaccount' onsubmit='return validateForminputaccountedit()'>
			<div class='content-1'>
				<table width='100%'>
		<tbody>
			<tr>
				<td>Username</td>
				<td><input type='text' name='input-teacher-account-username-edit' class='input-text' placeholder='Username' style='float: right;' value=".$teacherusername."></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type='password' name='input-teacher-account-password-edit' class='input-text' placeholder='Click to change password' style='float: right;'></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type='text' name='input-teacher-account-name-edit' class='input-text' placeholder='Name' style='float: right;' value=".$teachername."></td>
			</tr>
		<tr>
				<td>&nbsp;</td>
				<td><input type='submit' name='submit-edit-teacher-account' class='submit-button' value='Edit' style='float: right; margin-top:15px;'></td>
			</tr>
		</tbody>
	</table>
			
			</div>
			</form>
			";
                                        
                                        
                                        
                                        
				}
                                }
                                
                                else if($action == "delete" && $usernameinput != ""){
					$checkaccountdel = mysqli_prepare($conn, 'Call select_teacheraccountforedit(?, @usernameteacher, @nameteacher, @idteacher)');
					$checkaccountdel->bind_param('s', $usernameinput);
					$checkaccountdel->execute();
                                        
                                        $selectaccountdel = mysqli_query($conn, 'SELECT @usernameteacher, @nameteacher, @idteacher');
                                        $dataaccountdel = mysqli_fetch_assoc($selectaccountdel);
					//header('location:manage-teacheraccount.php?editaccount');
                                        
                                        
                                        
                                        $teacherusernamedel = $dataaccountdel['@usernameteacher'];
                                        $teachernamedel      = $dataaccountdel['@nameteacher'];
                                        $_SESSION['unameteacherdel'] = $dataaccountdel['@usernameteacher'];
                                        
                                        
                                        if($teacherusernamedel == ""){
                                            echo '<script type="text/javascript">',
                                                     'validatenoteacheraccount();',
                                                    '</script>';
                                        }
                                        else{
						echo
			"
			<form method='post' action='manage-teacheraccount-process.php' name='inputaccount' onsubmit='return validateForminputaccountdelete()'>
			<div class='content-1'>
				<table width='100%'>
		<tbody>
			<tr>
				<td>Username</td>
				<td><input type='text' name='input-teacher-account-username-edit' class='input-text' placeholder='Username' style='float: right;' value=".$teacherusernamedel." disabled></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type='password' name='input-teacher-account-password-edit' class='input-text' placeholder='*****' style='float: right;' disabled></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type='text' name='input-teacher-account-name-edit' class='input-text' placeholder='Name' style='float: right;' value=".$teachernamedel." disabled></td>
			</tr>
		<tr>
				<td>&nbsp;</td>
				<td><input type='submit' name='submit-delete-teacher-account' class='submit-button' value='Delete' style='float: right; margin-top:15px;'></td>
			</tr>
		</tbody>
	</table>
			
			</div>
			</form>
			";
                                        
			}
                                }
		}
		
                        ?>
    
		
		</div><br>
	</div>
</body>
</html>
