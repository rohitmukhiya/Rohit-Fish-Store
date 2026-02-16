<?php
include("config.php");

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id=$_SESSION['user_id'];
$items=$_POST['items'];
$subtotal=$_POST['subtotal'];
$payment=$_POST['payment'];

$delivery=($subtotal<1000)?100:0;
$total=$subtotal+$delivery;

$conn->query("INSERT INTO orders
(user_id,items,subtotal,delivery_charge,total,payment_method)
VALUES
('$user_id','$items','$subtotal','$delivery','$total','$payment')");

echo "Order Placed Successfully! Total Rs ".$total;
?>
