<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "L'adresse e-mail saisie n'est pas valide.";
        exit; 
    }

    echo "<!DOCTYPE html>
          <html lang='fr'>
          <head>
              <meta charset='UTF-8'>
              <meta name='viewport' content='width=device-width, initial-scale=1.0'>
              <title>Confirmation</title>
          </head>
          <body>
              <h2>Merci pour votre message !</h2>
              <p>Nom : $nom</p>
              <p>Prénom : $prenom</p>
              <p>Adresse E-mail : $email</p>
              <p>Message : $message</p>
          </body>
          </html>";
} else {
    header("Location: index.html");
    exit; 
}
?>
