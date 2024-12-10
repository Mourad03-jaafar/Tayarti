<?php
include('../model/volsclass.php');

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../public/img/logo.png" type="image/x-icon">
	<title>Tayarti</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<link href="../public/css/simple-sidebar.css" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="../public/css/table.css" />


</head>

<body>

	<div class="d-flex" id="wrapper">

		<!-- Sidebar -->
		<div class="bg-lights border-right" id="sidebar-wrapper">
			<div class="sidebar-heading">TAYARTI</div>

			<div class="list-group list-group-flush">

				<a href="admin.php" class="list-group-item list-group-item-action bg-lights">Tickets List</a>
				<a href="admin_profile.php" class="list-group-item list-group-item-action bg-lights">Profile</a>
			</div>
		</div>

		<div id="page-content-wrapper">

			<nav class="navbar navbar-expand-lg navbar-light bg-lights border-bottom">
				<button class="btn btn-primary" id="menu-toggle"> Menu</button>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					</ul>

					<?php if (isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset($_SESSION['statut'])) { ?>
						<ul class="navbar-nav ">
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

									<?= $_SESSION["nom"]; ?> <?= $_SESSION["prenom"]; ?>
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="#">Statut : <samp><?= $_SESSION["statut"]; ?></samp></a>
									<a class="dropdown-item" href="logout.php">Logout</a>
									<div class="dropdown-divider"></div>
								</div>
							</li>
						</ul>
					<?php } else { ?>
						<ul style='margin-left: 90%;' class="navbar-nav  ">
							<li class="nav-item ">
								<a class="nav-lik " href="login.php">Login</a>
							</li>
						</ul>



					<?php }; ?>
			</nav>




			<div class="col-md-12 well" style="margin: 3%;padding: 2%;">
				<h3 class="text-primary">Flights Available:</h3>
				<hr style="border-top:1px dotted #ccc;" />
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add ticket</button>
				<br /><br />
				<table class="table " id="table">
					<thead class="alert-success">
						<tr>
							<th>Departure Date</th>
							<th>Departure City</th>
							<th>Arrival City</th>
							<th>Number of seats</th>
							<th>Price</th>
							<th>Flight Statuts</th>
							<th>Action</th>

						</tr>
					</thead>
					<tbody style="background-color:#fff;">
						<?php

						$vol = new Vol();
						$res = $vol->vol_show_all();

						while ($fetch = mysqli_fetch_array($res)) {
						?>
							<tr>
								<td><?php echo $fetch['date_depart'] ?></td>
								<td><?php echo $fetch['depart'] ?></td>
								<td><?php echo $fetch['destination'] ?></td>
								<td><?php echo $fetch['num_place'] ?></td>
								<td><?php echo $fetch['prix'] ?></td>
								<td><?php echo $fetch['statut'] ?></td>
								<td><button class="btn btn-warning" data-toggle="modal" type="button" data-target="#update_modal<?php echo $fetch['id'] ?>"><span class="glyphicon glyphicon-edit"></span> Modify</button></td>
							</tr>
						<?php

							include 'vol_update.php';
						}
						?>
					</tbody>
				</table>
			</div>





			<div class="modal fade" id="form_modal" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<form method="POST" action="../controller/admin_back.php">
							<div class="modal-header">
								<h3 class="modal-title">Add ticket</h3>
							</div>
							<div class="modal-body">
								<div class="col-md-2"></div>
								<div class="col-md-8">
									<div class="form-group">
										<label>Departure Date:</label>
										<input type="datetime-local" class="form-control" id="recipient-name" required="required" name="date_depart">
									</div>
									<div class="form-group">
										<label>Departure City:</label>
										<input type="text" class="form-control" id="recipient-name" required="required" name="vdepart">
									</div>
									<div class="form-group">
										<label>Arrival City:</label>
										<input type="text" class="form-control" id="recipient-name" required="required" name="varrivee">
									</div>
									<div class="form-group">
										<label>Number of places:</label>
										<input type="number" class="form-control" id="recipient-name" required="required" name="npalace">
									</div>
									<div class="form-group">
										<label>Price:</label>
										<input type="text" name="prix" class="form-control" required="required" />
									</div>
									<div class="form-group">
										<label>Flight Statuts:</label>
										<input type="text" class="form-control" id="recipient-name" required="required" name="statut">
									</div>
								</div>
							</div>
							<div style="clear:both;"></div>
							<div class="modal-footer">
								<button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span>Save</button>
								<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
							</div>
					</div>
					</form>
				</div>
			</div>
		</div>












	</div>




	<?php
	include('script.php');
	?>

	<!-- Menu Toggle Script -->
	<script>
		$("#menu-toggle").click(function(e) {
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
		});
	</script>

</body>

</html>