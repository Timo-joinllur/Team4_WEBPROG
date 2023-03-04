<?php
session_start();
$fname = $_SESSION["firstname"];
$lname = $_SESSION["surname"];
$id = $_SESSION["userid"];
setcookie("firstname", $fname , time() + (86400), "/");
setcookie("surname", $lname , time() + (86400), "/");
setcookie("userid", $id , time() + (86400), "/");
header('Location: index.php');
?>