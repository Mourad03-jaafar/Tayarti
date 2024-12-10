<?php
// include('../model/usersclass.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>SKY FLIGHT</title>

	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="../public/css/bootstrap.min.css" />
	<link type="text/css" rel="stylesheet" href="../public/css/style.css" />

</head>


<body>
	<div id="booking" class="section">

		<div class="section-center">

			<div class="container">
				<!-- <?php if(isset($_SESSION['response'])) {?>
				<div class="alert alert-success alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?= $_SESSION['response'];?>
				</div>
				<?php } ?> -->
				<!-- <p>ffffffffff</p> -->
				<div class="row">

					<div class="col-md-7 col-md-offset-1">
						<div class="booking-form">
							<div id="booking-cta">
								<h1>Créez un compte</h1>
								<p>Créez un compte afin de profiter des services SKY FLIGHT
									en toute simplicité.</p>
							</div>
							<form action="../controller/login-back.php" method="POST">

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Nom</span>
											<input class="form-control" type="text" name="nom">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Prenom</span>
											<input class="form-control" type="text" name="prenom">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">E-mail</span>
											<input class="form-control" type="text" name="mail">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Mot de passe</span>
											<input class="form-control" type="password" name="password">
										</div>
									</div>
								</div>

								<p>vous avez déjà un compte connectez-vous <span><a href="login.php">ici</a></span></p>
								<div class="form-btn">
									<button type="submit" name="go" class="submit-btn">S'identifier</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>