<?php
include('../model/passager_class.php');
include('../model/reservation_class.php');
include('../model/volsclass.php');
session_start();


$id = $_GET['id'];

$reservation = new Reservation();
$res = $reservation -> reservation_show_id($id);
$rowid = $res->fetch_assoc(); 

// $query= "SELECT * FROM reservation WHERE id=?";
// $stmt = $conn->prepare($query);
// $stmt->bind_param("i",$id);
// $stmt->execute();
// $result= $stmt->get_result();





$vol = new Vol();
$res = $vol -> vol_show_id($rowid['vol_id']);
$row1 = $res->fetch_assoc();

// $query= "SELECT * FROM vols WHERE id=?";
// $stmt = $conn->prepare($query);
// $stmt->bind_param("i",$rowid['vol_id']);
// $stmt->execute();
// $result= $stmt->get_result();
// $row1 = $result->fetch_assoc();

// echo $row1['depart'];


$passager = new Passager();
$res = $passager -> passager_show_id($rowid['passager_id']);
$row2 = $res->fetch_assoc();




// $query= "SELECT * FROM passager WHERE id=?";
// $stmt = $conn->prepare($query);
// $stmt->bind_param("i",$rowid['passager_id']);
// $stmt->execute();
// $result= $stmt->get_result();
// $row2 = $result->fetch_assoc();


// echo $row2['nom'];








?>

