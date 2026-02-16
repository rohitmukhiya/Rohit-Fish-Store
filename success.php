<?php
include("config.php");

// Get eSewa transaction info
$amt = $_POST['amt'];
$pid = $_POST['pid'];
$refId = $_POST['refId']; // eSewa reference

// Here you can save the order as paid in your database
// Example:
$conn->query("INSERT INTO orders(user_id, items, subtotal, delivery_charge, total, payment_method, status)
VALUES('".$_SESSION['user_id']."','Sample Items','$amt',0,'$amt','eSewa','Paid')");

echo "<h2>Payment Successful!</h2>";
echo "eSewa Ref ID: $refId<br>";
echo "Amount Paid: Rs $amt<br>";
echo "<a href='index.php'>Back to Store</a>";
?>
