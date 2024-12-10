<?php
require "functions.php";

if(isset($_GET["id"])){
    if(deleteContact($conn, $id)){
        echo "Contact supprimé avec succès";
    }
    else{
        echo "Erreur : " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="12.styles.css">
    <title>Supprimer un Contact</title>
</head>
<body>
    <h1>Supprimer un Contact</h1>
    <a href="index.php">Retour à la liste des contacts</a>
</body>
</html>