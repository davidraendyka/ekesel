<?php
session_start();
include "./admin/admin-validation.php";
include "connect.php";

				if(isset($_POST['submit-add-admin-account'])){
					$usernameadmin = $_SESSION['adminusername'];
					$passwordadmin = $_POST['input-admin-account-password-edit'];
					$nameadmin = $_POST['input-admin-account-name-edit'];
					$passwordadminhashed = hash('sha256', $passwordadmin);

					$inputaccount = mysqli_prepare($conn, 'Call insert_adminaccout(?, ?, ?)');
					$inputaccount->bind_param('sss', $usernameadmin, $passwordadminhashed, $nameadmin);
					$inputaccount->execute();
					if($inputaccount){
					header('location:manage-adminaccount.php?addsuccess');
					}
					else{
					header('location:manage-adminaccount.php?addfailed');
					}
				}
                                else if(isset($_POST['submit-edit-admin-account'])){
                                        $adminid    = $_SESSION['@idadmin'];
                                        $usernameadmin = $_POST['input-admin-account-username-edit'];
					$passwordadmin = $_POST['input-admin-account-password-edit'];
					$nameadmin = $_POST['input-admin-account-name-edit'];
					$passwordadminhashed = hash('sha256', $passwordadmin);
                                        
                                        if($passwordadmin == ""){
                                            $updateaccount = mysqli_prepare($conn, 'Call update_editadminaccountnopw(?, ?, ?)');
					$updateaccount->bind_param('ssi', $usernameadmin, $nameadmin, $adminid);
					$updateaccount->execute();
                                            if($updateaccount){
                                            header('location:manage-adminaccount.php?editsuccess');
                                            }
                                            else{
                                            header('location:manage-adminaccount.php?editfailed');
                                            }
                                        }
                                        
                                        else{
                                        
                                        $updateaccount = mysqli_prepare($conn, 'Call update_editadminaccount(?, ?, ?, ?)');
					$updateaccount->bind_param('sssi', $usernameadmin, $nameadmin, $passwordadminhashed, $adminid);
					$updateaccount->execute();
                                        
                                            if($updateaccount){
                                            header('location:manage-adminaccount.php?editsuccess');
                                            }
                                            else{
                                            header('location:manage-adminaccount.php?editfailed');
                                            }
                                        }
                                        
                                }
                                else if(isset($_POST['submit-delete-admin-account'])){
                                    $adminusernamedel = $_SESSION['unameadmindel'];
                                    
                                    $deleteaccount = mysqli_prepare($conn, 'Call delete_adminaccount(?)');
                                    $deleteaccount->bind_param('s', $adminusernamedel);
                                    $deleteaccount->execute();
                                    
                                    if($deleteaccount){
                                        header('location:manage-adminaccount.php?deletesuccess');
                                    }
                                    else{
                                        header('location:manage-adminaccount.php?deletefailed');
                                    }
                                    
                                }
			?>

