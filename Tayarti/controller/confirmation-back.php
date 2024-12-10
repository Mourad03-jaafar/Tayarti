<?php
include('../model/passager_class.php');
include('../model/reservation_class.php');
include('../model/volsclass.php');
session_start();


$id = $_GET['id'];

$reservation = new Reservation();
$res = $reservation->reservation_show_id($id);
$rowid = $res->fetch_assoc();



$vol = new Vol();
$res = $vol->vol_show_id($rowid['vol_id']);
$row1 = $res->fetch_assoc();



$passager = new Passager();
$res = $passager->passager_show_id($rowid['passager_id']);
$row2 = $res->fetch_assoc();
