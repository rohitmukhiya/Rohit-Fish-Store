<?php
include("../config.php");

if($_SESSION['role']!='admin'){
    header("Location: ../login.php");
}

$result=$conn->query("SELECT orders.*, users.name 
FROM orders 
JOIN users ON orders.user_id=users.id
ORDER BY order_date DESC");
?>

<h2>Admin Dashboard</h2>
<a href="add_product.php">Add Product</a> |
<a href="sales_report.php">Sales Report</a> |
<a href="../logout.php">Logout</a>
<hr>

<table border="1">
<tr>
<th>User</th>
<th>Total</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php while($row=$result->fetch_assoc()){ ?>
<tr>
<td><?php echo $row['name']; ?></td>
<td>Rs <?php echo $row['total']; ?></td>
<td><?php echo $row['status']; ?></td>
<td>
<a href="update_status.php?id=<?php echo $row['id']; ?>">Deliver</a> |
<a href="delete_order.php?id=<?php echo $row['id']; ?>">Delete</a>
</td>
</tr>
<?php } ?>
</table>
