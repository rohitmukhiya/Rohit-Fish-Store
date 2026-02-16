<?php
include("config.php");

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id=$_SESSION['user_id'];
$result=$conn->query("SELECT * FROM orders WHERE user_id='$user_id' ORDER BY order_date DESC");
?>

<h2>My Orders</h2>
<a href="index.php">Back</a><hr>

<table border="1">
<tr>
<th>Items</th>
<th>Total</th>
<th>Status</th>
<th>Date</th>
</tr>

<?php while($row=$result->fetch_assoc()){ ?>
<tr>
<td><?php echo $row['items']; ?></td>
<td>Rs <?php echo $row['total']; ?></td>
<td><?php echo $row['status']; ?></td>
<td><?php echo $row['order_date']; ?></td>
</tr>
<?php } ?>
</table>
