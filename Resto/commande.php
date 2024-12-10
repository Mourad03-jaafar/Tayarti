<?php 
session_start();
include "connect.php";
$foodid =  $_GET["foodid"];
$email = $_SESSION["user"];
$query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
$id = mysqli_fetch_row($query)[0];
$query = mysqli_query($conn, "INSERT INTO commande VALUES('','$foodid','$id','0')");
$query1 = mysqli_query($conn, "SELECT * FROM commande WHERE user_id = '$id'");
echo mysqli_num_rows($query1);
?>