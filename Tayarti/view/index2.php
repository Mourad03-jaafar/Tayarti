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
	<div class="textt">
		<p>
		<h2>Save up to 25%!</h2> <br>Book now and get the best price for your trip.</p>

		<button class="rsv-button">BOOK A TICKET</button>
	</div>
	<img class="picture" src="../public/img/02.jpg" alt="Image Description">


	<form class="text-center index-form border border-light p-5" method="post" action="recherche.php">
		<!-- Name -->

		<input type="select" name="villedepart" class="form-control mb-4" placeholder="Departure City">

		<!-- Email -->

		<input type="text" name="villearrivee" class="form-control mb-4" placeholder="Destination City">

		<!-- Sign in button -->
		<button class=" btn btn-info btn-block" type="submit" name="submit-search">SEARCH</button>


	</form>

	<div class="about">
		<div class="about-txt">
			<p>
			<h5>Cant decide where to go ?</h5>
			</p>
			<p>Discover our destinations and find the best deals for your next trip.</p>
			<button class="rsv-button">CHECK IN</button>
		</div>

	</div>

	<div class="trip">
		<p>
		<h4>Start planning your next trip.</h4>
		</p>
		<p>Are you planning to go on a trip soon? Here are some options to help you make your choice.</p>
	</div>

	<div class="plans">
		<div class="plan-1 flex-item">


			<button class="flex-text">Find flights and fares</button>

		</div>
		<div class="plan-2 flex-item">


			<button class="flex-text">Book a package</button>

		</div>
		<div class="plan-3 flex-item">

			<button class="flex-text">Find out more</button>

		</div>

	</div>

	 
	<footer class="footer_">
		<span class="section__title">
			<h3>NEWSLETTER!</h3>
		</span>
		<form action="" class="newsletter">
			<input type="email" placeholder="Enter your email." class="newsletter__input">
			<button class="newsletter__button">
				Subscribe
			</button>
		</form>
	</footer>
	<div class="us">
		<div class="grid">
			<h3>
				Product
			</h3>
			<a href="#">Android app</a>
			<a href="#">How it works</a>
			<a href="#">About us</a>
		</div>

		<div class="grid">
			<h3>Support</h3>
			<a href="#">FAQ</a>
			<a href="#">Report a bug</a>
			<a href="#">Request a feature</a>
		</div>
		<div class="grid">
			<h3>
				Address
			</h3>
			<a href="https://www.jarzouna.com">Jarzouna</a>
			<a href="https://www.bizerte.com">Bizerte</a>
			<a href="https://www.tunisia.com">Tunisia</a>
		</div>
		<div class="grid">
			<h3>Social Media</h3>
			<a href="https://www.facebook.com">Facebook</a>
			<a href="https://www.twitter.com">Twitter</a>
			<a href="https://www.instagram.com">Instagram</a>

		</div>

	</div>

	<?php
	include('script.php');
	?>


</body>

</html>