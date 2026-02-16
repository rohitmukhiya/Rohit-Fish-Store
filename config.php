<?php
$conn = new mysqli("localhost","rohit_user","You@143+","rohit_fish_store");

if($conn->connect_error){
    die("Database Connection Failed");
}

session_start();
?>
