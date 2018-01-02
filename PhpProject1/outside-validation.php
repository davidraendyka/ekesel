<?php
session_start();
if(!isset($_SESSION['idadmin']) && !isset($_SESSION['idsiswa']) && !isset($_SESSION['idguru'])){
    header('location:login.php');
}
else if(isset($_SESSION['idsiswa'])){
    
}
else if(isset($_SESSION['idguru'])){
        
}

else if(isset($_SESSION['idadmin'])){
    header('location:adminaccount.php');
}
?>