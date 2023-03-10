<?php include 'header.php'; ?>
<?php
// initialize cart if not set or is unset
if (!isset($_SESSION['cart'])) {
$_SESSION['cart'] = array();
}
// add item to cart
if (isset($_POST['item'])) {
foreach ($_POST['item'] as $key => $value) {
        // sanitize input
       $id = intval($key);
       $count = intval($value['count']);
       $name = htmlspecialchars($value['name']);
       $price = floatval($value['price']);
        // add item to cart
       if ($count > 0) {
              $_SESSION['cart'][$id] = array(
                     'name' => $name,
                     'price' => $price,
                     'count' => $count
              );
       } else {
            // remove item from cart if count is zero
              unset($_SESSION['cart'][$id]);
       }
}
}
// display cart
if (empty($_SESSION['cart'])) {
echo "<p>Your cart is empty.</p>";
} else {
echo "<table class='table'>
       <tr class='thead-dark'>
       <th><p>Name</p></th>
       <th><p>Price</p></th>
       <th><p>Count</p></th>
       <th><p>Total</p></th>
       </tr>";
$total = 0;
foreach ($_SESSION['cart'] as $id => $item) {
       $name = $item['name'];
       $price = $item['price'];
       $count = $item['count'];
        $subtotal = floatval($price) * intval($count);
       $total += $subtotal;
       echo "<tr>
              <td><p style='color:white'>$name</p></td>
              <td><p style='color:white'>$price</p></td>
              <td><p style='color:white'>$count</p></td>
              <td><p style='color:white'>$subtotal</p></td>
              </tr>";
}
echo "<tr>
              <td colspan='3' style='color:white'><p>Total</p></td>
              <td><p style='color:white'>$total</p></td>
              </tr>
              </table>";
}
unset($_SESSION['cart']);
//get the information of the user
include 'function.php';
if (isset($_POST['view_cart'])){ 
              $user_name = $_POST['name_person'];
              $address = $_POST['address'];
              $number = $_POST['number'];
              // do something with the user's information
              echo "<h4><b>$user_name</b> thanks for your order and your address <b> $address </b> . <h4>";
              echo "<br>";
              $masked_number = substr($number, 0, 3) . "XXX" . substr($number, 6, 3);
              echo "<h4> your number is :</h4>" .$masked_number;
}


?>

<?php include 'footer.php'; ?>
