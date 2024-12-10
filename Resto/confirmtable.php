<?php 

include "connect.php";

$id = $_GET["id"];

$req = mysqli_query($conn, "UPDATE reservetable SET table_confirme = 1 WHERE id = $id");
header("location:admin.php?tab=reservetable");

?>