<?php
// include('../model/usersclass.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../public/img/logo.png" type="image/x-icon">
	<title>Tayarti</title>
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="../public/css/bootstrap.min.css" />
	<link type="text/css" rel="stylesheet" href="../public/css/style.css" />

</head>

<body>
	<div id="booking" class="section">
		<div class="section-center">

			<div class="container">
				<!-- <?php if (isset($_SESSION['response'])) { ?>
					<?= $_SESSION['response']; ?>
				</div>
				<?php } ?> -->

				<div class="row">

					<div class="col-md-7 col-md-offset-1">
						<div class="booking-form">
							<div id="booking-cta">
								<h1>Create an account.</h1>
								<p>To benefit from our TAYARTI services you have to create an account.</p>

							</div>
							<form action="../controller/login-back.php" method="POST">

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Last Name</span>
											<input class="form-control" type="text" name="nom">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Fist Name</span>
											<input class="form-control" type="text" name="prenom">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">E-Mail</span>
											<input class="form-control" type="text" name="mail">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Password</span>
											<input class="form-control" type="password" name="password">
										</div>
									</div>
								</div>

								<p>Already have an account? <span><a href="login.php"> Log in.</a></span></p>
								<div class="form-btn">
									<button type="submit" name="go" class="submit-btn">SIGN UP</button>
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