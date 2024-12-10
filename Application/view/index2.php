<?php
include('../model/dbconnection.php');
session_start();
				

?>
<!DOCTYPE html>
<html lang="en">

<?php
include('heder.php');
?>



<body>
	<?php
	include('navbar.php');
	?>


	<!-- Default form subscription -->
	<form class="text-center border border-light p-5" method="post" action="recherche.php">
		<!-- Name -->
		<label for="exampleInputEmail1">Ville de départ</label>
		<input type="text" name="villedepart" class="form-control mb-4">

		<!-- Email -->
		<label for="exampleInputPassword1">Ville d arrivée</label>
		<input type="text" name="villearrivee" class="form-control mb-4">

		<!-- Sign in button -->
		<button class="btn btn-info btn-block" type="submit" name="submit-search">Chercher les vols</button>


	</form>

	 



	</section>
	</div>
	<?php
	include('script.php');
	?>


</body>

</html>