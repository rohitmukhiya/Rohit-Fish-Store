<?php
include("config.php");

// Make sure user is logged in
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

// Example: Calculate order total
$total = 1000; // Replace with your cart total dynamically
$pid = "ORDER123".time(); // Unique order ID
$tAmt = $total; // Total amount
$amt = $total;  // Same as total
$psc = 0;       // Service charge
$pdc = 0;       // Delivery charge if any
$su = "https://yourdomain.com/success.php"; // Success URL
$fu = "https://yourdomain.com/failure.php"; // Failure URL
$scd = "9705078030"; // Your eSewa Merchant ID
?>

<form method="POST" action="https://esewa.com.np/epay/main">
<input value="<?php echo $tAmt; ?>" name="tAmt" type="hidden">
<input value="<?php echo $amt; ?>" name="amt" type="hidden">
<input value="<?php echo $psc; ?>" name="psc" type="hidden">
<input value="<?php echo $pdc; ?>" name="pdc" type="hidden">
<input value="<?php echo $pid; ?>" name="pid" type="hidden">
<input value="<?php echo $su; ?>" name="su" type="hidden">
<input value="<?php echo $fu; ?>" name="fu" type="hidden">
<input value="<?php echo $scd; ?>" name="scd" type="hidden">
<button type="submit">Pay with eSewa</button>
</form>
