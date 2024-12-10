<?php
session_start();
include('../model/volsclass.php');
?>

<html lang="en">
<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="../public/css/style.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
	integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<?php
include('heder.php');
?>

<body>

	<?php
include('navbar.php');
?>
	<div class="flex">
		<section class="t">
			<div class="container py-3">
				<div class="card">
					<div class="row ">
						<div class="col-md-8 px-3">
							<div class="card-block px-3">

								<?php
								$id = $_GET['id'];
								$vol = new Vol();
								$res = $vol -> vol_show_id($id);
								$row = $res->fetch_assoc();
								?>

								<h4 class="card-title">Depart :<span style="color:blue"><?= $row['depart']; ?></span>
								</h4>
								<h4 class="card-title">Destination : <span
										style="color:blue"><?= $row['destination']; ?></span></h4>
								<h4 class="card-title">Date depart :<span style="color:blue"><?= $row['date_depart']; ?>
									</span> </h4>
								<h4 class="card-title">Nomber de places : <span
										style="color:blue"><?= $row['num_place'];; ?></span></h4>
								<h4 class="card-title">Prix : <span style="color:blue"><?= $row['prix']; ?> DH</span>
								</h4>

								<a href="index.php" class="btn btn-primary">Annuler le vol</a>
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
											<span class="form-label">Nom</span>
											<input class="form-control" name="nom" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Prenom</span>
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
											<span class="form-label">Pays </span>
											<input class="form-control" name="pays" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Adresse </span>
											<input class="form-control" name="adresse" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Numéro de telephone </span>
											<input class="form-control" name="tele" type="number">
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
											<span class="form-label">Numéro de passeport </span>
											<input class="form-control" name="passeport" type="number">
										</div>
									</div>
									<input type="hidden" id="custId" name="id" value="<?= $id ;?>">
								</div>
								<div class="form-btn">
									<button type="submit" name="add" class="submit-btn">
										Réservation complète
									</button>
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