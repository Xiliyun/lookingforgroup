<?php $this->layout('layoutRechercheAccueil', ['title' => 'Lookingforgroup.win/Recherche']) ?>

<?php $this->start('main_content') ?>



<div class="row">

<!-- FORMULAIRE DE RECHERCHE -->

	<div id="rechercheForm" class="col-md-12 fixed-top">
		<form method="post" action ="" class="form-horizontal">
			<fieldset>
				<legend class="text-center">Recherchez des profils</legend>

				<div class="form-group">
					<div class="col-sm-2">
						<label for="Sexe">Civilité</label>
							<select class="form-control" name="sexe">
								<option></option>
								<option value="m">Homme</option>
								<option value="f">Femme</option>
							</select>
					</div>
					<!-- ICI AGE RANGE (2 dropdowns) -->
					<div class="form-group col-sm-1">
						<label for="from">De :</label>
						<select class="form-control" name="from">

						<?php for ($i=18; $i < 120 ; $i++): ?>
							<option value="<?= $i ?>"><?= $i ?> ans</option>
						<?php endfor; ?>
						</select>
					</div>

					<div class="form-group col-sm-1">
						<label for="to">A :</label>
						<select class="form-control" name="to">

						<?php for ($i=80; $i >= 18 ; $i--): ?>
							<option value="<?= $i ?>"><?= $i ?> ans</option>
						<?php endfor; ?>
						</select>
					</div>					
					<!-- FIN AGE RANGE -->
				<!--  ICI intéressé par -->
					<div class="col-sm-3">
						<label for="region">Région</label>
						<!-- codé en dur, source : geonames.org -->
						<?php 

						$regions = array(
								  "Île-de-France",
								  "Centre",
								  "Bourgogne-Franche-Comté",
								  "Normandy",
								  "Nord-Pas-de-Calais-Picardie",
								  "Alsace-Champagne-Ardenne-Lorraine",
								  "Pays de la Loire",
								  "Bretagne",
								  "Aquitaine-Limousin-Poitou-Charentes",
								  "Languedoc-Roussillon-Midi-Pyrénées",
								  "Auvergne-Rhône-Alpes",
								  "Provence-Alpes-Côte d'Azur",
								  "Corse"
								  );
						 ?>
								<select class="form-control" name="region">
										<option></option>
										<?php foreach ($regions as $region): ?>
											<option value="<?= $region ?>"><?= $region ?></option>
										<?php endforeach ?>
								</select>
					</div>		
							
					
					<div class="col-sm-3">
						<label for="ville">Ville</label>
							<input class="form-control" type="text" name="city" placeholder="Votre ville">
					</div>
							
				
					<div class="col-md-2">
						<label for="">Lancer la recherche :</label>
						<input type="submit" name="envoyer" value="Rechercher" class="btn btn-primary btn-block form-control" id="btnRecherche">
					</div>

				</div>
			</fieldset>
		</form>
		
		<!-- TODO rajouter un système de tri en JS (si le temps) -->
	</div>

<!-- RESULTAT DES RECHERCHES -->


<div class="col-md-12">


<?php if (!empty($tri)): ?>
	<?php foreach ($tri as $key => $user): ?>
		<?php 
		// TRAITEMENT DES DONNEES ICI
			if (empty($user['user_avatar']) && ($user['gender'] == "m")){
				$user_avatar = $this->assetUrl('img/avatar_man.svg');

			}
			elseif(empty($user['user_avatar']) && ($user['gender'] == "f")){
				$user_avatar = $this->assetUrl('img/avatar_woman.svg');

			}
			else{
				$user_avatar = $this->assetUrl('img/user/user_avatar/').$tri[$key]['user_avatar'];
			}

			if($user['gender'] == "m") { $user_gender_sign = '<i class="fa fa-mars" aria-hidden="true"></i>'; $user_gender = "homme";}
			if($user['gender'] == "f") { $user_gender_sign = '<i class="fa fa-venus" aria-hidden="true"></i>'; $user_gender = "femme";}


			 if (empty ($user['description'])) {
					$user['description']  = $user['username']." n'a pas ajouté de description";
				}
			$user['nogoal'] = '';
			if($user['friendship'] == 0 && $user['love'] == 0) {$user['nogoal'] = $user['username']." n'a pas indiqué ses raisons d'être ici..." ; }
			if($user['friendship'] == 1) { $user['friendship'] = "<li>de l'amitié entre gamers</li>";} else {$user['friendship'] = "" ;} 
			if($user['love'] == 1) {  $user['love'] =  "<li>de l'amour entre gamers</li>";} else {$user['love'] = "" ;} 

					 ?>

		<!-- AFFICHAGE DES RESULTATS DE LA RECHERCHE COLONNE DROITE -->
		<div class="col-xs-3 col-md-2 text-center">
			<div class="thumbnail resultat-recherche-profil"  data-toggle="modal" data-target="#myModal" 
				
				data-username="<?= $user['username']?>" 
				data-avatar="<?= $user_avatar?>" 
				data-gender="<?= $user_gender ?>" 
				data-age="<?= $user['AGE']?> ans"
				data-city="<?= $user['city']?>"
				data-region="<?= $user['region']?>"
				data-description="<?= $user['description']?>"
				data-friendship = "<?= $user['friendship']?>"
				data-love = "<?= $user['love']?>"
				data-nogoal = "<?= $user['nogoal']?>"
				data-userurl = "<?= $this->url('profil_user', ['id' => $user['id_user']]) ?>"

			>
			<!-- END PASSATION DE DONNEES DYNAMIQUES A LA FENETRE MODALE -->
				<img src="<?= $user_avatar?>" class="img-responsive">
				<div><?= $user['username']?>  <?= $user_gender_sign ?></div>
				<p><?= $user['AGE']?> ans</p>
			</div>
		</div>

	

	<?php endforeach ?>
<?php else: ?>
	<!-- SI LE TRI RETOURNE AUCUN RESULTAT -->
	<div class="text-center"><em>Il n'y a aucun résultat à afficher</em></div>

<?php endif ?>

		<!-- AFFICHAGE EN MODAL DU PROFIL -->
		<!-- A GERER VIA JAVASCRIPT -->
		<!-- afficher les informations en dynamique selon l'user sélectionné -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
					<div class="modal-header">

				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-username" id="myModalLabel"></h4>

				      </div>
				      <div class="modal-body">
							<img class="img-responsive center-block modal-avatar">
							<p><strong class="modal-username"></strong> - <small class="modal-gender"></small> - <small class=" modal-age"></small></p>

							<p>Habite à <span class="modal-city"></span> ( <span class="modal-region"></span>) </p>

							<hr>
							<p><strong>Description :</strong></p>
							<p class="modal-description"><p>

							<hr>
							<strong><span class="modal-username"></span> est ici pour :</strong>
								<ul>
									<span class="modal-friendship"></span>
									<span class="modal-love"></span>
									<span class="modal-nogoal"></span>
								</ul>

				      </div>
				      <div class="modal-footer">
				        <a class="btn btn-info btn-block modal-userurl">Afficher le profil complet</a>
				      </div>				     
		    </div>
		  </div>
		</div>






<!-- END COL MD 8 -->
</div>
	


</div><!-- END DIV CLASS ROw -->
<?php $this->stop('main_content') ?>



