<?php
session_start();
include "connect.php";
$query  = mysqli_query($conn,"SELECT * FROM users WHERE email = '$_SESSION[user]'");
$result = mysqli_fetch_row($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<title>Compte</title>
</head>
<body>
	<div class="account-wrap">
		<div class="account-sidebar">
			<div class="account-info">
				<div class="account-profile-img" <?php if($result[6] !== "") echo "style=background-image:url($result[6])"; ?>></div>
				<span><?php echo ucfirst($_SESSION["nom"]) . " " . ucfirst($_SESSION["prenom"]); ?></span>				
			</div>

			<ul>
				<li <?php if(!isset($_GET["tab"]) || $_GET["tab"] === "compte") echo "class='active'" ?>>
					<i class="fas fa-user"></i><a href="?tab=compte">Compte</a>
				</li>
				<li <?php if(isset($_GET["tab"]) && $_GET["tab"] === "commande") echo "class='active'" ?>>
					<i class="fas fa-shopping-cart"></i><a href="?tab=commande">Vos commandes</a>
				</li>
				<li <?php if(isset($_GET["tab"]) && $_GET["tab"] === "motdepasse") echo "class='active'" ?>>
					<i class="fas fa-key"></i><a href="?tab=motdepasse">Changer mot de passe</a>
				</li>
				<li>
					<i class="fas fa-undo"></i><a href="index.php">Retour à l'accueil</a>
				</li>
			</ul>
		</div>
		<div class="account-content">
			<?php 
				if(!isset($_GET["tab"]) || $_GET["tab"] === "compte")
				{
					?>
					<form class="account-form" method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>" enctype="multipart/form-data">
					<h1>Compte</h1>
					<?php
						
						if($_SERVER["REQUEST_METHOD"] === "POST")
						{
							$nom    = $_POST["nom"];
							$prenom = $_POST["prenom"];
							$email  = $_POST["email"];
							$tel    = $_POST["tel"];
							$file   = $_FILES["img"];
							if($file !== "")
							{
								$filelocation = $_FILES["img"]["tmp_name"];
								$destination = "img/users/".$_FILES["img"]["name"];
								move_uploaded_file($_FILES["img"]["tmp_name"], $destination);								
								$query  = mysqli_query($conn,"
								UPDATE users SET nom = '$nom', prenom = '$prenom', email = '$email', tel = '$tel', profile_image = '$destination' WHERE email = '$_SESSION[user]'");

							}
							else
							{
								$query  = mysqli_query($conn,"
								UPDATE users SET nom = '$nom', prenom = '$prenom', email = '$email', tel = '$tel' WHERE email = '$_SESSION[user]'");
							}

											
						}

					?>
						<div class="row">
						<?php 
							$query  = mysqli_query($conn,"SELECT * FROM users WHERE email = '$_SESSION[user]'");
							$result = mysqli_fetch_row($query);

						?>
							<div class="form-group">
								<label for="nom">Nom</label>
								<input type="text" id="nom" value="<?php echo $result[1] ?>" placeholder="Nom" name="nom">
							</div>
							<div class="form-group">
								<label for="prenom">Prénom</label>
								<input type="text" id="prenom" value="<?php echo $result[2] ?>"  placeholder="Prénom" name="prenom">
							</div>
						</div>
						
						<div class="row">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" id="email" value="<?php echo $result[3] ?>"  placeholder="Email" name="email">
							</div>
							<div class="form-group">
								<label for="phone">Numéro de téléphone</label>
								<input type="phone" id="phone"  placeholder="Téléphone"  name="tel">
							</div>
						</div>
						<div class="form-group">
								<label for="file">Photo de profile</label>
								<input type="file" id="file" nom="file" name="img">
						</div>
						<input type="submit" value="Enregistrer">

					</form>

					<?php
				}
				else if($_GET["tab"] === "motdepasse")
				{
					?>
					<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]."?tab=motdepasse" ?>">
						<h1>Mot de passe</h1>
						<?php 
						if($_SERVER["REQUEST_METHOD"] === "POST")
						{
							$oldpwd = $_POST["oldpassword"];
							$new    = $_POST["newpassword"];
							$req = mysqli_query($conn, "UPDATE users SET mdp = $new WHERE email = '$_SESSION[user]'");
						}
						?>
						<div class="row">
							<div class="form-group">
								<label for="mdp">Ancien Mot de passe</label>
								<?php 
									$req = mysqli_query($conn, "SELECT mdp FROM users WHERE email = '$_SESSION[user]'");
									$res = mysqli_fetch_row($req);
								?>
								<input type="password" id="mdp" 	value="<?php echo $res[0] ?>" placeholder="Mot de passe" name="oldpassword">
							</div>
							<div class="form-group">
								<label for="mdp,">Nouveau mot de passe</label>
								<input type="password" id="mdpn" value=""  placeholder="Mot de passe" name="newpassword">
							</div>
						</div>
						
						<input type="submit" value="Enregistrer">
					</form>
					<?php
				}
				else if($_GET["tab"] === "commande")
				{   ?>
						<h1>Vos Commandes</h1>
					<?php
					$query  = mysqli_query($conn, "SELECT * FROM users WHERE email = '$_SESSION[user]'");
					$id     = mysqli_fetch_row($query)[0];
					$query1 = mysqli_query($conn, "SELECT * FROM commande WHERE user_id = '$id'");
					echo "<p>Vous Avez ".mysqli_num_rows($query1)." Commandes.</p>";
					echo "
					<table>
						<thead>
							<th>Produit</th>
							<th>Prix</th>
							<th></th>
							<th></th>
						</thead>
					";
					while($tab = mysqli_fetch_array($query1))
					{
						echo "<tr>";
						$query2 = mysqli_query($conn, "SELECT * FROM food WHERE food_id = '$tab[1]'");
						while($tab1 = mysqli_fetch_array($query2))
						{
							echo "
							<td>$tab1[1]</td>
							<td>$tab1[2]TND</td>
							<td><img src='$tab1[4]' width=100></td>
							<td>";
							if($tab[3] == 1)
							{
								echo "Confirmée";
							}
							else
							{
								echo "<a href='supprimercommande.php?commandeid=$tab[0]'>Supprimer</a> - 
								<a href='confirmercommande.php?commandeid=$tab[0]'>Confirmer</a>";
							}

							"</td>";
						}
						echo "</tr>";
					}
					echo "</table>";
				}


			?>

		</div>
	</div>																									
</body>
</html>