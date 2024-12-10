<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>SKY FLIGHT</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="../public/css/bootstrap.min.css" />

	<link type="text/css" rel="stylesheet" href="../public/css/style.css" />


</head>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">

					<div class="col-md-7 col-md-offset-1">

						<div class="booking-form">
							<div id="booking-cta">
								<h1>Se connecter
								</h1>
								<p>Connectez-vous à l'aide de votre compte SKY FLIGHT
									et accédez à nos services</p>
							</div>
							<form action="../controller/login-back.php" method="POST">
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

								<p>Si vous avez déjà compte, merci de vous identifiez <span><a href="index.php">ici</a></span></p>
								<div class="form-btn">
									<button name="go2" class="submit-btn">S'identifier</button>
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