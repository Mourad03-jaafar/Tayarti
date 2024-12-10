<?php


 class Passager{

		function __construct() {
			$this->conn = new mysqli("localhost","root","","gestion_reservations");
		}

		function passager_insert($nom, $prenom, $age, $pays, $adresse, $tele, $email, $passeport) {	


            $stmt = $this->conn->prepare("INSERT Into passager (nom, prenom, age, pays, adresse, tele, email, num_passport) values(?,?,?,?,?,?,?,?)");
            $stmt->bind_param("ssissisi", $nom, $prenom, $age, $pays, $adresse, $tele, $email, $passeport);
            $stmt->execute();

            $latest_id = $this->conn->insert_id;
            // $result = $stmt->get_result();
            return  $latest_id;
		}
		
		
		
		function passager_show_id($id) {

			$query = "SELECT * from passager where id='$id'";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			$result = $stmt->get_result();
			return  $result;
				
		}













}










?>