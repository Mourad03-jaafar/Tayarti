<?php
require 'database.php';

function getContacts($conn){
    $sql="SELECT id,nom,prenom,email,telephone FROM contacts";
    return $conn->query($sql);
}

function getContactsById($conn, $id){
    $sql="SELECT * FROM contacts WHERE id=$id";
    return $conn->query($sql)->fetch_assoc();
}

function addContact($conn, $nom, $prenom, $email, $telephone){
    $sql="INSERT INTO contacts (nom,prenom,email,telephone) VALUES ('$nom', '$prenom', '$email', '$telephone')";
    return $conn->query($sql);
}

function updateContact($conn, $id, $nom, $prenom, $email, $telephone){
    $sql="UPDATE contacts SET nom='$nom', prenom='$prenom', email='$email', telephone='$telephone' WHERE id=$id";
    return $conn->query($sql);
}

function deleteContact($conn, $id){
    $sql="DELETE FROM contacts WHERE id=$id";
    return $conn->query($sql);
}
?>