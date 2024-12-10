<?php
include('../model/volsclass.php');
session_start();
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

	<div class="container text-center">
		<form method="post" action="recherche">
			<h1>Resultats des recherches</h1>

	</div>
	<div id="bo" class="container">
		<div class="row">
			<div class="col-12">
				<?php
				$villedepart = $_POST['villedepart'];
				$villearrivee = $_POST['villearrivee'];

				$vol = new Vol();
   				$res = $vol -> vol_show($villedepart,$villearrivee);
   				
				?>

				<tr>
					<?php
							$row_cnt = $res->num_rows; 
							if($row_cnt <= 0)
							echo " Aucun résultat trouvé";							
							else{
								echo"<table class='table table-bordered'>
					<thead>
						<tr>
							<th scope='col'>Date départ</th>
							<th scope='col'>Ville du départ</th>
							<th scope='col'>Ville d'arrivée</th>
							<th scope='col'>Nombre de Places</th>
							<th scope='col'>Reservation</th>
						</tr>
					</thead>
					<tbody>";
							while ($row = $res->fetch_assoc()) { ?>
					<td><?= $row['date_depart']; ?></td>
					<td><?= $row['depart']; ?></td>
					<td><?= $row['destination']; ?></td>
					<td><?= $row['num_place']; ?></td>
					<td>
						<a class="btn btn-success" href="reservation.php?id=<?= $row['id']; ?>"
							type="button">Reserver</i></a>
					</td>
				</tr>
				<?php }} ?>

				</tbody>
				</table>
			</div>
		</div>
	</div>

	<?php
	include('script.php');
	?>

</body>

</html>