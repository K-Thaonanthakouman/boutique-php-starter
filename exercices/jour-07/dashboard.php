<?php
session_start();

if (isset($_SESSION["user"]) == true) {
    echo 'Bonjour ' . $_SESSION["user"];
    header("Location: logout.php");
    exit;
}
else{
    header("Location: login.php");
    exit;
}


?>