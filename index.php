<?php include("config.php"); ?>

<h2>Available Fish</h2>
<a href="order_history.php">My Orders</a> |
<a href="logout.php">Logout</a>
<hr>

<?php
$result=$conn->query("SELECT * FROM products");
while($row=$result->fetch_assoc()){
?>

<div style="border:1px solid #ccc;padding:10px;margin:10px;">
<img src="uploads/<?php echo $row['image']; ?>" width="150"><br>
<h4><?php echo $row['name']; ?></h4>
<p>Rs <?php echo $row['price']; ?>/kg</p>
</div>

<?php } ?>
