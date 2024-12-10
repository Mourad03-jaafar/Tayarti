	<?php
	include('../model/usersclass.php');
	include('../model/reservation_class.php');
	?>
	<!DOCTYPE html>
	<html lang="en">
	<?php
		include('heder.php');
		?>

	<body>
		<?php
			include('navbar.php');
			?>

		<?php if (isset($_SESSION["id_user"])) {
			
			$id = $_SESSION["id_user"];
			$user = new User();
			$res = $user -> user_show($id);
			$row = $res->fetch_assoc(); 
			?>

		<div style="height:100vh">
			<div class="container">
				<div class="row">
					<div style="margin: 13%;" class="col-md-9">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<h4>User Profile</h4>
										<hr>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<form method="POST" action="../controller/user_back.php">
											<div class="form-group row">
												<label for="username" class="col-4 col-form-label">
													NOM</label>
												<div class="col-8">
													<input name="id" value="<?= $row['id_user']; ?>" type="hidden">

													<input id="username" name="nom" value="<?= $row['nom']; ?>"
														class="form-control here" required="required" type="text">
												</div>
											</div>
											<div class="form-group row">
												<label for="name" class="col-4 col-form-label">PRENOM</label>
												<div class="col-8">
													<input id="name" name="prenom" value="<?= $row['prenom']; ?>"
														class="form-control here" type="text">
												</div>
											</div>
											<div class="form-group row">
												<label for="lastname" class="col-4 col-form-label">EMAIL</label>
												<div class="col-8">
													<input id="lastname" name="mail" value="<?= $row['email']; ?>"
														class="form-control here" type="email">
												</div>
											</div>
											<div class="form-group row">
												<label for="text" class="col-4 col-form-label">PASSWORD</label>
												<div class="col-8">
													<input id="text" name="password" value="<?= $row['password']; ?>"
														class="form-control here" required="required" type="password">
												</div>
											</div>
											<div class="form-group row">
												<div class="offset-4 col-8">
													<button name="update_user_info" type="submit"
														class="btn btn-info btn-xs">Modifier mon Profile</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>






		<?php }
		?>






		<?php
		include('script.php');
		?>

	</body>

	</html>