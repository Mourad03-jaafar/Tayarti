<?php 

include "connect.php";

$nom = $_GET["nom"];
$prenom = $_GET["prenom"];
$tel = $_GET["tel"];
$nbr = $_GET["nbr"];
$date = $_GET["date"];

$query = mysqli_query($conn, "SELECT * FROM reservetable WHERE date = '$date'");

if(mysqli_num_rows($query) == 1)
{
	echo "0";
}
else if(strtotime($date) < strtotime(date("Y-m-d")))
{
	echo "-1";
}
else
{
$query1 = mysqli_query($conn, "INSERT INTO reservetable values('','$nom','$prenom','$tel','$nbr','$date','0')");

echo "
<div class=reussite>
	<h1>Reservation résussite !</h1>
	<div class=info>
		<div><span>Nom :</span> $nom</div>
		<div><span>Prenom :</span> $prenom</div>
		<div><span>Numéro de téléphone :</span> $tel</div>
		<div><span>Nombre de personne :</span> $nbr</div>
		<div><span>Date :</span> $date</div>
	</div>
</div>
";	
}
?>