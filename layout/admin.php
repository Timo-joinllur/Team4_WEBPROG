<?php 
include "header.php";
include 'db.php';
?>
<div class = "txtblock">
<h1> Reservation table </h1>

<?php
    $sql = "SELECT * FROM reservation ORDER BY time DESC";
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
                <td>$row[complete] <button onclick='mySwitch()' name='accept'>Accept</button></td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "NO Results";
    }
    $connection->close();

   
    if(isset($_POST['accept'])){
        $complete = $_POST ['complete'];
        $query = mysqli_query($connection, "UPDATE reservation set complete= 0  ");
            if($query){
             echo "<h3> Your information is updated successfully </h3>";
            }
            else { echo "Record not modified";
            }

    }



?>

</div>

<?php include "footer.php"; ?>