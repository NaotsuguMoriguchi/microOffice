<?php
session_start();

$_SESSION["id"] = 0;
$_SESSION["first_name"] = 0;
$_SESSION["last_name"] = 0;
$_SESSION["full_name"] = 0;
$_SESSION["user_name"] = 0;
$_SESSION["email"] = 0;
$_SESSION["role"] = 0;
$_SESSION["reg_dt"] = 0;


header('Location: ../index.php');
?>
