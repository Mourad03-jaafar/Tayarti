<?php 

include "connect.php";
$user    = $_GET["userid"];
$food    = $_GET["food_id"];
$commande = $_GET["commandeid"];
$req  = mysqli_query($conn, "INSERT INTO ventes VALUES('','$user','$food')");
$req1 =  mysqli_query($conn, "DELETE FROM commande WHERE commande_id = $commande");
header("location:admin.php?tab=commande");
?>