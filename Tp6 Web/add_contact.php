<?php
require 'functions.php';

if($_SERVER["REQUEST_METHOD"]== "POST"){
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $email=$_POST["email"];
    $telephone=$_POST["telephone"];

    if(addContact($conn,$nom,$prenom,$email,$telephone)){
        echo "nouveau contact ajouté avec succès";
    }
    else{
        echo "Erreur" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Ajouter un contact</title>
</head>
<body>
    <h1>Ajouter un Contact</h1>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
    Nom : <input type="text" name="nom" required><br>
    Prénom : <input type="text" name="prenom" required><br>
    Email : <input type="email" name="email" required><br>
    Téléphone : <input type="text" name="telephone" required><br>
    <input type="submit" value="Ajouter">
</form>
<br>
<a href="index.php">Retour a la liste des contacts</a>
    
</body>
</html>