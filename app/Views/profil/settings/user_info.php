<?php $this->layout('layoutSettings', ['title' => 'Espace modification des informations de compte']) ?>

<?php 

	// 4) Recuperation des variables utilisateur pour affichage sur page
	$firstname = $user['firstname'];
	$lastname = $user['lastname'];
	$dob = $user['dob'];
	$age = DateTime::createFromFormat('Y-m-d', $dob)->diff(new DateTime('now'))->y;

	$gender = $user['gender'];

	$friendship = $user['friendship'];
	$love = $user['love'];

	// table user_location
	$city = $userLocation['city'];
	$cp = $userLocation['postal_code'];
	$country = $userLocation['country'];
	$region = $userLocation['region'];
	$lat = $userLocation['lat'];
	$lng = $userLocation['lng'];

	// Table user_info
	$description = $userInfo['description'];
	$user_avatar = $this->assetUrl('img/user/user_avatar/'.$userInfo['user_avatar']);
	$orientation = $userInfo['orientation'];


	// 6 UPLOAD PHOTO (suite)


 ?>



<?php $this->start('dashboard_titre') ?>
        <div>
          <h3>Vos informations personnelles</h4>
          <p></p>
        </div>

		<?php if(isset($_GET['confirm'])) echo "<p class='alert alert-success'>Vos modifications ont bien été prises en compte</p>"; ?>

<?php $this->stop('dashboard_titre') ?>


<?php $this->start('dashboard_section_user-info') ?>


      <div class="col-sm-9">
      <!-- A PROPOS DE VOUS -->
        <div class="well">
	        <form method="POST">
				<div class="form-group">
					<label for="champsDescription">Votre description</label>
					<textarea class="form-control" name="description" id="champsDescription" cols="30" rows="10" placeholder="Entrez une description de vous ici..."><?php if(isset($_POST['description'])){echo $_POST['description'];} else {echo $description;} ?></textarea>
					<!-- utilisation de js pour compter le compte de caractères restants -->
					<div id="charNum">1000 caractères max</div>
					<p class="help-block errors"><?php if(isset($errors["description"])) echo $errors["description"]; ?></p>
				</div>

				<input type="submit" class="btn btn-default" name="modifierDescription" value="modifier">

			</form>
        </div>


       	<!-- MODIFICATION PHOTO DE PROFIL -->
        <div class="well">
			<div class="row">
			<div class="col-sm-6">
			        <form enctype="multipart/form-data" method="post" action="">
			        <div class="form-group">
						<legend>Ajouter / modifier votre image de profil</legend>
			            <label>Veuillez choisir une image à télécharger <input type="file" size="32" name="image_field" value=""></label>
						<p class="help-block">Formats acceptés : images uniquement.</p>

						<input type="hidden" name="avatar_path" value="<?= $this->assetUrl('img/user/user_avatar/'); ?>">
						<p class="help-block">taille de l'image max : 2 Mo.</p>
						<p class="help-block errors"><?php if(isset($errors["avatar"])) echo $errors["avatar"]; ?></p>

			            <input type="submit" class="btn btn-default btn-block" name="uploadAvatar" value="Uploader">

			            </div>
			        </form>
		        </div>

				<div class="col-sm-6">
					<p>Votre photo actuelle</p>
					<?php if(empty($userInfo['user_avatar'])):?>
					Vous n'avez aucune photo de profil
					<?php else: ?>
					<img class="img-responsive img-thumbnail" alt="" src="<?= $user_avatar ?>">
					<?php endif; ?>
				</div>

			</div>

        </div>



        <!-- MODIFICATION NOM PRENOM -->
        <div class="row column-same-height-container">
          <div class="col-sm-4">
            <div class="well">
              <form method="POST">

					<div class="form-group">
						<label for="firstname">Votre prénom</label>
						<input type="text" class="form-control" name="firstname" id="firstname" placeholder="Votre prénom" value="<?= $firstname ?>">
						<p class="help-block errors"><?php if(isset($errors["firstname"])) echo $errors["firstname"]; ?></p>
					</div>

					<div class="form-group">
						<label for="lastname">Votre nom</label>
						<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Votre nom" value="<?= $lastname ?>">
						<p class="help-block errors"><?php if(isset($errors["lastname"])) echo $errors["lastname"]; ?></p>
					</div>

					<input type="submit" class="btn btn-default btn-block" name="modifierNom" value="modifier">
				</form>
            </div>
          </div>

          <!-- MODIFICATION AGE -->
          <div class="col-sm-4">
            <div class="well">
				<form method="POST">

					<div class="form-group">
						<label for="dob">Votre date de naissance</label>
						<input type="date" class="form-control" name="dob" id="dob" value="<?= $dob ?>">
						<p class="help-block errors"><?php if(isset($errors["dob"])) echo $errors["dob"]; ?></p>

					</div>

					<div class="form-group">
						<div>Vous êtes lvl : <?= $age ?></div>


					</div>

					<input type="submit" class="btn btn-default btn-block" name="modifierAge" value="modifier">
				</form>
            </div>
          </div>

          <!-- MODIFICATION LIEU DE RESIDENCE -->
          <div class="col-sm-4">
            <div class="well">
             	<form method="POST">

					<div class="form-group">
						<label for="countrySelect">Votre pays de résidence</label>
							<select class="form-control" id="countrySelect" name="country">
								<option value="FR" selected>France</option>
							</select>
					</div>
		
					<div class="form-group">
						<label for="postalcodeInput">Code postal</label>
							<input class="form-control input-md" id="postalcodeInput" name="postalcode" onblur="postalCodeLookup();" type="text" placeholder="Code postal" value="<?= $cp ?>">
							<p class="help-block errors"><?php if(isset($errors["location"])) echo $errors["location"]; ?></p>
					</div>
					
					<div class="form-group">
						<label for="cityInput">Ville</label>
						<!-- also known for placename in geonames -->
						<input class="form-control input-md" id="cityInput" name="city" onblur="closeSuggestBox();" type="text"   value="<?= $city ?>" placeholder="Ville">
					</div>

					<!-- TODO : prévoir un style pour l'affichage des suggestions!!! -->
					<div style="visibility: hidden;" id="suggestBoxElement"></div>

					<!-- CHAMPS CACHES POUR INSERTION EN BDD UNIQUEMENT -->
					<input id="regionInput" name="region" type="text" value="<?= $region ?>" hidden>
					<input id="latitude" name="lat" type="text" value="<?= $lat ?>" hidden>
					<input id="longitude" name="lng" type="text" value="<?= $lng ?>" hidden>

					<input type="submit" class="btn btn-default btn-block" name="modifierLocation" value="modifier">
					
				</form>
            </div>
          </div>
        </div>

<!-- 
        <div class="well">
          <h4></h4>
          <p>Some text..</p>
        </div> -->

        <div class="row column-same-height-container">
            <div class="col-sm-4">
	            <div class="well">
		            <form method="POST">

						<div class="form-group">
							<label for="gender">Votre sexe</label>
								<select class="form-control" id="gender" name="gender">
									<option value="m" <?php if($gender == "m") echo "selected"; ?>>Homme</option>
									<option value="f" <?php if($gender == "f") echo "selected"; ?>>Femme</option>
								</select>
								<p class="help-block errors"><?php if(isset($errors["gender"])) echo $errors["gender"]; ?></p>

						</div>
			
						<div class="form-group">
							<label for="orientation">Votre orientation sexuelle</label>
								<select class="form-control" id="orientation" name="orientation">
									<option value="" <?php if($orientation == null) echo "selected"; ?>>Non-indiqué</option>

									<option value="hetero" <?php if($orientation == "hetero") echo "selected"; ?>><?php if($gender == "m"){echo "hétérosexuel"; }elseif($gender == "f"){echo "hétérosexuelle";} ?></option>
									<option value="homo" <?php if($orientation == "homo") echo "selected"; ?>><?php if($gender == "m"){echo "homosexuel"; }elseif($gender == "f"){echo "homosexuelle";} ?></option>
									<option value="bi" <?php if($orientation == "bi") echo "selected"; ?>><?php if($gender == "m"){echo "bisexuel"; }elseif($gender == "f"){echo "bisexuelle";} ?></option>

								</select>
						</div>
						
						<input type="submit" class="btn btn-default btn-block" name="modifierSexeOrientation" value="modifier">
						
					</form>
	            </div>
          </div>
          <div class="col-sm-8">
	            <div class="well">
		            <form method="POST">	
		            	<div class="form-group">
							<label>Vous êtes ici pour...</label>
								<div class="checkbox">
									<input type="hidden" name="friendship" value="0" hidden>
									<label for="friendship"><input type="checkbox" id="friendship" name="friendship" value="1" <?php if($friendship == "1"){echo "checked"; } ?> >des rencontres geek <span class=" glyphicon glyphicon-thumbs-up" aria-hidden="true"> </label>
								</div>
								<div class="checkbox">
									<input type="hidden" name="love" value="0" hidden>
									<label for="love"><input type="checkbox" id="love"  name="love" value="1"<?php if($love == "1"){echo "checked"; }?> >Des rencontres amoureuses <span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></label>
								</div>
								<p class="help-block errors"><?php if(($friendship == 0) && ($love == 0)){ echo "Vous n'avez sélectionné aucune but pour votre compte, êtes vous sûr de votre choix? :(" ;} ?></p>

							<input type="submit" class="btn btn-default" name="modifierBut" value="modifier">

						</div>
					</form>	
	            </div>
          </div>

        </div>

<!--         <div class="well">
          <h4>Dashboard</h4>
          <p>Some text..</p>
        </div>

        <div class="well">
          <h4>Dashboard</h4>
          <p>Some text..</p>
        </div> -->






      </div> <!-- end col md 9 -->


 <?php $this->stop('dashboard_section_user-info') ?>
