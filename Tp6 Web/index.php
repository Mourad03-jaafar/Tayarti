<?php
require 'functions.php';

$contacts=getContacts($conn);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Gestion des Contacts</title>
</head>
<body>
    <h1>Liste des Contacts</h1>
    <a href="add_contact.php">Ajouter un Contact</a>
    <table>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
        </tr>
        <?php
        if($contacts->num_rows > 0){
            while($row=$contacts->fetch_assoc()){
                echo "<tr>";
                echo "<td>" . $row["nom"] . "<td/>";
                echo "<td>" . $row["prenom"] . "<td/>";
                echo "<td>" . $row["email"] . "<td/>";
                echo "<td>" . $row["telephone"] . "<td/>";
                echo "<td>
                        <a href='edit_contact.php'?id=" . $row["id"] . "'>Modifier</a> |
                        <a href='delete_contact.php'?id=" . $row["id"] . "'>Supprimer</a>
                    <td>";
                echo"</tr>";
            }
        } else {
            echo "<tr><td colspan='5'> Aucun Contact trouvé</td></tr>";
        }
        $conn->close();
    ?>
    </table>
    
</body>
</html>