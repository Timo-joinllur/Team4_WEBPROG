<?php 
include "header.php";
include 'db.php'
?>

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
            <td>$row[complete]</td>
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