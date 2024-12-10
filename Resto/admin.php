<?php 
include "connect.php";
session_start();
$req = mysqli_query($conn, "SELECT nom, prenom FROM users WHERE priority = 1");
$res = mysqli_fetch_row($req);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<title>Admin Panel</title>
</head>
<body>
	<div class="account-wrap">
		<div class="account-sidebar">
			<div class="account-info">
				<div class="account-profile-img" style="background-image: url(img/users/admin.png)"></div>
				<span><?php echo ucfirst($res[0]." ".$res[1]) ?></span>				
			</div>

			<ul>
				<li 
					<?php if(!isset($_GET["tab"]) || $_GET["tab"] === "compte") echo "class='active'" ?>>
					<i class="fas fa-user"></i><a href="?tab=compte">Compte</a>
				</li>

				<li 
					<?php if(isset($_GET["tab"]) && $_GET["tab"] === "utilisateur") echo "class='active'" ?>>
					<i class="fas fa-users-cog"></i><a href="?tab=utilisateur">Gestion d'utilisateur</a>
				</li>
				<li 
					<?php if(isset($_GET["tab"]) && $_GET["tab"] === "commande") echo "class='active'" ?>>
					<i class="fas fa-shopping-cart"></i><a href="?tab=commande">Gestion de commandes</a>
				</li>
				<li 
					<?php if(isset($_GET["tab"]) && $_GET["tab"] === "produit") echo "class='active'" ?>>
					<i class="fas fa-list-ul"></i><a href="?tab=produit">Listes Des Produits</a>
				</li>
				<li 
					<?php if(isset($_GET["tab"]) && $_GET["tab"] === "ajout") echo "class='active'" ?>>
					<i class="fas fa-plus-circle"></i><a href="?tab=ajout">Ajouter Des produits</a>
				</li>
				<li 
					<?php if(isset($_GET["tab"]) && $_GET["tab"] === "reservetable") echo "class='active'" ?>>
					<i class="fas fa-calendar"></i><a href="?tab=reservetable">Reservations des tables</a>
				</li>
				<li 
					<?php if(isset($_GET["tab"]) && $_GET["tab"] === "statistiques") echo "class='active'" ?>>
					<i class="far fa-chart-bar"></i><a href="?tab=statistiques">Statistiques</a>
				</li>
				<li 
					<?php if(isset($_GET["tab"]) && $_GET["tab"] === "annulercommande") echo "class='active'" ?>>
					<i class="fas fa-times"></i><a href="?tab=annulercommande">Annuler une commande</a>
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
					<?php 
						if($_SERVER["REQUEST_METHOD"] === "POST")
						{
							$email = $_POST["email"];
							$oldpwd = $_POST["oldpassword"];
							$newpwd = $_POST["newpassword"];
							if($newpwd == "")
							{
								$newpwd = $oldpwd;
							}
							$req = mysqli_query($conn,"UPDATE users SET email = '$email', mdp = '$newpwd' WHERE priority = 1");
						}
					?>
					<h1>Compte</h1>
					<?php 
						$req = mysqli_query($conn, "SELECT email, mdp FROM users WHERE priority = 1");
						$row = mysqli_fetch_row($req);
					?>
						<div class="row">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" id="email" value="<?php echo $row[0] ?>"  placeholder="Email" name="email" autocomplete="off">
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<label for="mdp">Ancien Mot de passe</label>
								<input type="password" id="mdp" value="<?php echo $row[1] ?>" placeholder="Mot de passe" name="oldpassword" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="mdp,">Nouveau mot de passe</label>
								<input type="password" id="mdpn" value=""  placeholder="Mot de passe" name="newpassword" autocomplete="off">
							</div>
						</div>
						<input type="submit" value="Enregistrer">

					</form>

					<?php
				}
				else if($_GET["tab"] === "motdepasse")
				{
					?>
					<form method="POST" action="">
						<h1>Mot de passe</h1>
						
						
						<input type="submit" value="Enregistrer">
					</form>
					<?php
				}
				else if ($_GET["tab"] === "utilisateur") 
				{
					 ?>
					 <h1>Gestion D'utilisateur</h1>
				<?php
					$req = mysqli_query($conn, "SELECT * FROM users WHERE priority = 0");
					if(mysqli_num_rows($req) !== 0)
					{
						echo "<table>
						<tr>
							<th>Nom</th>
							<th>Prénom</th>
							<th>Email</th>
						</tr>";
					}
					else{
						echo "<p>Pas d'utilisateur jusqu'à maintenant.";
					}
					while($tab = mysqli_fetch_array($req))
					{
						echo 
						"
							<tr>
								<td>$tab[1]</td>
								<td>$tab[2]</td>
								<td>$tab[3]</td>
							</tr>
						";
					}
					?>
					</table>
					<?php
				}
				else if($_GET["tab"] === "produit")
				{
					if(isset($_GET["action"]) && $_GET["action"] === "modifier")
					{
						echo "<h1>Modifier Un Produit</h1>";
						$id    = $_GET["id"];
						$query = mysqli_query($conn, "SELECT * FROM food WHERE food_id = $id");
						$res   = mysqli_fetch_row($query);
						if($_SERVER["REQUEST_METHOD"] === "POST")
						{
							$nom  = $_POST["nom"];
							$prix = $_POST["prix"];
							$desc = $_POST["desc"];
							$img  = $_FILES["img"]["name"];
							if($img !== "")
							{
								$destination = "img/users/".$_FILES["img"]["name"];
								move_uploaded_file($_FILES["img"]["tmp_name"], $destination);
								$req = mysqli_query($conn, "
									UPDATE food 
									SET food_name = '$nom', food_price = $prix, food_description = '$desc', food_img = '$destination'
									WHERE food_id = $id");
							}
							else
							{
								$req = mysqli_query($conn, "
								UPDATE food 
								SET food_name = '$nom', food_price = $prix, food_description = '$desc'
								WHERE food_id = $id");	
							}

						
						}
						?>

						<form action="<?php echo '?tab=produit&action=modifier&id='.$_GET["id"] ?>" method="POST" enctype="multipart/form-data">
							<div class="row">
								<div class="form-group">
									<label for="nom">Nom de produit</label>
									<input type="text" id="nom" value="<?php echo $res[1] ?>"  placeholder="Prix de produit" name="nom" autocomplete="off">
								</div>
								<div class="form-group">
									<label for="prix">Prix de produit</label>
									<input type="number" id="nom" value="<?php echo $res[2] ?>"  placeholder="Prix de produit" name="prix" autocomplete="off">
								</div>	
							</div>
							<div class="row">
								<div class="form-group">
									<label for="desc">Description du produit</label>
									<textarea placeholder="" name="desc" id="desc" value="<?php echo $res[3] ?>">Description du produit</textarea>
								</div>
								<div class="form-group">
									<label for="prix">Image de produit</label>
									<img src="<?php echo $res[4] ?>" alt="" width="100">
									<input type="file" id="img" value=""  placeholder="Image de produit" name="img" autocomplete="off">
								</div>
							</div>
							<input type="submit" value="Modifier">
						</form>

						<?php
					}
					else
					{
						echo "<h1>Listes des Produits</h1>
								<div class='menu-container'>
						";
						$req = mysqli_query($conn, "SELECT * FROM food");
						while($tab = mysqli_fetch_array($req))
						{
							echo
						"
						<div class='menu-item'>
							<img src='$tab[4]' alt=''>
							<span>$tab[2]TND</span>
							<h1>$tab[1]</h1>
							<p>$tab[3]</p>
							<form action='supprimerproduit.php' method='POST'>
								<input type='hidden' value='$tab[0]' name='id'>
								<input type='submit' id='delete' value='Supprimer'>
								<a id='modifier' href='?tab=produit&action=modifier&id=$tab[0]'>Modifier</a>
						</div>
						";
						}
						echo "</div>";						
					}
				

				}
				else if($_GET["tab"] === "ajout")
				{
				
					echo "<h1>Ajouter des Produits</h1>";
					?>
					<form class="" method="POST" action="<?php echo $_SERVER["PHP_SELF"]."?tab=ajout" ?>" enctype="multipart/form-data">
						<?php 

							if($_SERVER["REQUEST_METHOD"] === "POST")
							{
								$nom    = $_POST["nom"];
								$prix   = $_POST["prix"];
								$desc   = $_POST["desc"];
								$photo  = $_FILES["img"]["name"];
								$destination = "img/users/".$_FILES["img"]["name"];
								move_uploaded_file($_FILES["img"]["tmp_name"], $destination);
								$req = mysqli_query($conn, "INSERT INTO food VALUES('','$nom','$prix','$desc','$destination')");
							}

						?>
						<div class="row">
							<div class="form-group">
								<label for="nom">Nom du produit</label>
								<input type="text" id="nom" value="" placeholder="Nom du produit" name="nom" required autocomplete="off">
							</div>
							<div class="form-group">
								<label for="prix">Prix de produit</label>
								<input type="number" id="prix" value=""  placeholder="Prix de produit" name="prix" required autocomplete="off">
							</div>
						</div>
						
						<div class="row">
							<div class="form-group">
								<label for="desc">Description du produit</label>
								<input type="text" id="desc" value=""  placeholder="Description du produit" name="desc" required autocomplete="off">
							</div>
						</div>
						<div class="form-group">
								<label for="file">Photo du produit</label>
								<input type="file" id="file" nom="file" name="img">
						</div>
						<input type="submit" value="Ajouter">

					</form>
					<?php
				}




				else if($_GET["tab"] === "commande")
				{
					?>
					<h1>Gestion des commandes</h1>
					<?php
						$query  = mysqli_query($conn, "SELECT * FROM commande WHERE commande_confirm = 1");
						$num    = mysqli_num_rows($query);
						echo "<p>".$num." commandes au total.</p>";
						if($num !== 0)
						{
							echo "
							<table>
							<thead>
								<th>Commande N°</th>
								<th>Effecté Par</th>
								<th>Produit</th>
								<th>Prix</th>
								<th></th>
							</thead>
							";
						}
						while($tab = mysqli_fetch_array($query))
						{
							echo "<tr>";
							$query1     = mysqli_query($conn, "SELECT * FROM users WHERE id      = '$tab[2]'");
							$query2     = mysqli_query($conn, "SELECT * FROM food  WHERE food_id = '$tab[1]'");
							while($tab1 = mysqli_fetch_array($query1))
							{
								while($tab2 = mysqli_fetch_array($query2))
								{
									echo "
									<td>$tab[0]</td>
									<td>$tab1[1] $tab1[2]</td>
									<td>$tab2[1]</td>
									<td>$tab2[2]TND</td>
									<td><a href='confirmevente.php?userid=$tab[2]&food_id=$tab[1]&commandeid=$tab[0]'>Confirmer</a></td>"
									;
								}
							}
							echo "</tr>";
						}
					echo "</table>";
				}
				else if($_GET["tab"] === "statistiques")
				{
					echo "<h1>Statistiques</h1>";
					$query1 = mysqli_query($conn, "SELECT * FROM users WHERE priority = 0");
					$query2 = mysqli_query($conn, "SELECT * FROM ventes");
					$sum = 0;
					while($tab = mysqli_fetch_array($query2))
					{
						$query3 = mysqli_query($conn, "SELECT * FROM food WHERE food_id = $tab[2]");
						$sum   += mysqli_fetch_row($query3)[2];
					}
					?>
					<div class="statics">
						<div class="static-item">
							<span>Utilisateurs Totales</span>
							<h1><?php echo mysqli_num_rows($query1); ?></h1>
						</div>
						<div class="static-item">
							<span>Commande Totales</span>
							<h1><?php echo mysqli_num_rows($query2); ?></h1>
						</div>
						<div class="static-item">
							<span>Gains Totales</span>
							<h1><?php echo $sum; ?> TND</h1>
						</div>
					</div>
					<?php
				}
				
				else if($_GET["tab"] === "reservetable")
				{
					echo "<h1>Listes des Reservations des tables</h1>";
					$req = mysqli_query($conn, "SELECT * FROM reservetable");
					$num = mysqli_num_rows($req);
					echo "<p>$num Reservations Totales.</p>";
					if($num !== 0)
					{
						echo "<table>
						<thead>
							<th>Nom</th>
							<th>Prénom</th>
							<th>Numéro de téléphone</th>
							<th>Nombres de personnes</th>
							<th>Date</th>
							<th></th>
						</thead>
						";
					}

					while($tab = mysqli_fetch_array($req))
					{
						echo "
						<tr>
							<td>$tab[1]</td>
							<td>$tab[2]</td>
							<td>$tab[3]</td>
							<td>$tab[4]</td>
							<td>$tab[5]</td>
							<td>";
							if($tab[6] == 1)
							{
								echo 'Déjà Confirmée';
							}
							else
							{
								echo "<a href='confirmtable.php?id=$tab[0]'>Confirmer</a></td>";
							}
						"</tr>";
					}
					echo "</table>";
				}
				else if($_GET["tab"] === "annulercommande")
				{
					echo "<h1>Annuler une Commande</h1>";
					$req = mysqli_query($conn, "SELECT * FROM ventes");
					echo "
					<table>
						<thead>
							<th>Commande N°</th>
							<th>Effecté Par</th>
							<th>Produit</th>
							<th>Prix</th>
							<th></th>
						</thead>
					";
					while($tab = mysqli_fetch_array($req))
					{
						$req1 = mysqli_query($conn, "SELECT * FROM users WHERE id = $tab[1]");
						$req2 = mysqli_query($conn, "SELECT * FROM food  WHERE food_id = $tab[2]");
						while($tab1 = mysqli_fetch_array($req1))
						{
							while($tab2 = mysqli_fetch_array($req2))
							{
								echo "
								<tr>
									<td>$tab[0]</td>
									<td>$tab1[1] $tab1[2]</td>
									<td>$tab2[1]</td>
									<td>$tab2[2] TND</td>
									<td><a href='annulercommande.php?commandeid=$tab[0]'>Annuler</a></td>
								</tr>
								";
							}
						}
					}
				}

				?>

		</div>
	</div>		
</body>
</html>