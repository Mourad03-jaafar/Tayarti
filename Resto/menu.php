<?php
session_start();
include "connect.php";
$req = mysqli_query($conn,"SELECT * FROM `food`");
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
		<link rel="stylesheet" href="css/style.css">
		<title>Menu</title>
	</head>
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
	<body>
	<a href="#" id="scroll-top">&#8593;</a>
	<div class="navbar">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="menu.php">Menu</a></li>
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
		<div class="menu-container">

			<?php 
				while($tab = mysqli_fetch_row($req))
				{
					?>
					<div class='menu-item'>
						<img src='<?php echo $tab[4] ?>' alt=''>
						<span><?php echo $tab[2]?>TND</span>
						<h1><?php echo $tab[1] ?></h1>
						<p><?php echo $tab[3] ?></p>
						<input type="hidden" name="id" value="<?php echo $tab[0]?>">
						<a href="#" id='commander' class="commande-btn" 
							<?php if(isset($_SESSION["user"]))echo "data-login='true'"?>>
						Commander</a>
					</div>
				<?php
				}

			?>
		</div>
		<script src="js/main.js"></script>
	</body>

</html>