<?php
include('../model/passager_class.php');
include('../model/reservation_class.php');


session_start();

								if(isset($_POST['add'])){
								$nom = $_POST['nom'];
								$prenom = $_POST['prenom'];
								$age = $_POST['age'];
								$pays = $_POST['pays'];
								$adresse = $_POST['adresse'];
								$tele = $_POST['tele'];
								$email = $_POST['email'];
								$passeport = $_POST['passeport'];


								$id = $_POST['id'];
							

								$passager = new Passager();
								$latest_id = $passager->passager_insert($nom, $prenom, $age, $pays, $adresse, $tele, $email, $passeport);
								

								
								$id_user = $_SESSION["id_user"];
								$date = date('Y-m-d H:i:s');
								
								$reservation = new Reservation();

								$latest_id_reservation = $reservation->reservation_insert($id,$latest_id,$id_user,$date);
								
								
								header("Location: ../view/confirmation.php?id=$latest_id_reservation");

								}
								
								

								?>