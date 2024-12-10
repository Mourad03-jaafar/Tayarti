<?php
session_start();
include "connect.php";
$req = mysqli_query($conn,"SELECT * FROM `food` limit 0, 5");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="css/style.css">
	<title>Restaurant</title>
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
	<a href="#" id="scroll-top">&#8593;</a>
	<div class="reserver">
			<span>&#x2716;</span>
		<div class="container">
			<form>
				<h1>Reserver une Table</h1>
				<div>
					<input type="text" placeholder="Nom" name="nom" autocomplete="off" required>
				</div>
				<div>
					<input type="text" placeholder="Prénom" name="prenom" autocomplete="off" required>
				</div>
				<div>
					<input type="phone" placeholder="Numéro de téléphone" name="tel" autocomplete="off" required pattern="[0-9]{8}" title="Please type a valid phone number">
				</div>
				<div>
					<input type="number" placeholder="Nombre de personne(s)" name="nbrpersonne" autocomplete="off" required>
				</div>
				<div>
					<input type="date" placeholder="Date" name="date" required>
				</div>
				<div>
					<input type="submit" value="Reserver">
				</div>
			</form>
		</div>
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
					echo "<a href='deconnect.php'><i class='fas fa-sign-out-alt'></i> Déconnexion</a>";
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
	<div class="header">
		<div class="left">
	
		<div class="hero">
			<h1>Bienvenue Dans Notre Restaurant</h1>
			<button id="reserver">Reserver une table</button>
		</div>	
		</div>
		<div class="right">
			<img src="img/hero.jpg" alt="">
		</div>		
	</div>

	<div class="about">
		<h1>Meilleure façon de manger des repas sains</h1>
		<div class="about-container">
			<div class="item">
				<img src="img/healthy.svg" alt="">
				<h1>Repas Sain</h1>
				<p>Faire une réservation dans un délicieux restaurant est facile et ne prend que quelques minutes.</p>
			</div>

			<div class="item">
				<img src="img/food.svg" alt="">
				<h1>Fast Food</h1>
				<p>Faire une réservation dans un délicieux restaurant est facile et ne prend que quelques minutes.</p>
			</div>

			<div class="item">
				<img src="img/coffee.svg" alt="">
				<h1>Caffée Delicieux</h1>
				<p>Faire une réservation dans un délicieux restaurant est facile et ne prend que quelques minutes.</p>
			</div>
		</div>
	</div>
	<div class="repas">
		<div class="head">
			<h1>Nos Menus</h1>
			<a href="menu.php">Voir Plus &nbsp; &#x2794;</a>
		</div>

		<div class="menu-container">
			<div class="swiper-container">
  				<div class="swiper-wrapper">

				<?php 
				while($tab = mysqli_fetch_row($req))
				{
				?>
					<div class="swiper-slide">
						<div class='menu-item'>
							<img src='<?php echo $tab[4] ?>' alt=''>
							<span><?php echo $tab[2]?>TND</span>
							<h1><?php echo $tab[1] ?></h1>
							<p><?php echo $tab[3] ?></p>
							<input type="hidden" name="id" value="<?php echo $tab[0]?>">
							<a href="" id='commander' class="commande-btn" 
								<?php if(isset($_SESSION["user"]))echo "data-login='true'"?>>
							Commander</a>
						</div>
					</div>
				<?php
				}
				?>
 				</div>
			    <div class="swiper-pagination"></div>
			    <div class="swiper-button-prev"></div>
			    <div class="swiper-button-next"></div>
			</div>
		</div>
	</div>
	<div class="gallery">
		<h1>Gallery</h1>
		<div class="gallery-container">
			<div class="gallery-item">
				<div class="overlay">
					<span>&#10010;</span>
				</div>
				<img src="img/gallery/1.jpg" alt="">
			</div>
			<div class="gallery-item">
				<div class="overlay">
					<span>&#10010;</span>
				</div>
				<img src="img/gallery/2.jpg" alt="">
			</div>
			<div class="gallery-item">
				<div class="overlay">
					<span>&#10010;</span>
				</div>
				<img src="img/gallery/3.jpg" alt="">
			</div>
			<div class="gallery-item">
				<div class="overlay">
					<span>&#10010;</span>
				</div>
				<img src="img/gallery/4.jpg" alt="">
			</div>
			<div class="gallery-item">
				<div class="overlay">
					<span>&#10010;</span>
				</div>
				<img src="img/gallery/5.jpg" alt="">
			</div>
			<div class="gallery-item">
				<div class="overlay">
					<span>&#10010;</span>
				</div>
				<img src="img/gallery/6.jpg" alt="">
			</div>		
		</div>
	</div>
	<footer>
		<div class="footer-item">
			<h3 class="title">Restaurant<span>.</span></h3>
			<p>Lorem, ipsum, dolor sit amet consectetur adipisicing elit.</p>
			<div class="tel"><i class="fas fa-phone-alt"></i> +216 22000000</div>
			<div class="email"><i class="fas fa-envelope"></i> exemple@email.com</div>
			<div class="links">
				<a href="#"><i class="fas fa-facebook"></i></a>
				<a href="#"><i class="fas fa-twitter"></i></a>
				<a href="#"><i class="fas fa-instagram"></i></a>
				<a href="#"><i class="fas fa-youtube"></i></a>
			</div>
		</div>
		<div class="footer-item">
			<h3>Liens utiles</h3>
			<ul>
				<li><i class="fas fa-chevron-right"></i><a href="index.php">Home</a></li>
				<li><i class="fas fa-chevron-right"></i><a href="menu.php">Menu</a></li>
				<li><i class="fas fa-chevron-right"></i><a href="about.php">About</a></li>
				<li><i class="fas fa-chevron-right"></i><a href="contact.php">Contact</a></li>
			</ul>
		</div>
		<div class="footer-item">
			<div class="mapouter"><div class="gmap_canvas"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3211.281964746296!2d10.565097814784021!3d36.40237279769265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd617c47ada893%3A0xa5662090817a12af!2sRestaurant%20Condor!5e0!3m2!1sfr!2stn!4v1620347748711!5m2!1sfr!2stn" width="352" height="293" style="border:0;" allowfullscreen="" loading="lazy"></iframe><a href="https://soap2day-to.com"></a><br><style>.mapouter{position:relative;text-align:right;height:293px;width:352px;}</style><a href="https://www.embedgooglemap.net">google map embed code</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:293px;width:352px;}</style></div></div>
		</div>
	</footer>
	<p class="copyright">Restaurant 2021 &copy; All Right Resereved &reg;</p>
	<script src="js/main.js"></script>	
</body>
</html>