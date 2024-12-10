<div class="modal fade" id="update_modal<?php echo $fetch['id']?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="../controller/admin_back.php">
				<div class="modal-header">
					<h3 class="modal-title">Modifier un vol</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="form-group">
							<label>Date départ:</label>
							<input type="hidden" name="id" value="<?php echo $fetch['id']?>" />
							<input type="text" class="form-control" id="recipient-name" name="date_depart" value="<?php echo $fetch['date_depart']?>">
							</div>
							<div class=" form-group">
							<label>Ville du départ:</label>
							<input type="text" class="form-control" id="recipient-name" name="vdepart" value="<?php echo $fetch['depart']?>">
							</div>
							<div class=" form-group">
							<label>Ville d'arrivée:</label>
							<input type="text" class="form-control" id="recipient-name" name="varrivee" value="<?php echo $fetch['destination']?>">
							</div>
							<div class=" form-group">
							<label>Nombre de Places:</label>
							<input type="text" class="form-control" id="recipient-name" name="npalace" value="<?php echo $fetch['num_place']?>">
							</div>
							<div class=" form-group">
							<label>Prix:</label>
							<input type="text" class="form-control" id="recipient-name" name="prix" value="<?php echo $fetch['prix']?>">
							</div>
							<div class=" form-group">
							<label>Staut de vol:</label>
							<input type="text" class="form-control" id="recipient-name" name="statut" value="<?php echo $fetch['statut']?>">
							</div>

					</div>
				</div>
				<div style=" clear:both;"></div>
						<div class="modal-footer">
							<button name="update" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>
							Modifier</button>
							<button class="btn btn-danger" type="button" data-dismiss="modal"><span
									class="glyphicon glyphicon-remove"></span> Fermer</button>
						</div>
					</div>
			</form>
		</div>
	</div>
</div>