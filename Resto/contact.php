<?php 
session_start();
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<title>Contacter Nous</title>
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
	<div class="navbar">
			<ul>
				<li><a href="./">Home</a></li>
				<li><a href="menu.php">Menu</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>
			<div class="account">
				<?php 
				if(isset($_SESSION["admin"]))
				{
					echo "<a href='admin.php'>Dashboard</a>";
					echo "<a href='deconnect.php'>Déconnexion</a>";
				}
				else if(isset($_SESSION["user"]))
				{

					echo "<a href='account.php'>Compte</a>";
					echo "<a href='deconnect.php'>Déconnexion</a>";
					echo "
					<a href='account.php?tab=commande'>
						<span href='#' id='shop'>
							<span class='shop-count'>0</span>
							<i class='fas fa-shopping-cart'></i>
						</span>
					</a>"
					;
				}
				else{
					echo "
					<a href='signup.php'>Créer Un compte</a>
					<a href='login.php'>S'identifier</a>";
				}
				?>
	
			</div>
			
		</div>

		<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" class="contact">
			<h1>Contacter Nous</h1>
			<?php 
			if($_SERVER["REQUEST_METHOD"] === "POST")
			{
				$nom    = $_POST["nom"];
				$prenom = $_POST["prenom"];
				$sujet  = $_POST["sujet"];
				$mail   = $_POST["email"];
				$msg    = $_POST["message"];
				$req = mysqli_query($conn, "INSERT INTO contact VALUES('','$nom','$prenom','$sujet','$mail','$msg')");
				echo "<p>Votre message à été envoyée.</p>";
			}

			?>
			<div class="row">
				<div class="form-group">	
					<label for="nom">Nom</label>
					<input type="text" id="nom" name="nom" placeholder="Votre Nom" autocomplete="off" required>
				</div>
				<div class="form-group">
					<label for="prenom">Prénom</label>
					<input type="text" id="prenom" name="prenom" placeholder="Votre Prénom" required autocomplete="off">
				</div>
			</div>
			<div class="row">
				<div class="form-group">
					<label for="sujet">Sujet</label>
					<input type="text" id="sujet" name="sujet" placeholder="Votre Sujet" required autocomplete="off">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" id="email" name="email" placeholder="Votre Email" required autocomplete="off">
				</div>
			</div>
				
				<div class="form-group">
					<label for="message">Message</label>
					<textarea name="message" id="message" placeholder="Votre Message..." required autocomplete="off"></textarea>
				</div>	
			<input type="submit" value="Envoyer">
		</form>
	<script src="js/main.js"></script>	
</body>
</html>