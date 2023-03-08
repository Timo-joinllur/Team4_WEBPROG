<?php

function redirected($url,$message){
       // session_start();
       $_SESSION['message'] = $message;
       header("Location: $url");
       exit();
}     

?>
