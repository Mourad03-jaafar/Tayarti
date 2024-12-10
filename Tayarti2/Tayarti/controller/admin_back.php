<?php
include('../model/volsclass.php');
include('../model/usersclass.php');

if(ISSET($_POST['save'])){
    $date_depart = $_POST['date_depart'];
    $vdepart = $_POST['vdepart'];
    $varrivee = $_POST['varrivee'];
    $npalace = $_POST['npalace'];
    $statut = $_POST['statut'];
    $prix = $_POST['prix'];

    $vol = new Vol();
  $vol -> vol_insert($vdepart, $varrivee,$date_depart, $npalace,$prix,$statut);
    
    // mysqli_query($conn, "INSERT INTO `vols` VALUES('$vdepart', '$varrivee', '$date_depart', '$npalace', '$prix', '$statut')") or die(mysqli_error());
    
    header("location: ../view/admin.php");
}

if(ISSET($_POST['update'])){
  
    $id = $_POST['id'];
    $date_depart = $_POST['date_depart'];
    $vdepart = $_POST['vdepart'];
    $varrivee = $_POST['varrivee'];
    $npalace = $_POST['npalace'];
    $statut = $_POST['statut'];
    $prix = $_POST['prix'];

    $vol = new Vol();
    $vol -> vol_update($id,$vdepart, $varrivee,$date_depart, $npalace,$prix,$statut);
    
    // mysqli_query($conn, "UPDATE `vols` SET `depart` = '$vdepart', `destination` = '$varrivee', `date_depart` = '$date_depart' , `num_place` = '$npalace', `prix` = '$prix'  , `statut` = '$statut' WHERE `id` = '$id'") or die(mysqli_error());

    header("location: ../view/admin.php");
}

if(ISSET($_POST['update_admin_info'])){
  
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $user = new User();
    $user -> user_update($id,$nom, $prenom,$mail, $password);
   
    
    // mysqli_query($conn, "UPDATE `users` SET `nom` = '$nom', `prenom` = '$prenom', `email` = '$mail' , `password` = '$password' WHERE `id_user` = '$id'") or die(mysqli_error());
    // header("location: admin.php");
    header("location: ../view/login.php");
}










// ?>