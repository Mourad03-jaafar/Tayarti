<?php 

include "connect.php";

$id = $_GET["commandeid"];
$query = mysqli_query($conn, "DELETE FROM commande WHERE commande_id = $id");
header("location:account.php?tab=commande");

?>