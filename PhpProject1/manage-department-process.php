<?php
session_start();
include "./admin/admin-validation.php";
include "connect.php";

				if(isset($_POST['submit-add-department'])){
					$adddepartmentname         = $_SESSION['departmentnamefind'];

					$inputadddepartment = mysqli_prepare($conn, 'Call insert_newdepartment(?)');
					$inputadddepartment->bind_param('s', $adddepartmentname);
                    $inputadddepartment->execute();
                    
                    
					if($inputadddepartment){
                    $_SESSION['departmentnamefind'] = "";
					header('location:manage-department.php?addsuccess');
					}
					else{
                    $_SESSION['departmentnamefind'] = "";
					header('location:manage-department.php?addfailed');
					}
				}
                else if(isset($_POST['submit-edit-department'])){
                    $departmentidedit = $_SESSION['@iddepartmentfind'];
                    $departmentnameedit = $_POST['input-departmentname-edit'];
                    
                    $inputeditdepartment = mysqli_prepare($conn, 'Call update_editdepartment(?, ?)');
					$inputeditdepartment->bind_param('si', $departmentnameedit, $departmentidedit);
                    $inputeditdepartment->execute();
                   
                    if($inputeditdepartment){
                        $_SESSION['departmentnamefind'] = "";
                        header('location:manage-department.php?editsuccess');
                        }
                    else{
                        $_SESSION['departmentnamefind'] = "";
                        header('location:manage-department.php?editfailed');
                        }
                                        
                                        
                    }
                else if(isset($_POST['submit-delete-department'])){
                                    $departmentiddelete = $_SESSION['@iddepartmentfind'];
                                    $inputdeletedepartment = mysqli_prepare($conn, 'Call delete_department(?)');
                                    $inputdeletedepartment->bind_param('i', $departmentiddelete);
                                    $inputdeletedepartment->execute();
                                    
                                    if($inputdeletedepartment){
                                        $_SESSION['departmentnamefind'] = "";
                                        header('location:manage-department.php?deletesuccess');
                                    }
                                    else{
                                        $_SESSION['departmentnamefind'] = "";
                                        header('location:manage-department.php?deletefailed');
                                    }
                                    
                                }
			?>

