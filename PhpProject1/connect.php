<?php

$servername = "localhost";
$username = "ekesel";
$password = "m41n@i13";
$databasename = "ekesel";

$conn = new mysqli($servername, $username, $password, $databasename);

if (mysqli_connect_error()) {
    die("Database failed to connect: " .mysqli_connect_error());
}

?>