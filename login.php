<?php include("config.php"); ?>

<?php
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $result=$conn->query("SELECT * FROM users WHERE email='$email'");
    $user=$result->fetch_assoc();

    if($user && password_verify($password,$user['password'])){
        $_SESSION['user_id']=$user['id'];
        $_SESSION['role']=$user['role'];

        if($user['role']=="admin"){
            header("Location: admin/dashboard.php");
        } else {
            header("Location: index.php");
        }
    } else {
        echo "Invalid Login";
    }
}
?>

<form method="POST">
<h2>Login</h2>
<input name="email" placeholder="Email"><br><br>
<input type="password" name="password" placeholder="Password"><br><br>
<button name="login">Login</button>
</form>
