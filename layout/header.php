<?php
session_start();

if(isset($_COOKIE["firstname"]) AND isset($_COOKIE["surname"])){
    if(isset($_COOKIE["firstname"])){
        $fname = $_COOKIE["firstname"];
        $_SESSION["firstname"] = $fname;
    }
    if(isset($_COOKIE["surname"])){
        $lname = $_COOKIE["surname"];
        $_SESSION["surname"] = $lname;
        
    }
    if(isset($_COOKIE["userid"])){
        $userid = $_COOKIE["userid"];
        $_SESSION["userid"] = $userid;
    }
};



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ranga&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inria+Serif:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="reserve.css">
    <link rel="stylesheet" href="staff.css">
    <link rel="stylesheet" href="contact.css">
</head>
<body>
<div class="grid-container">

    <div class="header">
        <div style="flex-grow: 3; vertical-align: middle; ">
        <?php if(isset($_SESSION["firstname"]) AND isset($_SESSION["surname"])){
        echo "<a href='logout.php' class='button vcenter'>Logout</a>";
        }
            else {
                echo "<a href='login.php' class='button vcenter'>Login</a>";
            }
        ?>
        </div>
        <div style="flex-grow: 3; vertical-align: middle; ">
        <?php if(isset($_SESSION["firstname"]) AND isset($_SESSION["surname"])){
        echo "<a href='contact.php' class='button vcenter'>Contact</a>";
        }
        ?>
        </div>
        <div style="flex-grow: 3; vertical-align: middle; "><a href="staff.php" class="button vcenter">Staff</a> </div>
        <div style="flex-grow: 3; vertical-align: middle; ">
        <?php if(isset($_SESSION["firstname"]) AND isset($_SESSION["surname"])){
        echo "<a href='reserve.php' class='button vcenter'>Reserve</a>";
        }
        ?>
         </div>
        <div style="flex-grow: 3; vertical-align: middle; "><a href="menu.php" class="button vcenter">Menu</a> </div>
        <div style="flex-grow: 5;">
            <?php
            if(isset($_SESSION["isadmin"]) AND $_SESSION["isadmin"] == TRUE)
            {
                echo "<a href='admin.php' class='button vcenter'>Admin tools</a>";
            }
            ?>
        </div>
        <div class="visible" style="flex-grow: 1;"><p>Pizz</p><p1>urgeR</p1></div> 
        <div style="flex-grow: 2;"> <a href="index.php"><img style="width: 40px; padding: 5px;" class="vcenter" src="images/logo.png" alt="logo"></a></div> 
    </div>
    
    <div class="main">