<?php $this->layout('layoutRechercheAccueil', ['title' => 'Lookingforgroup.win/Recherche']) ?>

<?php $this->start('main_content') ?>



<div class="row">
	<div class="col-md-10">
	<?php
	// Affichage des profils de la recherche
	//TODO afficher les images de profil par defaut des utilisateurs qui n'ont pas de photos
	if (!empty($tri)) {
		foreach ($tri as $key => $value) {
		if (empty($tri[$key]['user_avatar']) && ($tri[$key]['gender'] == "m")){
		$user_avatar = $this->assetUrl('img/avatar_man.svg');

	}
	elseif(empty($tri[$key]['user_avatar']) && ($tri[$key]['gender'] == "f")){
		$user_avatar = $this->assetUrl('img/avatar_woman.svg');

	}
	else{
		$user_avatar = $this->assetUrl('img/user/user_avatar/').$tri[$key]['user_avatar'];
	}
			
	echo'<div class="col-xs-3 col-md-2">';
		echo'<div class="thumbnail" style="height:370px;">';
			echo '<a href="'.$this->url('profil_user',['id'=>$tri[$key]['id_user']]).'"><img src="'.$user_avatar.'" class="img-responsive"></a>';
				echo '<div class="caption">';
				echo '<h3>'.$tri[$key]['username'].'</h3>';
				echo '<p>'.$tri[$key]['city'].'</p>';
							//AGE : calcul de l'age par rapport a la date de naissance de l'utilisateur en inscription
				echo '<p>'.$tri[$key]['AGE'].' ans</p>
			</div>
		</div>
	</div>';


		// echo '<div class="col-sm-4 col-lg-4 col-md-4">';
		// echo '<p>'.$tri[$key]['username'].$tri[$key]['id_user'].'</p>';
		// echo '<p>'.$tri[$key]['city'].'</p>';
		// echo '<p>'.$tri[$key]['dob'].'</p>';
		// echo '</div>';
		}

	}
	// echo "<pre>";
	// print_r($triGenre);
	// echo "</pre>";
	// NOTE A MOI MEME:
	//REGION AGE H/F
	?>
	</div>
</div>
	


	<div id="rechercheForm">
		<form method="post" action ="" class="form-horizontal">
			<fieldset>
				<legend class="text-center">Recherchez des profils</legend>


				<div class="form-group">
					<label class="col-md-4 control-label" for="Sexe">Civilité</label>
					<div class="col-md-4">
						<select class="form-control" name="sexe">
							<option></option>
							<option value="m">Homme</option>
							<option value="f">Femme</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for="genre">Genres de jeux</label>
						<div class="col-md-4">
							<select class="form-control" name="genre">
								<option></option>
								<option value="Action">Action</option>
								<option value="RPG">RPG</option>
							</select>
						</div>
				</div>
			

				<div class="form-group">
					<label class="col-md-4 control-label" for="region">Région</label>
					<div class="col-md-4">
							<select class="form-control" name="region">
									<option></option>
									<option value="Aquitaine">Aquitaine</option>
									<option value="Île-de-France">Ile de France</option>
							</select>
					</div>
				</div>		
						
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="ville">Ville</label>
					<div class="col-md-4">
						<input class="form-control input-md" type="text" name="city" placeholder="Votre ville">
					</div>
				</div>
						
			
				<div class="form-group">
				<label class="col-md-4 control-label" for="rechercher"></label>
					<div class=col-md-4>
						<input type="submit" name="envoyer" value="Rechercher" class="btn btn-primary btn-block" id="btnRecherche">
					</div>
				</div>
			</fieldset>
		</form>
	</div>

<?php $this->stop('main_content') ?>



