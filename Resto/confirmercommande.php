<?php 

include "connect.php";

$id = $_GET["commandeid"];
$req = mysqli_query($conn, "UPDATE commande SET commande_confirm = 1 WHERE commande_id = '$id'");
header("location:account.php?tab=commande");

?>