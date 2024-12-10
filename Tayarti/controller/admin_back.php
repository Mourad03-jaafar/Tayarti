<?php
include('../model/volsclass.php');
include('../model/usersclass.php');

if (isset($_POST['save'])) {
    $date_depart = $_POST['date_depart'];
    $vdepart = $_POST['vdepart'];
    $varrivee = $_POST['varrivee'];
    $npalace = $_POST['npalace'];
    $statut = $_POST['statut'];
    $prix = $_POST['prix'];

    $vol = new Vol();
    $vol->vol_insert($vdepart, $varrivee, $date_depart, $npalace, $prix, $statut);


    header("location: ../view/admin.php");
}

if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $date_depart = $_POST['date_depart'];
    $vdepart = $_POST['vdepart'];
    $varrivee = $_POST['varrivee'];
    $npalace = $_POST['npalace'];
    $statut = $_POST['statut'];
    $prix = $_POST['prix'];

    $vol = new Vol();
    $vol->vol_update($id, $vdepart, $varrivee, $date_depart, $npalace, $prix, $statut);



    header("location: ../view/admin.php");
}

if (isset($_POST['update_admin_info'])) {

    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $user = new User();
    $user->user_update($id, $nom, $prenom, $mail, $password);



    header("location: ../view/login.php");
}
