<?php
include("../config.php");

$result=$conn->query("SELECT SUM(total) as total_sales FROM orders");
$data=$result->fetch_assoc();

echo "<h2>Total Sales</h2>";
echo "<h1>Rs ".$data['total_sales']."</h1>";
?>
