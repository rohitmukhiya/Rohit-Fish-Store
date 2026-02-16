<?php
include("../config.php");

if($_SESSION['role']!='admin'){
    header("Location: ../login.php");
}

if(isset($_POST['add'])){
    $name=$_POST['name'];
    $price=$_POST['price'];

    $image=$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],
    "../uploads/".$image);

    $conn->query("INSERT INTO products(name,price,image)
    VALUES('$name','$price','$image')");
}
?>

<h2>Add Product</h2>
<form method="POST" enctype="multipart/form-data">
<input name="name" placeholder="Fish Name"><br><br>
<input name="price" placeholder="Price"><br><br>
<input type="file" name="image"><br><br>
<button name="add">Add</button>
</form>
