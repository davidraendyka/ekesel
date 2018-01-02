<?php 
session_start();
$departmentnamefind        = strtolower($_POST['departmentnamefind']);
$departmenttypefind        = $_POST['departmenttypefind'];

include "connect.php";
                                
                               
                                     
                                    
			if($departmenttypefind == "add" && $departmentnamefind != ""){
                                
                                $checkdepartment = mysqli_prepare($conn, 'Call select_departmentforedit(?, @iddepartmentfind, @namedepartmentfind)');
                                $checkdepartment->bind_param('s', $departmentnamefind);
				                $checkdepartment->execute();
                                        
                                $selecteddepartment = mysqli_query($conn, 'SELECT @iddepartmentfind');
                                $checkeddepartment = mysqli_fetch_assoc($selecteddepartment);
                                if($checkeddepartment['@iddepartmentfind'] != ""){
                                    echo "exist";
                                }    
                                else if ($checkeddepartment['@iddepartmentfind'] == "") {
                                        $_SESSION['departmentnamefind'] = $departmentnamefind;
                                        echo "ok";
				// }
                                }
                                else {
                                        echo "error";
                                }
                        }
                        else if($departmenttypefind == "edit" && $departmentnamefind != ""){
                                $_SESSION['departmentnamefind'] = '';
                                $checkdepartment = mysqli_prepare($conn, 'Call select_departmentforedit(?, @iddepartmentfind, @namedepartmentfind)');
                                $checkdepartment->bind_param('s', $departmentnamefind);
				                $checkdepartment->execute();
                                        
                                $selecteddepartment = mysqli_query($conn, 'SELECT @iddepartmentfind, @namedepartmentfind');
                                $checkeddepartment = mysqli_fetch_assoc($selecteddepartment);
                                if($checkeddepartment['@iddepartmentfind'] != ""){
                                        $_SESSION['@iddepartmentfind'] = $checkeddepartment['@iddepartmentfind'];
                                        $json = array(
                                            'departmentnameedit'     =>  $checkeddepartment['@namedepartmentfind']
                                            );
                                            echo json_encode($json);
                                }    
                                else if ($checkeddepartment['@iddepartmentfind'] == "") {
                                        echo "nodepartment";
				// }
                                }
                        }
                        else if($departmenttypefind == "delete" && $departmentnamefind != ""){
                                $_SESSION['departmentnamefind'] = '';
                                $checkdepartment = mysqli_prepare($conn, 'Call select_departmentforedit(?, @iddepartmentfind, @namedepartmentfind)');
                                $checkdepartment->bind_param('s', $departmentnamefind);
				                $checkdepartment->execute();
                                        
                                $selecteddepartment = mysqli_query($conn, 'SELECT @iddepartmentfind, @namedepartmentfind');
                                $checkeddepartment = mysqli_fetch_assoc($selecteddepartment);
                                if($checkeddepartment['@iddepartmentfind'] != ""){
                                        $_SESSION['@iddepartmentfind'] = $checkeddepartment['@iddepartmentfind'];
                                        $json = array(
                                                'departmentnamedelete'   =>  $checkeddepartment['@namedepartmentfind']
                                            );
                                            echo json_encode($json);
                                }    
                                else if ($checkeddepartment['@iddepartmentfind'] == "") {
                                        echo "nodepartment";
				// }
                                }
                        }
				
    
?>