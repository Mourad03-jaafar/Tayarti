<?php 
include "connect.php";
$id = $_POST['id'];
$query = mysqli_query($conn, "DELETE FROM food WHERE food_id = $id");
header("location:admin.php?tab=produit");
?>