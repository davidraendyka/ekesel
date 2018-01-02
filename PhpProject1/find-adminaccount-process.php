<?php
session_start();
$adminusernamefind = strtolower($_POST['inputadminaccountname']);
$admintypefind     = $_POST['inputadminaccounttype'];

include "connect.php";

if($admintypefind == "add" && $adminusernamefind != ""){

$checkaccount = mysqli_prepare($conn, 'Call select_adminaccountforedit(?, @usernameadmin, @nameadmin, @idadmin)');
$checkaccount->bind_param('s', $adminusernamefind);
$checkaccount->execute();
        
$selectedaccount = mysqli_query($conn, 'SELECT @usernameadmin');
$checkedaccount = mysqli_fetch_assoc($selectedaccount);
    if($checkedaccount['@usernameadmin'] != ""){
        
    echo "exist";

    }
    else if ($checkedaccount['@usernameadmin'] == ""){
    $_SESSION['adminusernamefind'] = $adminusernamefind;
    echo "ok";
    }
}

else if($admintypefind == "edit" && $adminusernamefind != ""){
    $_SESSION['adminusernamefind'] = '';
    $checkaccount = mysqli_prepare($conn, 'Call select_adminaccountforedit(?, @usernameadmin1, @nameadmin1, @idadmin1)');
    $checkaccount->bind_param('s', $adminusernamefind);
    $checkaccount->execute();
            
    $selectedaccount = mysqli_query($conn, 'SELECT @usernameadmin1, @nameadmin1, @idadmin1');
    $checkedaccount = mysqli_fetch_assoc($selectedaccount);
    if($checkedaccount['@usernameadmin1'] != ""){
        
        $_SESSION['@idadmin1'] = $checkedaccount['@idadmin1'];
        $json = array(
            'usernameadminedit' =>  $checkedaccount['@usernameadmin1'],
            'nameedit'     =>  $checkedaccount['@nameadmin1']
            );
            echo json_encode($json);
    
    }
        else if ($checkedaccount['@usernameadmin1'] == ""){
        echo "noaccount";
    }
}

else if($admintypefind == "delete" && $adminusernamefind != ""){
    $_SESSION['adminusernamefind'] = '';
    $checkaccount = mysqli_prepare($conn, 'Call select_adminaccountforedit(?, @usernameadmin2, @nameadmin2, @idadmin)');
    $checkaccount->bind_param('s', $adminusernamefind);
    $checkaccount->execute();
            
    $selectedaccount = mysqli_query($conn, 'SELECT @usernameadmin2, @nameadmin2');
    $checkedaccount = mysqli_fetch_assoc($selectedaccount);
    
    if($checkedaccount['@usernameadmin2'] != ""){
        $_SESSION['unameadmindel'] = $checkedaccount['@usernameadmin2'];

        $json = array(
            'usernameadmindelete' =>  $checkedaccount['@usernameadmin2'],
            'namedelete'     =>  $checkedaccount['@nameadmin2']
            );
            echo json_encode($json);
    
    }
        else if ($checkedaccount['@usernameadmin2'] == ""){
        echo "noaccount";
    }
}
 


?>