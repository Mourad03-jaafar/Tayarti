<?php



class Vol
{

	function __construct()
	{
		$this->conn = new mysqli("localhost", "root", "", "tayarti");
	}

	function vol_insert($vdepart, $varrivee, $date_depart, $npalace, $prix, $statut)
	{


		$stmt = $this->conn->prepare("INSERT Into vols (depart, destination, date_depart,num_place, prix, statut) values(?,?,?,?,?,?)");
		$stmt->bind_param("sssiis", $vdepart, $varrivee, $date_depart, $npalace, $prix, $statut);
		$stmt->execute();
	}

	function vol_update($id, $vdepart, $varrivee, $date_depart, $npalace, $prix, $statut)
	{

		mysqli_query($this->conn, "UPDATE `vols` SET `depart` = '$vdepart', `destination` = '$varrivee', `date_depart` = '$date_depart' , `num_place` = '$npalace', `prix` = '$prix'  , `statut` = '$statut' WHERE `id` = '$id'") or die(mysqli_error($this->conn));
	}
	function vol_show($villedepart, $villearrivee)
	{

		$query = "SELECT * from vols where depart='$villedepart' AND destination='$villearrivee' AND num_place > 0 AND statut = 'On-Going' ";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();
		return  $result;
	}
	function vol_show_id($id)
	{

		$query = "SELECT * from vols where id='$id'";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();
		return  $result;
	}
	function vol_show_all()
	{

		$query = "SELECT * from vols";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();
		return  $result;
	}
}
