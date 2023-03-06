<?php include "header.php"; ?>
<h3>welcome to the order page</h3>
<?php
include 'db.php';
$sql = "SELECT * FROM foods";
$result = $connection ->query($sql);
if ($result -> num_rows > 0){
       echo 
       "
       <table class='table' style= 'hight:150px'>
       <tr class='thead-dark'>
       <th><p>Name</p></th>
       <th><p>Price</p></th>
       <th><p style='font-size: 20px;'>Price with discount</p></th>
       <th><p>count</p></th>
       </tr>";
       while ($row = $result->fetch_assoc()) {
              echo 
              "<tr>
              <td><p style='color:white ;font-size : 20px   '>$row[name]</p></td>
              <td><p style='color:red ; font-size : 20px '>$row[price1]</p></td>
              <td><p style = 'font-size : 20px ; color:red'> $row[price_Discount]</p></td>
              <td><input type='number' name = 'count' style='width:50px'></td>
              </tr>";}
       echo "</table>";       }
else {echo "No information";}
$connection -> close();
?>
<?php include "footer.php"; ?>
