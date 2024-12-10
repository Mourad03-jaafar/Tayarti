<?php
session_start();
include('../model/volsclass.php');
?>

<html lang="en">
<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="../public/css/style.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<?php
include('header.php');
?>

<body>

	<?php
	include('navbar.php');
	?>
	<div class="flex" style="display:none;">
		<section class="t">
			<div class="container py-3">
				<div class="card">
					<div class="row ">
						<div class="col-md-8 px-3">
							<div class="card-block px-3">

								<?php
								$id = $_GET['id'];
								$vol = new Vol();
								$res = $vol->vol_show_id($id);
								$row = $res->fetch_assoc();
								?>

								<h4 class="card-title">Departure:<span style="color:blue"><?= $row['depart']; ?></span>
								</h4>
								<h4 class="card-title">Destination: <span style="color:blue"><?= $row['destination']; ?></span></h4>
								<h4 class="card-title">Departure Date:<span style="color:blue"><?= $row['date_depart']; ?>
									</span> </h4>
								<h4 class="card-title">Number of seats: <span style="color:blue"><?= $row['num_place'];; ?></span></h4>
								<h4 class="card-title">Price: <span style="color:blue"><?= $row['prix']; ?> TND</span>
								</h4>

								<a href="index.php" class="btn btn-primary">CANCEL</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>



	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-md-offset-1">
						<div class="booking-form">
							<form action="../controller/reservation-back.php" method="POST">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Last Name</span>
											<input class="form-control" name="nom" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">First Name</span>
											<input class="form-control" name="prenom" type="text">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Age</span>
											<input class="form-control" name="age" type="number" required>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Country </span>
											<input class="form-control" name="pays" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Adress </span>
											<input class="form-control" name="adresse" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Phone Number </span>
											<input class="form-control" name="tele">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Email </span>
											<input class="form-control" name="email" type="email">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Passeport Number </span>
											<input class="form-control" name="passeport">
										</div>
									</div>
									<input type="hidden" id="custId" name="id" value="<?= $id; ?>">
								</div>
								<div class="form-btn">
									<button type="submit" name="add" class="submit-btn">
										Place Ticket </button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
	include('script.php');
	?>
</body>

</html>