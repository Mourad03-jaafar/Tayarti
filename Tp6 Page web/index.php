<?php
include('..\database.php');
session_start();

// Définir l'ordre de tri par défaut
$order_by = isset($_GET['order_by']) ? $_GET['order_by'] : 'nom';

// Récupérer les contacts depuis la base de données
$sql = "SELECT * FROM contacts ORDER BY $order_by";
$result = mysqli_query($conn, $sql);

// Vérifier s'il y a des résultats
if (mysqli_num_rows($result) > 0) {
    // Afficher les contacts dans un tableau
    echo "<table>";
    echo "<tr><th><a href='index.php?order_by=nom'>Nom</a></th><th><a href='index.php?order_by=prenom'>Prénom</a></th><th>Email</th><th>Téléphone</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row["nom"]."</td>";
        echo "<td>".$row["prenom"]."</td>";
        echo "<td>".$row["email"]."</td>";
        echo "<td>".$row["telephone"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Aucun contact trouvé.";
}

// Fermer la connexion à la base de données
mysqli_close($conn);
				
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des contacts</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Liste des contacts</h1>

    <table>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
        </tr>
        <?php
        // Récupérer les contacts depuis la base de données
        $sql = "SELECT * FROM contacts";
        $result = mysqli_query($conn, $sql);

        // Afficher les contacts dans un tableau
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row["nom"]."</td>";
            echo "<td>".$row["prenom"]."</td>";
            echo "<td>".$row["email"]."</td>";
            echo "<td>".$row["telephone"]."</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <p><a href="add_contact.php">Ajouter un contact</a></p>
    <p><a href="edit_contact.php">Modifier un contact</a></p>
    <p><a href="delete_contact.php">Supprimer un contact</a></p>
</body>
</html>
