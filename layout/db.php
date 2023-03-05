<?php
$servername = "db";
$username = "mysql";
$password = "mysql";
$dbname = "mysql";

// Creating connection
$connection = new mysqli ($servername, $username, $password, $dbname);

// Checking the connection
if ($connection -> connect_error){
    die("connection failed:".$connection->connect_error);
}
else {
    
}
?>