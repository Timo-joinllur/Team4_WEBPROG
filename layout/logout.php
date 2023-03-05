<?php

session_start();
setcookie("firstname","", time()-3600, "/");
unset ($_COOKIE['firstname']);
setcookie("surname","", time()-3600, "/");
unset ($_COOKIE['firstname']);
setcookie("userid","", time()-3600, "/");
unset ($_COOKIE['id']);

$_SESSION["isadmin"] = 0;
session_destroy();
//session_write_close();
header('Location: index.php');

?>