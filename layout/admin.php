<?php 
include "header.php";
include 'db.php';
?>

<h1> Reservation table </h1>

<?php
    $sql = "select * from reservation order by time desc";

    $result = $connection -> query($sql);
    if($result->num_rows > 0 ){
        echo"<table class='table table-dark'>
        <tr><th>ID</th><th>Received</th><th>Time</th><th>Text</th></tr>";
        while($row = $result -> fetch_assoc()){
        echo"
            <tr>
            <td>$row[user_id]</td>
            <td>$row[received]</td>
            <td>$row[time]</td>
            <td>$row[text]</td>
            <td>$row[complete]<input type= 'checkbox' name='checkbox' value='' id='checkbox'></td></td>
            </tr>
        ";
        }
        echo "</table>";
    }

    else
        {
            echo "NO Results";
        }
    $connection -> close();
?>





<?php include "footer.php"; ?>