<?php

//session_start();
setcookie("firstname","", time()-3600, "/");
unset ($_COOKIE['firstname']);
setcookie("surname","", time()-3600, "/");
unset ($_COOKIE['firstname']);
setcookie("userid","", time()-3600, "/");
unset ($_COOKIE['id']);
//session_destroy(); //remove sid-login from server storage
//session_write_close();
header('Location: index.php');

?>