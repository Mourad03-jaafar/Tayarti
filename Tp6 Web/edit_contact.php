<?php
require 'functions.php';


if(isset($_GET["id"])){
    $contact = getContactsById($conn, $_GET["id"]);
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $id=$_POST["id"];
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $email=$_POST["email"];
    $telephone=$_POST["telephone"];

    if(updateContact($conn, $id, $nom, $prenom, $email, $telephone)){
        echo "Contact mis à jour avec succès";
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
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Modidier un contact</title>
</head>
<body>
    <h1>Modifier un Contact</h1>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
    <input type="hidden" name="id" value="<?php echo $contact['id']; ?>">
    Nom : <input type="text" name="nom"value="<?php echo $contact['nom']; ?>" required><br>
    Prenom: <input type="text" name="prenom"value="<?php echo $contact['prenom']; ?>" required><br>
    Email: <input type="email" name="email"value="<?php echo $contact['email']; ?>" required><br>
    Telephone: <input type="text" name="telephone"value="<?php echo $contact['telephone']; ?>" required><br>
    <input type="submit" value="Modifier">
</form>
<a href="index.php">Retour a la liste des contacts</a>
</body>
</html>