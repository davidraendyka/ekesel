<?php
session_start();

include('connect.php'); 

$accounttypelogin   = $_POST['select-login-type'];
$usernamelogin      = mysqli_real_escape_string($conn, $_POST['input-login-username']);
$passwordlogin      = mysqli_real_escape_string($conn, $_POST['input-login-password']);
$passwordadminloginhashed = hash('sha256', $passwordlogin);

if($accounttypelogin = "admin" && $usernamelogin != "" && $passwordlogin != ""){
    $conn->query("SET @usernameadmin =  "."'" . $usernamelogin . "'"." , @passwordadmin = "."'". $passwordadminloginhashed ."'"."");
    $result = $conn->query("CALL select_adminlogin(@usernameadmin, @passwordadmin)");
    $_SESSION = mysqli_fetch_array($result, MYSQLI_ASSOC);
    //echo $_SESSION['idadmin'];
    header('location:adminaccount.php');
}

?>