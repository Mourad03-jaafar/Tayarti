<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="css/style.css">
	<title>About</title>
</head>
<body>
	<a href="#" id="scroll-top">&#8593;</a>
	<div class="navbar">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="menu.php">Menu</a></li>
			<li><a href="#">About</a></li>
			<li><a href="contact.php">Contact</a></li>
		</ul>
		<div class="account">
			<?php 
			if(isset($_SESSION["user"]))
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
			else if(isset($_SESSION["admin"]))
			{
				echo "<a href='admin.php'>Dashboard</a>";
				echo "<a href='deconnect.php'>Déconnexion</a>";
			}
			else{
				echo "
				<a href='signup.php'>Créer Un compte</a>
				<a href='login.php'>S'identifier</a>";
			}
			?>

		</div>
	</div>
	<h1>About Page</h1>
</body>
</html>