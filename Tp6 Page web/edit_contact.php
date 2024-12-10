<?php
include('../database.php');
session_start();

// Vérifier si l'ID du contact à modifier est défini dans l'URL
if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
    // Récupérer l'ID du contact à modifier depuis l'URL
    $id = trim($_GET['id']);

    // Préparer une instruction SELECT pour récupérer les détails du contact
    $sql = "SELECT * FROM contacts WHERE id = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Liaison des variables à la déclaration préparée en tant que paramètres
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Paramètres
        $param_id = $id;

        // Exécuter la déclaration préparée
        if (mysqli_stmt_execute($stmt)) {
            // Récupérer le résultat de la requête
            $result = mysqli_stmt_get_result($stmt);

            // Vérifier s'il y a des résultats
            if (mysqli_num_rows($result) == 1) {
                // Récupérer la ligne de résultat comme un tableau associatif
                $row = mysqli_fetch_assoc($result);

                // Récupérer les valeurs des champs
                $nom = $row['nom'];
                $prenom = $row['prenom'];
                $email = $row['email'];
                $telephone = $row['telephone'];
            } else {
                // Rediriger l'utilisateur vers la page d'accueil si l'ID du contact n'existe pas
                header("location: index.php");
                exit();
            }
        } else {
            echo "Erreur. Veuillez réessayer plus tard.";
        }

        // Fermer la déclaration
        mysqli_stmt_close($stmt);
    }

    // Fermer la connexion à la base de données
    mysqli_close($conn);
} else {
    // Rediriger l'utilisateur vers la page d'accueil si l'ID du contact n'est pas défini dans l'URL
    header("location: index.php");
    exit();
}

// Traitement du formulaire de modification lors de la soumission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les nouvelles valeurs des champs du formulaire
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];

    // Préparer une instruction UPDATE pour mettre à jour les informations du contact
    $sql = "UPDATE contacts SET nom=?, prenom=?, email=?, telephone=? WHERE id=?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Liaison des variables à la déclaration préparée en tant que paramètres
        mysqli_stmt_bind_param($stmt, "ssssi", $param_nom, $param_prenom, $param_email, $param_telephone, $param_id);

        // Paramètres
        $param_nom = $nom;
        $param_prenom = $prenom;
        $param_email = $email;
        $param_telephone = $telephone;
        $param_id = $id;

        // Exécuter la déclaration préparée
        if (mysqli_stmt_execute($stmt)) {
            // Rediriger vers la page d'accueil après la mise à jour du contact
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un contact</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Modifier un contact</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div>
            <label>Nom:</label>
            <input type="text" name="nom" value="<?php echo $nom; ?>">
        </div>
        <div>
            <label>Prénom:</label>
            <input type="text" name="prenom" value="<?php echo $prenom; ?>">
        </div>
        <div>
            <label>Email:</label>
            <input type="text" name="email" value="<?php echo $email; ?>">
        </div>
        <div>
            <label>Téléphone:</label>
            <input type="text" name="telephone" value="<?php echo $telephone; ?>">
        </div>
        <div>
            <input type="submit" value="Modifier">
            <a href="index.php">Annuler</a>
        </div>
    </form>
</body>
</html>
