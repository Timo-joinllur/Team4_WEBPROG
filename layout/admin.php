<?php 
include "header.php";
include 'db.php';
?>
<div class = "txtblock">
<h1> Reservation table </h1>

<?php
//  $id= $_GET['id'];
    $sql = "select * from reservation order by time desc";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        echo "<table class='table table-dark'>
            <tr><th>ID</th><th>Received</th><th>Time</th><th>Text</th><th>Status</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr id='myBox'>
                <td>$row[user_id]</td>
                <td>$row[received]</td>
                <td>$row[time]</td>
                <td>$row[text]</td>
                <td>$row[complete]</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "NO Results";
    }
 /*   $connection->close();

   
    if(isset($_POST['accept'])){
    
        $query = mysqli_query($connection, "DELETE FROM reservation WHERE id='$id'");
            if($query){
             echo "<h3> Information has been updated successfully </h3>";
            }
            else { echo "Nothings has been modified";
            }

            echo '<script window.location.replace("admin.php")</script>';
    }


*/
?>

</div>

<?php include "footer.php"; ?>