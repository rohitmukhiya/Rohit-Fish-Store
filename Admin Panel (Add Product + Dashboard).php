<?php
include("../config.php");

// Only admin can access
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard - Rohit Fish Store</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
body{font-family:Poppins;background:#f5f5f5;margin:0;}
header{background:#ff6600;padding:15px;color:white;text-align:center;}
.container{padding:20px;}
table{width:100%;border-collapse:collapse;}
th,td{border:1px solid #ccc;padding:10px;text-align:center;}
th{background:#ff6600;color:white;}
button{padding:6px 10px;border:none;border-radius:5px;background:#ff6600;color:white;cursor:pointer;}
button:hover{opacity:0.8;}
a{margin-right:10px;text-decoration:none;color:#ff6600;font-weight:bold;}
</style>
</head>
<body>

<header>
<h2>Admin Dashboard - Rohit Fish Store</h2>
</header>

<div class="container">
<a href="add_product.php">Add Product</a>
<a href="sales_report.php">Sales Report</a>
<a href="../logout.php">Logout</a>
<hr>

<h3>Orders List</h3>

<table>
<tr>
<th>Order ID</th>
<th>User Name</th>
<th>Items</th>
<th>Subtotal</th>
<th>Delivery</th>
<th>Total</th>
<th>Payment</th>
<th>Status</th>
<th>Date</th>
<th>Action</th>
</tr>

<?php
$result = $conn->query("SELECT orders.*, users.name 
                        FROM orders 
                        JOIN users ON orders.user_id = users.id 
                        ORDER BY order_date DESC");

while($row = $result->fetch_assoc()){
?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['items']; ?></td>
<td>Rs <?php echo $row['subtotal']; ?></td>
<td>Rs <?php echo $row['delivery_charge']; ?></td>
<td>Rs <?php echo $row['total']; ?></td>
<td><?php echo $row['payment_method']; ?></td>
<td><?php echo $row['status']; ?></td>
<td><?php echo $row['order_date']; ?></td>
<td>
<a href="update_status.php?id=<?php echo $row['id']; ?>"><button>Deliver</button></a>
<a href="delete_order.php?id=<?php echo $row['id']; ?>"><button>Delete</button></a>
</td>
</tr>
<?php } ?>

</table>
</div>
</body>
</html>
