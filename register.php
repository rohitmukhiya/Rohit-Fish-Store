<?php include("config.php"); ?>

<?php
if(isset($_POST['register'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=password_hash($_POST['password'],PASSWORD_DEFAULT);

    $conn->query("INSERT INTO users(name,email,password)
    VALUES('$name','$email','$password')");

    echo "Registered Successfully! <a href='login.php'>Login</a>";
}
?>

<form method="POST">
<h2>Register</h2>
<input name="name" placeholder="Name" required><br><br>
<input name="email" placeholder="Email" required><br><br>
<input type="password" name="password" placeholder="Password" required><br><br>
<button name="register">Register</button>
</form>
