<?php 
include "connect.php";
$id = $_GET["commandeid"];
$req = mysqli_query($conn, "DELETE FROM ventes WHERE id_vente = $id");
header("location:admin.php?tab=annulercommande");
?>