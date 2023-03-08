<?php
$title = "Registration";
include '../layout/header.php';
?>

<form method = "post" action = "" onsubmit="" name="form1">
<br>
<input type = "text" name = "fname" placeholder = "First name" required><br><br>
<input type = "text" name = "lname" placeholder = "Last name" required><br><br>
<input type = "submit" value = "Register" name = "register">
<input type = "submit" value = "Login" name = "login">
</form>

<?php

//Registration: check on data existance in db, fails and gives 'User already exists' on existant data

if ( isset( $_POST["register"] ) ) 
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    include 'db.php';
    $sql = "INSERT INTO users (fname, lname) 
    SELECT '$fname', '$lname'
    WHERE NOT EXISTS 
    (SELECT fname, lname 
     FROM users 
     WHERE fname = '$fname' AND lname = '$lname')";
    if ( $connection -> query( $sql ) === TRUE AND $connection -> affected_rows != 0) {
        echo "<div class='cntrblock'>Thank you for registering!<br>Please, login to continue</div>";
    }
    else {
        echo "<div class='cntrblock'>User already exists</div>";
    }
}

//Login, if data is does not exists, fails and reports 'User does nopt exists', gives admin rights only after login, but also creates cookies for automatic login without admin rights, even if they are granted to an account

elseif (isset( $_POST["login"] ) )
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    include 'db.php';
    $sql2 = "SELECT * FROM users WHERE fname = '$fname' AND lname = '$lname'";
    $result = $connection ->query($sql2);
    if($result->num_rows > 0 )
    {
        while ($output = mysqli_fetch_assoc($result))
        {
            
            $_SESSION["firstname"] = $output["fname"];
            $_SESSION["surname"] = $output["lname"];
            $_SESSION["userid"] = $output["id"];
            $_SESSION["isadmin"] = $output["admin"];
            echo '<script> window.location.replace("setcookies.php")</script>';
        }
    }
    else
    {echo "User does not exist";}
}


include '../layout/footer.php';
?>