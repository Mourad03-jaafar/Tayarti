<?php
include('../model/dbconnection.php');
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<?php
include('header.php');
?>

<body>
	<?php
	include('navbar.php');
	?>
	<div class="text">
		<p>Économisez jusqu'à 25%*</p><br>
		<p>nouvelle norme pour les voyages Premium</p>
		<button>Reserve </button>
	</div>
	<img class="picture" src="../public/img/02.jpg" alt="Image Description">


	<form class="text-center border border-light p-5" method="post" action="recherche.php">
		<!-- Name -->
		<label for="exampleInputEmail1" class="labels">Departure City:</label>
		<input type="select" name="villedepart" class="form-control mb-4">

		<!-- Email -->
		<label for="exampleInputPassword1" class="labels">Destination City:</label>
		<input type="text" name="villearrivee" class="form-control mb-4">

		<!-- Sign in button -->
		<button class="btn btn-info btn-block" type="submit" name="submit-search">SEARCH</button>


	</form>



	 



	</section>
	</div>
	<?php
	include('script.php');
	?>


</body>

</html>