<?php
session_start();
if(isset($_SESSION["user"]))
{
	header("location:index.php");
}
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<title>Créer Un Compte</title>
</head>
<body>
	<div class="control-box">
		<i class="fas fa-cog fa-spin"></i>
	</div>
	<div class="color-box">
		<ul>
			<li data-color="#fe5f41"></li>
			<li data-color="#08535D"></li>
			<li data-color="#3a84df"></li>
			<li data-color="#4d312c"></li>
		</ul>
		<span><i class="fas fa-times"></i></span>
	</div>
	<a href="index.php" class="back">&#8592; Retour à l'accueil</a>
	<form class="signup-form" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
	<h1>Créer Un Compte</h1>
	<?php 
		if($_SERVER["REQUEST_METHOD"] === "POST")
		{
			$nom    = $_POST["nom"];
			$prenom = $_POST["prenom"];
			$email  = $_POST["email"];
			$mdp    = $_POST["mdp"];
			$query = mysqli_query($conn, "INSERT INTO users VALUES ('','$nom','$prenom','$email','$mdp','','',0)");
			echo "<div class='alert-success'>Compte créer avec succès. Vous pouvez maintenant <a href='login.php'>S'identifier</a></div>";
		}
		?>
	<div>
		<input type="text" placeholder="Nom" required name="nom" autocomplete="off">
	</div>
	<div>
		<input type="text" placeholder="Prénom" required name="prenom" autocomplete="off">
	</div>
	<div>
		<input type="email" placeholder="Email" required name="email" autocomplete="off">
	</div>
	<div>
		<input type="password" placeholder="Mot de passe" required name="mdp" autocomplete="off">
	</div>
	<div>
		<input type="submit" value="Créer">
	</div>
	Vous avez déjà un compte? <a href="login.php">S'identifier</a>
</form>
	<script src="js/main.js"></script>	

</body>
</html>