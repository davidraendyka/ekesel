<?php 
session_start();
$subjectnamefind        = strtolower($_POST['subjectnamefind']);
$subjecttypefind        = $_POST['subjecttypefind'];

include "connect.php";
                                
                               
                                     
                                    
			if($subjecttypefind == "add" && $subjectnamefind != ""){
                                
                                $checksubject = mysqli_prepare($conn, 'Call select_subjectforedit(?, @idsubjectfind, @typesubjectfind, @gradesubjectfind, @departmentsubjectfind, @namesubjectfind)');
                                $checksubject->bind_param('s', $subjectnamefind);
				                $checksubject->execute();
                                        
                                $selectedsubject = mysqli_query($conn, 'SELECT @idsubjectfind');
                                $checkedsubject = mysqli_fetch_assoc($selectedsubject);
                                if($checkedsubject['@idsubjectfind'] != ""){
                                    echo "exist";
                                }    
                                else if ($checkedsubject['@idsubjectfind'] == "") {
                                        $_SESSION['subjectnamefind'] = $subjectnamefind;
                                        echo "ok";
				// }
                                }
                                else {
                                        echo "error";
                                }
                        }
                        else if($subjecttypefind == "edit" && $subjectnamefind != ""){
                                $_SESSION['subjectnamefind'] = '';
                                $checksubject = mysqli_prepare($conn, 'Call select_subjectforedit(?, @idsubjectfind, @typesubjectfind, @gradesubjectfind, @departmentsubjectfind, @namesubjectfind)');
                                $checksubject->bind_param('s', $subjectnamefind);
				                $checksubject->execute();
                                        
                                $selectedsubject = mysqli_query($conn, 'SELECT @idsubjectfind, @typesubjectfind, @gradesubjectfind, @departmentsubjectfind, @namesubjectfind');
                                $checkedsubject = mysqli_fetch_assoc($selectedsubject);
                                if($checkedsubject['@idsubjectfind'] != ""){
                                        $_SESSION['@idsubjectfind'] = $checkedsubject['@idsubjectfind'];
                                        $json = array(
                                            'subjecttypeedit' =>  $checkedsubject['@typesubjectfind'],
                                            'subjectgradeedit'     =>  $checkedsubject['@gradesubjectfind'],
                                            'subjectdepartmentedit'     =>  $checkedsubject['@departmentsubjectfind'],
                                            'subjectnameedit'     =>  $checkedsubject['@namesubjectfind'],
                                            );
                                            echo json_encode($json);
                                }    
                                else if ($checkedsubject['@idsubjectfind'] == "") {
                                        echo "nosubject";
				// }
                                }
                        }
                        else if($subjecttypefind == "delete" && $subjectnamefind != ""){
                                $_SESSION['subjectnamefind'] = '';
                                $checksubject = mysqli_prepare($conn, 'Call select_subjectforedit(?, @idsubjectfind, @typesubjectfind, @gradesubjectfind, @departmentsubjectfind, @namesubjectfind)');
                                $checksubject->bind_param('s', $subjectnamefind);
				                $checksubject->execute();
                                        
                                $selectedsubject = mysqli_query($conn, 'SELECT @idsubjectfind, @typesubjectfind, @gradesubjectfind, @departmentsubjectfind, @namesubjectfind');
                                $checkedsubject = mysqli_fetch_assoc($selectedsubject);
                                if($checkedsubject['@idsubjectfind'] != ""){
                                        $_SESSION['@idsubjectfind'] = $checkedsubject['@idsubjectfind'];
                                        $json = array(
                                            'subjecttypedelete' =>  $checkedsubject['@typesubjectfind'],
                                            'subjectgradedelete'     =>  $checkedsubject['@gradesubjectfind'],
                                            'subjectdepartmentdelete'     =>  $checkedsubject['@departmentsubjectfind'],
                                            'subjectnamedelete'     =>  $checkedsubject['@namesubjectfind'],
                                            );
                                            echo json_encode($json);
                                }    
                                else if ($checkedsubject['@idsubjectfind'] == "") {
                                        echo "nosubject";
				// }
                                }
                        }
				
    
?>