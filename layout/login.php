<?php
$title = "Registration";
include '../layout/header.php';
?>
<script src="../layout/js/site.js"></script>

<form method = "post" action = "" onsubmit="" name="form1">
<br>
<input type = "text" name = "fname" placeholder = "First name" required><br><br>
<input type = "text" name = "lname" placeholder = "Last name" required><br><br>
<input type = "submit" value = "Register" name = "register">
<input type = "submit" value = "Login" name = "login">
</form>

<?php


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
        echo "<div class='cntrblock'>Thank you for registering!</div>";
    }
    else {
        echo "<div class='cntrblock'>User already exists</div>";
    }
}

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
            echo $_SESSION["firstname"];
            echo "<br>";
            $_SESSION["surname"] = $output["lname"];
            echo "<br>";
            $_SESSION["userid"] = $output["id"];
            echo '<script> window.location.replace("setcookies.php")</script>';
        }
    }
    else
    {echo "no";}
}


include '../layout/footer.php';
?>