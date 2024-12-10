<?php
include('../database.php');
session_start();

// Fonction pour ajouter un nouveau contact
function ajouterContact($nom, $prenom, $email, $telephone) {
    global $conn;

    $sql = "INSERT INTO contacts (nom, prenom, email, telephone) VALUES (?, ?, ?, ?)";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssss", $nom, $prenom, $email, $telephone);
        if (mysqli_stmt_execute($stmt)) {
            return true;
        } else {
            return false;
        }
        mysqli_stmt_close($stmt);
    }
}


// Fonction pour mettre à jour un contact
function mettreAJourContact($id, $nom, $prenom, $email, $telephone) {
    global $conn;

    $sql = "UPDATE contacts SET nom=?, prenom=?, email=?, telephone=? WHERE id=?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssssi", $nom, $prenom, $email, $telephone, $id);
        if (mysqli_stmt_execute($stmt)) {
            return true;
        } else {
            return false;
        }
        mysqli_stmt_close($stmt);
    }
}

// Fonction pour supprimer un contact
function supprimerContact($id) {
    global $conn;

    $sql = "DELETE FROM contacts WHERE id=?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)) {
            return true;
        } else {
            return false;
        }
        mysqli_stmt_close($stmt);
    }
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>
