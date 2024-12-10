<?php 
session_start();
include "connect.php";
$email = $_SESSION["user"];
$query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
$id = mysqli_fetch_row($query)[0];
$query1 = mysqli_query($conn, "SELECT * FROM commande WHERE user_id = '$id' AND commande_confirm = 0");
echo mysqli_num_rows($query1);
?>