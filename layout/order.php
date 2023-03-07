<?php include "header.php"; ?>
<h3>Welcome to the order page</h3>
<form method="post" action="cart.php">
<?php
include 'db.php';
$sql = "SELECT * FROM foods";
$result = $connection->query($sql);
if ($result->num_rows > 0) {
       echo "<table class='table' style='height: 150px;'>
             <tr class='thead-dark'>
             <th><p>Name|</p></th>
             <th><p>Price|</p></th>
             <th><p>Price with discount|</p></th>
             <th><p>Count</p></th>
             </tr>";
       while ($row = $result->fetch_assoc()) {
              echo "<tr>
                    <td><p style='color:white;font-size:20px;'>$row[name]</p></td>
                    <td><p style='color:red;font-size:20px;'>$row[price1]</p></td>
                    <td><p style='font-size:20px;color:red;'>$row[price_Discount]</p></td>
                    <td>
                    <input type='number' name='item[$row[id]][count]' style='width:50px;'>
                    <input type='hidden' name='item[$row[id]][name]' value='$row[name]'>
                    <input type='hidden' name='item[$row[id]][price]' value='$row[price_Discount]'>
                    </td>
                    </tr>";
       }
       echo "</table><input type='submit' value='View Cart'></form>";
} else {
       echo "No information";
}
$connection->close();
?>
<?php include "footer.php"; ?>
