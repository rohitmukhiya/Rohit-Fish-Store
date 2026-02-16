<?php
include("../config.php");

$id=$_GET['id'];
$conn->query("UPDATE orders SET status='Delivered' WHERE id='$id'");
header("Location: dashboard.php");
?>
