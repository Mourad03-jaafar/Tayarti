<?php
include_once 'database.php';

// Définir les variables et les initialiser avec des valeurs vides
$nom = $prenom = $email = $telephone = '';
$nom_err = $prenom_err = $email_err = '';

// Traitement du formulaire lors de la soumission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Valider le nom
    if (empty(trim($_POST["nom"]))) {
        $nom_err = "Veuillez saisir le nom.";
    } else {
        $nom = trim($_POST["nom"]);
    }

    // Valider le prénom
    if (empty(trim($_POST["prenom"]))) {
        $prenom_err = "Veuillez saisir le prénom.";
    } else {
        $prenom = trim($_POST["prenom"]);
    }

    // Valider l'email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Veuillez saisir l'email.";
    } else {
        $email = trim($_POST["email"]);
        // Vérifier si l'email est au format valide
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Format d'email invalide.";
        }
    }

    // Valider le numéro de téléphone
    $telephone = trim($_POST["telephone"]);

    // Vérifier s'il n'y a pas d'erreur avant d'insérer dans la base de données
    if (empty($nom_err) && empty($prenom_err) && empty($email_err)) {
        // Préparer une instruction d'insertion
        $sql = "INSERT INTO contacts (nom, prenom, email, telephone) VALUES (?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Liaison des variables à la déclaration préparée en tant que paramètres
            mysqli_stmt_bind_param($stmt, "ssss", $param_nom, $param_prenom, $param_email, $param_telephone);

            // Paramètres
            $param_nom = $nom;
            $param_prenom = $prenom;
            $param_email = $email;
            $param_telephone = $telephone;

            // Exécuter la déclaration préparée
            if (mysqli_stmt_execute($stmt)) {
                // Rediriger vers la page d'accueil après l'ajout du contact
                header("location: index.php");
                exit();
            } else {
                echo "Erreur. Veuillez réessayer plus tard.";
            }

            // Fermer la déclaration
            mysqli_stmt_close($stmt);
        }
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
    <title>Ajouter un contact</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Ajouter un contact</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label>Nom:</label>
            <input type="text" name="nom" value="<?php echo $nom; ?>">
            <span><?php echo $nom_err; ?></span>
        </div>
        <div>
            <label>Prénom:</label>
            <input type="text" name="prenom" value="<?php echo $prenom; ?>">
            <span><?php echo $prenom_err; ?></span>
        </div>
        <div>
            <label>Email:</label>
            <input type="text" name="email" value="<?php echo $email; ?>">
            <span><?php echo $email_err; ?></span>
        </div>
        <div>
            <label>Téléphone:</label>
            <input type="text" name="telephone" value="<?php echo $telephone; ?>">
        </div>
        <div>
            <input type="submit" value="Ajouter">
            <input type="reset" value="Réinitialiser">
        </div>
    </form>
</body>
</html>
