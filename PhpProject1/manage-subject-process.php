<?php
session_start();
include "./admin/admin-validation.php";
include "connect.php";

				if(isset($_POST['submit-add-subject'])){
					$addsubjectname         = $_SESSION['subjectnamefind'];
                    $addsubjecttype         = $_POST['input-subject-type-add'];
                    $addsubjectgrade        = $_POST['input-subject-grade-add'];
                    $addsubjectdepartment   = $_POST['input-subject-department-add'];
					$_SESSION['@idsubjectfind'] = "";

					$inputaddsubject = mysqli_prepare($conn, 'Call insert_newsubject(?, ?, ?, ?)');
					$inputaddsubject->bind_param('ssss', $addsubjectname, $addsubjecttype, $addsubjectgrade, $addsubjectdepartment);
					$inputaddsubject->execute();
					if($inputaddsubject){
					header('location:manage-subject.php?addsuccess');
					}
					else{
					header('location:manage-subject.php?addfailed');
					}
				}
                else if(isset($_POST['submit-edit-subject'])){

                    $editsubjectname         = $_POST['input-subjectname-edit'];
                    $editsubjecttype         = $_POST['input-subject-type-edit'];
                    $editsubjectgrade        = $_POST['input-subject-grade-edit'];
                    $editsubjectdepartment   = $_POST['input-subject-department-edit'];
                    $editsubjectid           = $_SESSION['@idsubjectfind'];

                    $updatesubject = mysqli_prepare($conn, 'Call update_subject(?, ?, ?, ?, ?)');
					$updatesubject->bind_param('ssssi', $editsubjecttype, $editsubjectname, $editsubjectgrade, $editsubjectdepartment, $editsubjectid);
					$updatesubject->execute();
                    $_SESSION['@idsubjectfind'] = "";
                                if($updatesubject){
                                header('location:manage-subject.php?editsuccess');
                                            }
                                else{
                                header('location:manage-subject.php?editfailed');
                                    }
                }
                else if(isset($_POST['submit-delete-subject'])){

                    $deletesubjectid    = $_SESSION['@idsubjectfind'];

                    $deletesubject = mysqli_prepare($conn, 'Call delete_subject(?)');
					$deletesubject->bind_param('i', $deletesubjectid);
					$deletesubject->execute();
                    $_SESSION['@idsubjectfind'] = "";
                                if($deletesubject){
                                header('location:manage-subject.php?deletesuccess');
                                            }
                                else{
                                header('location:manage-subject.php?deletefailed');
                                    }
                }
			?>

