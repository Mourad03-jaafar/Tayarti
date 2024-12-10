<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Tayarti</title>

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
								<h1>Log in your account.
								</h1>
								<p>Log in using your TAYARTI account to access our services.</p>
							</div>
							<form action="../controller/login-back.php" method="POST">
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

								<p>If you don't have an account, yet, please consider <span><a href="index.php">signing up.</a></span></p>
								<div class="form-btn">
									<button name="go2" class="submit-btn">LOG IN</button>
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