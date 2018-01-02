<?php
session_start();
include "./admin/admin-validation.php";
include "connect.php";
$results = array();
$selectdepartment = $conn->query("CALL select_departmentforoption()");
while($result = mysqli_fetch_array($selectdepartment)){
$results[] = $result;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<link href="assets/style/style.css" rel="stylesheet" type="text/css">
<title>e-KeSel - Subject</title>
<script src="assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/function.js" type="text/javascript"></script>
</head>
<script>

function validateForminputsubjectadd() {
    var x = document.forms["inputsubject"]["input-subjectname-add"].value;
    var y = document.forms["inputsubject"]["input-subject-password-add"].value;
    var z = document.forms["inputsubject"]["input-subject-name-add"].value;
    
    if (x == "") {
        alert("Please input subject name!");
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



function validateForminputsubjectdelete() {
    if (confirm('Are you sure want to delete this subject?')) {
    return;  
        } else {
    return false;
        }
    }

function showhideselectsubject(){
    var a = document.forms["inputsubject"]["input-subject-type"].value;

    if(a == "type" or a == "normative"){
        document.getElementById("trsug").style.display = "none";
        document.getElementById("trsud").style.display = "none"; 
        document.getElementById("trsug1").value = "" ; 
        document.getElementById("trsud1").value = "" ; 
    }
    else if(a == "productive"){
        document.getElementById("trsug").style.display = "table-row";
        document.getElementById("trsud").style.display = "table-row"; 

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
      <li><a href="subject.php">Overview</a></td>
      <li><a href="manage-subject.php">Manage subject</a></td>
		</ul>
	</div>
	<div class="content-layer">
		<br>
		<center><h1>Manage Subject</h1></center><br><br>
		<div class="content-1">
        <script type="text/javascript">
        function validateFormfindsubject() {
            document.getElementById('forminputsubjectadd').style.display = 'none';
            document.getElementById('forminputsubjectdelete').style.display = 'none';
            document.getElementById('forminputsubjectedit').style.display = 'none';
            document.getElementById("trsug").style.display = "none"; 
            document.getElementById("trsud").style.display = "none";
            document.getElementById("trsuge").style.display = "none"; 
            document.getElementById("trsude").style.display = "none";
            document.getElementById("trsugd").style.display = "none"; 
            document.getElementById("trsudd").style.display = "none";
    var inputsubjectname = document.forms["findsubject"]["input-subject-name"].value;
    var inputsubjecttype = document.forms["findsubject"]["input-action"].value;
    
    if (inputsubjectname == "") {
        alert("Please input subject name!");
        return false;
    }
    
    else if (inputsubjecttype == "action") {
        alert("Please select an action!");
        return false;
    }
    else if (inputsubjectname != "" && inputsubjecttype =="add") {
        
        $.post("find-subject-process.php", {subjectnamefind:inputsubjectname, subjecttypefind:inputsubjecttype},function(result){
            if(result == "exist"){
                document.getElementById('forminputsubjectadd').reset();
                document.getElementById('forminputsubjectadd').reset();
                document.getElementById('forminputsubjectedit').reset();
                document.getElementById('forminputsubjectdelete').reset();
                document.getElementById('forminputsubjectadd').style.display = 'none';
                document.getElementById('forminputsubjectdelete').style.display = 'none';
                document.getElementById('forminputsubjectedit').style.display = 'none';
                alert("Subject name already exist!");
                return false;
            }
            else if(result == "ok"){


        document.getElementById('forminputsubjectedit').reset();
        
        document.getElementById('forminputsubjectdelete').reset();
        document.getElementById('forminputsubjectedit').style.display = 'none';
        document.getElementById('forminputsubjectdelete').style.display = 'none';
        document.getElementById('forminputsubjectadd').style.display = 'none';
        document.getElementById('forminputsubjectadd').reset();
        document.getElementById('forminputsubjectadd').style.display = 'inherit';
        document.forms["inputsubjectadd"]["input-subjectname-add"].value = inputsubjectname;

        return false;
            }
            else {
                alert(result);
            }
        });
        ;
    }

    else if (inputsubjectname != "" && inputsubjecttype =="edit") {
        

        $.post("find-subject-process.php", {subjectnamefind:inputsubjectname, subjecttypefind:inputsubjecttype},function(result){
            if(result=="nosubject"){

                document.getElementById('forminputsubjectadd').reset();
                document.getElementById('forminputsubjectedit').reset();
                document.getElementById('forminputsubjectdelete').reset();
                document.getElementById('forminputsubjectadd').style.display = 'none';
                document.getElementById('forminputsubjectdelete').style.display = 'none';
                document.getElementById('forminputsubjectedit').style.display = 'none';


                alert("Subject doesn't exist!");
                return false;
            }
            else if(result!="nosubject"){
                var obj = JSON.parse(result);
                document.getElementById('forminputsubjectadd').reset();
                document.getElementById('forminputsubjectedit').reset();
                document.getElementById('forminputsubjectdelete').reset();
                document.getElementById('forminputsubjectadd').style.display = 'none';
                document.getElementById('forminputsubjectdelete').style.display = 'none';
                document.getElementById('forminputsubjectedit').style.display = 'none';
               
                document.getElementById('forminputsubjectedit').style.display = 'inherit';
                
                document.getElementById('sunedit').value = obj.subjectnameedit;
                document.getElementById('sutedit').value = obj.subjecttypeedit;
                document.getElementById('trsug1e').value = obj.subjectgradeedit;
                document.getElementById('trsud1e').value = obj.subjectdepartmentedit;
            

            }
                return false;
            });
        }

        else if (inputsubjectname != "" && inputsubjecttype =="delete") {
        

        $.post("find-subject-process.php", {subjectnamefind:inputsubjectname, subjecttypefind:inputsubjecttype},function(result){
            if(result=="nosubject"){

                document.getElementById('forminputsubjectadd').reset();
                document.getElementById('forminputsubjectedit').reset();
                document.getElementById('forminputsubjectdelete').reset();
                document.getElementById('forminputsubjectadd').style.display = 'none';
                document.getElementById('forminputsubjectdelete').style.display = 'none';
                document.getElementById('forminputsubjectedit').style.display = 'none';


                alert("Subject doesn't exist!");
                return false;
            }
            else if(result!="nosubject"){
                var obj = JSON.parse(result);
                document.getElementById('forminputsubjectadd').reset();
                document.getElementById('forminputsubjectedit').reset();
                document.getElementById('forminputsubjectdelete').reset();
                document.getElementById('forminputsubjectadd').style.display = 'none';
                document.getElementById('forminputsubjectedit').style.display = 'none';
                document.getElementById('forminputsubjectdelete').style.display = 'none';
                
                document.getElementById('forminputsubjectdelete').style.display = 'inherit';
                
                document.getElementById('sundelete').value = obj.subjectnamedelete;
                document.getElementById('sutdelete').value = obj.subjecttypedelete;
                document.getElementById('trsug1d').value = obj.subjectgradedelete;
                document.getElementById('trsud1d').value = obj.subjectdepartmentdelete;
            

            }
                return false;
            });
        }
        return false;
        }
        
        </script>
			<form name="findsubject" onsubmit="return validateFormfindsubject()">
			<div class="content-1-left">
			<select name="input-action" class="input-select" style="float: left;">
		  <option value="action">--Select Action--</option>
		  <option value="add">Add Subject</option>
		  <option value="edit">Edit Subject</option>
		  <option value="delete">Delete Subject</option>
		  </select>
			<br>
			<br>
                        <br> 

			</div>
			<div class="content-1-right">
                        <input type="text" name="input-subject-name" class="input-text" placeholder="Subject Name" style="float: right; text-transform:capitalize;" autocomplete="off"><br><br>
			<br><input type="submit" class="submit-button" name="submit-find-subject" value="Go" style="float: right;" >                        
                        <br></div>
                        </form>	


<!-- form add subject -->
            <form method="post" action="manage-subject-process.php" name="inputsubjectadd" onsubmit="return validateForminputsubjectadd()" style="display:none;" id="forminputsubjectadd">
        <div class="content-1">
        <br>&nbsp;<br>
			<table width="100%" style="margin-top: 50px;">
  <tbody>
  <tr>
  <td>Subject Name</td>
  <td><input type="text" name="input-subjectname-add" class="input-text" placeholder="subjectname" style="float: right;text-transform: capitalize;" disabled></td>
</tr>
    <tr>
      <td>Subject Type</td>
      <td><select name="input-subject-type-add" class="input-select" style="float:right;" onchange='if(this.value == "productive"){ 
          document.getElementById("trsug").style.display = "table-row"; 
          document.getElementById("trsud").style.display = "table-row";
          document.getElementById("trsuc").style.display = "table-row"; 
          } 
          else{ 
          document.getElementById("trsug1").value = ""; 
          document.getElementById("trsud1").value = "";  
          document.getElementById("trsug").style.display = "none"; 
          document.getElementById("trsud").style.display = "none"; 
          }' >
      <option value="type">--Select Subject Type--</option>
      <option value="normative">Normative</option>
      <option value="productive">Productive</option>
      </select></td>
    </tr>
    
    <tr id="trsug" style="display: none;">
      <td>Subject Grade</td>
      <td><select name="input-subject-grade-add" class="input-select" style="float:right;" id="trsug1">
      <option value="">--Select Subject Grade--</option>
      <option value="10">X</option>
      <option value="11">XI</option>
      <option value="12">XII</option>
      </select></td>
    </tr>
    <tr id="trsud" style="display: none;">
      <td>Subject Department</td>
      <td><select name="input-subject-department-add" class="input-select" style="float:right; text-transform:capitalize;" id="trsud1">    
      <option value="">--Select Subject Department--</option>
      <?php
      
      
     foreach($results as $value1){
          echo "<option style='text-transform: capitalize;' value='".$value1['namedepartment']."'>".$value1['namedepartment']."</option>";
      }
      ?>
      <!-- <option value="">Dept 1</option>
      <option value="">Dept 2</option>
      <option value="">Dept 3</option> -->
      </select></td>
    </tr>
	<tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit-add-subject" class="submit-button" value="Add" style="float: right; margin-top:15px;"></td>
    </tr>
  </tbody>
</table>
		
		</div>
		</form>	

<!-- form edit subject -->

<form method="post" action="manage-subject-process.php" name="inputsubjectedit" onsubmit="return validateForminputsubjectedit()" style="display:none;" id="forminputsubjectedit">
<div class="content-1">
<br>&nbsp;<br>
    <table width="100%" style="margin-top: 50px;">
<tbody>
<tr>
<td>Subject Name</td>
<td><input type="text" name="input-subjectname-edit" class="input-text" placeholder="subjectname" style="float: right;text-transform: capitalize;" id="sunedit"></td>
</tr>
<tr>
<td>Subject Type</td>
<td><select name="input-subject-type-edit" class="input-select" style="float:right;" id="sutedit" onclick='if(this.value == "productive"){ 
  document.getElementById("trsuge").style.display = "table-row"; 
  document.getElementById("trsude").style.display = "table-row";
  } 
  else{ 
  document.getElementById("trsug1e").value = "" ; 
  document.getElementById("trsud1e").value = "" ;  
  document.getElementById("trsuge").style.display = "none"; 
  document.getElementById("trsude").style.display = "none"; 
    }'>
<option value="type">--Select Subject Type--</option>
<option value="normative">Normative</option>
<option value="productive">Productive</option>
</select></td>
</tr>

<tr id="trsuge" style="display: none;">
<td>Subject Grade</td>
<td><select name="input-subject-grade-edit" class="input-select" style="float:right;" id="trsug1e">
<option value="">--Select Subject Grade--</option>
<option value="10">X</option>
<option value="11">XI</option>
<option value="12">XII</option>
</select></td>
</tr>
<tr id="trsude" style="display: none;">
<td>Subject Department</td>
<td><select name="input-subject-department-edit" class="input-select" style="float:right; text-transform:capitalize;" id="trsud1e">
<option value="">--Select Subject Department--</option>
<?php
    foreach ($results as $value2){
    echo "<option style='text-transform: capitalize;' value='".$value2['namedepartment']."'>".$value2['namedepartment']."</option>";

      }
      ?>
<!-- <option value="">Dept 1</option>
<option value="">Dept 2</option>
<option value="">Dept 3</option> -->
</select></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" name="submit-edit-subject" class="submit-button" value="Edit" style="float: right; margin-top:15px;"></td>
</tr>
</tbody>
</table>

</div>
</form>	

<!-- form delete subject -->

<form method="post" action="manage-subject-process.php" name="inputsubject" onsubmit="return validateForminputsubjectadd()" style="display:none;" id="forminputsubjectdelete">
        <div class="content-1">
        <br>&nbsp;<br>
			<table width="100%" style="margin-top: 50px;">
  <tbody>
  <tr>
  <td>Subject Name</td>
  <td><input type="text" name="input-subject-subjectname-delete" id="sundelete" class="input-text" placeholder="subjectname" style="float: right;text-transform: capitalize;" disabled></td>
</tr>
    <tr>
      <td>Subject Type</td>
      <td><select name="input-subject-type" class="input-select" id="sutdelete" style="float:right;" disabled onclick='if(this.value == "productive"){ 
          document.getElementById("trsugd").style.display = "table-row"; 
          document.getElementById("trsudd").style.display = "table-row";

          } 
          else{ 
          document.getElementById("trsug1d").value = "" ; 
          document.getElementById("trsud1d").value = "" ; ; 
          document.getElementById("trsugd").style.display = "none"; 
          document.getElementById("trsudd").style.display = "none"; 
        }'>
      <option value="type">--Select Subject Type--</option>
      <option value="normative">Normative</option>
      <option value="productive">Productive</option>
      </select></td>
    </tr>
    
    <tr id="trsugd" style="display: none;">
      <td>Subject Grade</td>
      <td><select name="input-subject-grade" class="input-select" style="float:right;" id="trsug1d" disabled>
      <option value="">--Select Subject Grade--</option>
      <option value="10">X</option>
      <option value="11">XI</option>
      <option value="12">XII</option>
      </select></td>
    </tr>
    <tr id="trsudd" style="display: none;">
      <td>Subject Department</td>
      <td><select name="input-subject-department" class="input-select" style="float:right;" id="trsud1d" disabled>
      <option value="">--Select Subject Department--</option>
      <?php
    foreach ($results as $value3){
    echo "<option style='text-transform: capitalize;' value='".$value3['namedepartment']."'>".$value3['namedepartment']."</option>";

      }
      ?>
      <!-- <option value="">Dept 1</option>
      <option value="">Dept 2</option>
      <option value="">Dept 3</option> -->
      </select></td>
    </tr>
	<tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit-delete-subject" class="submit-button" value="Delete" style="float: right; margin-top:15px;"></td>
    </tr>
  </tbody>
</table>
		
		</div>
		</form>	
	
            
    
		
		</div><br>
	</div>
    <script type="text/javascript">
function subjectaddedsuccess() {
    alert("Subject successfully added!");
    window.location.href = "manage-subject.php";
    return false;
}

function subjectaddedfailed() {
    alert("Failed to add subject!");
    window.location.href = "manage-subject.php";
    return false;
}

function subjecteditsuccess() {
    alert("Subject successfully edited!");
    window.location.href = "manage-subject.php";
    return false;
}

function subjecteditfailed() {
    alert("Failed to edit subject!");
    window.location.href = "manage-subject.php";
    return false;
}

function subjectdeletesuccess() {
    alert("Subject successfully deleted!");
    window.location.href = "manage-subject.php";
    return false;
}

function subjectdeletefailed() {
    alert("Failed to delete subject!");
    window.location.href = "manage-subject.php";
    return false;
}</script>
    <?php 
				if(isset($_GET["noaction"])){
				echo "Please select an action!";
				}
				else if(isset($_GET["addsuccess"])){
				echo '<script type="text/javascript">',
                                                     'subjectaddedsuccess();',
                                                    '</script>';
                                                    
				}
				else if(isset($_GET["addfailed"])){
				echo '<script type="text/javascript">',
                                                     'subjectaddedfailed();',
                                                    '</script>';
                                }
                                else if(isset($_GET["editsuccess"])){
				echo '<script type="text/javascript">',
                                                     'subjecteditsuccess();',
                                                    '</script>';
				}
				else if(isset($_GET["editfailed"])){
				echo '<script type="text/javascript">',
                                                     'subjecteditfailed();',
                                                    '</script>';
                                }
                                
                                else if(isset($_GET["deletesuccess"])){
				echo '<script type="text/javascript">',
                                                     'subjectdeletesuccess();',
                                                    '</script>';
				}
				else if(isset($_GET["deletefailed"])){
				echo '<script type="text/javascript">',
                                                     'subjectdeletefailed();',
                                                    '</script>';
                                }
                                
                                else if(isset($_GET["nosubjectname"])){
				echo "Please input subject name!";
                                }
			?>
</body>
</html>
