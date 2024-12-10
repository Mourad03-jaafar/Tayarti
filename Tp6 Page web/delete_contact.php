<?php
include('../database.php');
session_start();

// Vérifier si l'ID du contact à supprimer est défini dans l'URL
if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
    // Récupérer l'ID du contact à supprimer depuis l'URL
    $id = trim($_GET['id']);

    // Afficher une page de confirmation avec un formulaire de confirmation
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Si l'utilisateur confirme la suppression
        $sql = "DELETE FROM contacts WHERE id = ?";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Liaison des variables à la déclaration préparée en tant que paramètres
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // Paramètres
            $param_id = $id;

            // Exécuter la déclaration préparée
            if (mysqli_stmt_execute($stmt)) {
                // Rediriger vers la page d'accueil après la suppression du contact
                header("location: index.php");
                exit();
            } else {
                echo "Erreur. Veuillez réessayer plus tard.";
            }

            // Fermer la déclaration
            mysqli_stmt_close($stmt);
        }

        // Fermer la connexion à la base de données
        mysqli_close($conn);
    }
} else {
    // Rediriger l'utilisateur vers la page d'accueil si l'ID du contact n'est pas défini dans l'URL
    header("location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un contact</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Confirmation de suppression</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . '?id=' . $id); ?>" method="post">
        <p>Êtes-vous sûr de vouloir supprimer ce contact ?</p>
        <div>
            <input type="submit" value="Oui">
            <a href="index.php">Non</a>
        </div>
    </form>
</body>
</html>
