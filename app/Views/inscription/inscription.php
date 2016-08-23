<?php $this->layout('layoutInscriptionConnexion', ['title' => 'Formulaire d\'inscription']) ?>
<!-- Page d'inscription' -->

<!-- TODO mettre le champs ville en disabled de base avec un changement après avoir entré le cp!!!  -->
<?php $this->start('content_form') ?>
<div id="container">
	<form class="form-horizontal"  method="POST" > 
			<fieldset>
			<legend class="text-center">Formulaire d'inscription</legend>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="username">Pseudo</label> 
					<div class="col-md-4"> 
						<input class="form-control input-md" id="username" name="username" type="text" placeholder="Pseudo" value="<?php if(isset($_POST["username"])) echo $_POST["username"]; ?>"> 
						<p class="help-block errors"><?php if(isset($errors["username"])) echo $errors["username"]; ?></p>
					</div>			
				</div>

				

				
				<div class="form-group">
					<label class="col-md-4 control-label" for="email">Email</label>
					<div class="col-md-4">   
						<input class="form-control input-md" id="email" name="email" type="text" placeholder="Email" value="<?php if(isset($_POST["email"])) echo $_POST["email"]; ?>"> 
						<p class="help-block errors"><?php if(isset($errors["email"])) echo $errors["email"]; ?></p>  
					</div>  	
				</div>

				
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="password">Mot de passe</label>
					<div class="col-md-4">  
						<input class="form-control input-md" id="password" name="password" type="password" placeholder="votre mot de passe" value="<?php if(isset($_POST["password"])) echo $_POST["password"]; ?>"> 
						<p class="help-block errors"><?php if(isset($errors["password"])) echo $errors["password"]; ?></p>  
					</div>  
				</div>
				
				
				
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="passwordConfirm">Confirmation de mot de passe</label> 
					<div class="col-md-4"> 
						<input class="form-control input-md" id="passwordConfirm" name="passwordConfirm" type="password" placeholder="confirmez votre mot de passe" value=""> 
						<p class="help-block errors"><?php if(isset($errors["passwordConfirm"])) echo $errors["passwordConfirm"]; ?></p>
					</div>  
				</div>
				
				  


				<!-- Champ date_joined caché -->
				<input id="date_joined" name="date_joined" value="<?php echo date("Y-m-d"); ?>" type="hidden">   
		
				<!-- Champ role caché  -->
				<input name="role" type="hidden" value="0">   

				
				<div class="form-group">
					<label class="col-md-4 control-label" for="dob">Date de naissance</label> 
					<div class="col-md-4"> 
						<input class="form-control input-md" id="dob" name="dob" type="date" value="<?php if(isset($_POST["dob"])) echo $_POST["dob"]; ?>">   
						<p class="help-block errors"><?php if(isset($errors["dob"])) echo $errors["dob"]; ?></p> 
					</div> 
				</div>
				

				

				<div class="form-group">
					<label class="col-md-4 control-label" for="firstname">Prénom</label> 
					<div class="col-md-4">
						<input class="form-control input-md" id="firstname" name="firstname" type="text" placeholder="Prénom" value="<?php if(isset($_POST["firstname"])) echo $_POST["firstname"]; ?>"> 
						<p class="help-block errors"><?php if(isset($errors["firstname"])) echo $errors["firstname"]; ?></p>
					</div>   
				</div>

				
			
				<div class="form-group">	
					<label class="col-md-4 control-label" for="lastname">Nom</label>  
					<div class="col-md-4">
						<input class="form-control input-md" id="lastname" name="lastname" type="text" placeholder="Nom" value="<?php if(isset($_POST["lastname"])) echo $_POST["lastname"]; ?>"> 
						<p class="help-block errors"><?php if(isset($errors["lastname"])) echo $errors["lastname"]; ?></p>  
					</div>  
				</div>
					  

				<div class="form-group">
					<label class="col-md-4 control-label" for="gender">Civilité</label>
					<div class=col-md-6>
						<div class="form-group">
							<label class="col-md-4 control-label">
								<input  type="radio" id="gender" name="gender" value="m" <?php if(isset($_POST["gender"]) && $_POST["gender"] == "m") echo "checked"; ?> > Homme
							</label>
							<label class="col-md-4 control-label">
								<input  type="radio" id="gender" name="gender" value="f" <?php if(isset($_POST["gender"]) && $_POST["gender"] == "f") echo "checked"; ?>> Femme
							</label>

						</div>
						<p class="help-block errors"><?php if(isset($errors["gender"])) echo $errors["gender"]; ?></p>

					</div>
				</div>

				


				<!-- ESPACE LOCALISATION UTILISATEURS-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="countrySelect">Pays de résidence</label>
					<div class="col-md-4">
						<select class="form-control" id="countrySelect" name="country">
							<option value="FR" selected>France</option>
						</select>
					</div>
				</div>
				
				  

				<div class="form-group">
					<label class="col-md-4 control-label" for="postalcodeInput">Code postal</label>
					<div class="col-md-4">
						<input class="form-control input-md" id="postalcodeInput" name="postalcode" onblur="postalCodeLookup();" type="text" placeholder="Code postal"  value="<?php if(isset($_POST["postalcode"])) echo $_POST["postalcode"]; ?>">
						<p class="help-block errors"><?php if(isset($errors["location"])) echo $errors["location"]; ?></p>

					</div>

				</div>
				


				<div class="form-group">
					<label class="col-md-4 control-label" for="cityInput">Ville</label>
					<div class="col-md-4">
					<!-- also known for placename in geonames -->
					<input class="form-control input-md" id="cityInput" name="city" onblur="closeSuggestBox();" type="text"  value="<?php if(isset($_POST["city"])) echo $_POST["city"]; ?>" placeholder="Ville">
					</div>
				</div>

				<!-- TODO : prévoir un style pour l'affichage des suggestions!!! -->
				<div style="visibility: hidden;" id="suggestBoxElement"></div>

				<!-- CHAMPS CACHES POUR INSERTION EN BDD UNIQUEMENT -->
				<input id="regionInput" name="region" type="text" value="<?php if(isset($_POST["region"])) echo $_POST["region"]; ?>" hidden>
				<input id="latitude" name="lat" type="text" value="<?php if(isset($_POST["lat"])) echo $_POST["lat"]; ?>" hidden>
				<input id="longitude" name="lng" type="text" value="<?php if(isset($_POST["lng"])) echo $_POST["lng"]; ?>" hidden>

				
				<!--FIN ESPACE LOCALISATION UTILISATEURS-->
				<div class="form-group">
				<!-- Décalage du label et input a régler -->
				<label class="col-md-4 control-label">Je suis ici pour :</label>
					<div class="col-md-8">
						<div class="form-group">
							<!-- Un input hidden permet d'entrer une valeur "0" si l'utilisateur décroche le checkbox -->
							<input type="hidden" name="friendship" value="0" hidden>
							<input  type="checkbox" id="friendship" name="friendship" value="1" checked><label for="friendship">Rencontre geek</label>
							<input type="hidden" name="love" value="0" hidden>
							<input  type="checkbox" id="love"  name="love" value="1"><label for="love">Rencontre amoureuse</label>
						</div>
					</div>
				</div>
			
			<div class="form-group">
				<label class="col-md-4 control-label" for="inscription"></label>
				<div class ="col-md-4">
					<input type="submit" value="S'inscrire" name="inscrire" id="inscription" class="btn btn-default btn-block">	
				</div>	
			</div>
			

				
				
			</fieldset>
		</form>
		<div>Déjà membre?<a class="" href="<?= $this->url('connexion_connexion') ?>"> Cliquez ici pour vous connecter !</a></div>
</div>



<?php $this->stop('content_form') ?>

<?php $this->start('customScript') ?>


<?php $this->stop('customScript') ?>




