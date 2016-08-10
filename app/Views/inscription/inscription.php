<?php $this->layout('layout', ['title' => 'inscription']) ?>

<!-- Page d'inscription' -->

<?php $this->start('main_content') ?>
<div class="container">
	<form class="form-horizontal" id="formconnexion" method="POST" > 
	<!-- TODO envoyer le formulaire sur une page -->
			<fieldset>

				<label for="username">Pseudo</label>  
				<input id="username" name="username" type="text" placeholder="Pseudo" value="<?php if(isset($_POST["username"])) echo $_POST["username"]; ?>"> 


				<div class="errors"><?php if(isset($errors["username"])) echo $errors["username"]; ?></div>  


				<label for="email">Email</label>  
				<input id="email" name="email" type="text" placeholder="Email" value="<?php if(isset($_POST["email"])) echo $_POST["email"]; ?>">   
				<div class="errors"><?php if(isset($errors["email"])) echo $errors["email"]; ?></div>  


				<label for="password">Mot de passe</label>  
				<input id="password" name="password" type="password" placeholder="min 8 caractères, 1 chiffre et 1 Majuscule" value="<?php if(isset($_POST["password"])) echo $_POST["password"]; ?>">   
				<div class="errors"><?php if(isset($errors["password"])) echo $errors["password"]; ?></div>  

				<label for="passwordConfirm">Confirmation de mot de passe</label>  
				<input id="passwordConfirm" name="passwordConfirm" type="password" placeholder="min 8 caractères, 1 chiffre et 1 Majuscule" value="">   
				<div class="errors"><?php if(isset($errors["passwordConfirm"])) echo $errors["passwordConfirm"]; ?></div>  


				<!-- Champ date_joined caché -->
				<input id="date_joined" name="date_joined" value="<?php echo date("Y-m-d"); ?>" type="hidden">   
		
				<!-- Champ role caché  -->
				<input name="role" type="hidden" value="0">   


				<label for="dob">Date de naissance</label>  
				<input id="dob" name="dob" type="date" value="<?php if(isset($_POST["dob"])) echo $_POST["dob"]; ?>">   
				<div class="errors"><?php if(isset($errors["dob"])) echo $errors["dob"]; ?></div>  

				<label for="lastname">Nom</label>  
				<input id="lastname" name="lastname" type="text" placeholder="Nom" value="<?php if(isset($_POST["lastname"])) echo $_POST["lastname"]; ?>">   
				<div class="errors"><?php if(isset($errors["lastname"])) echo $errors["lastname"]; ?></div>  


				<label  for="firstname">Prénom</label>  
				<input id="firstname" name="firstname" type="text" placeholder="Prénom" value="<?php if(isset($_POST["firstname"])) echo $_POST["firstname"]; ?>">   
				<div class="errors"><?php if(isset($errors["firstname"])) echo $errors["firstname"]; ?></div>  

				<label for="gender">Civilité</label>
					<label>
						<input type="radio" id="gender" name="gender" value="m" checked>Homme
					</label>
					<label>
						<input type="radio" id="gender" name="gender" value="f">Femme
					</label>
				<div class="errors"></div>  


				<!-- ESPACE LOCALISATION UTILISATEURS-->

				<label for="countrySelect">Pays de résidence</label>
				<select id="countrySelect" name="country">
					<option value="FR" selected>France</option>
				</select>

				<div class="errors"><?php if(isset($errors["location"])) echo $errors["location"]; ?></div>  

				<label for="postalcodeInput">Code postal</label>
				<input id="postalcodeInput" name="postalcode" onblur="postalCodeLookup();" type="text" placeholder="entrer un code postal"  value="<?php if(isset($_POST["postalcode"])) echo $_POST["postalcode"]; ?>">

				<label for="cityInput">Ville</label>
				<!-- also known for placename in geonames -->
				<input id="cityInput" name="city" onblur="closeSuggestBox();" type="text"  value="<?php if(isset($_POST["city"])) echo $_POST["city"]; ?>">
				<!-- TODO : prévoir un style pour l'affichage des suggestions!!! -->
				<div style="visibility: hidden;" id="suggestBoxElement"></div>

				<!-- CHAMPS CACHES POUR INSERTION EN BDD UNIQUEMENT -->
				<input id="regionInput" name="region" type="text" value="<?php if(isset($_POST["region"])) echo $_POST["region"]; ?>" hidden>
				<input id="latitude" name="lat" type="text" value="<?php if(isset($_POST["lat"])) echo $_POST["lat"]; ?>" hidden>
				<input id="longitude" name="lng" type="text" value="<?php if(isset($_POST["lng"])) echo $_POST["lng"]; ?>" hidden>

				<!--FIN ESPACE LOCALISATION UTILISATEURS-->



				<label>Je suis ici pour :</label>
					<!-- Un input hidden permet d'entrer une valeur "0" si l'utilisateur décroche le checkbox -->
					<input type="hidden" name="friendship" value="0" hidden>
					<input type="checkbox" id="friendship" name="friendship" value="1" checked><label for="friendship">Rencontre geek</label>


					<input type="hidden" name="love" value="0" hidden>
					<input type="checkbox" id="love"  name="love" value="1"><label for="love">Rencontre amoureuse</label>






			<input type="submit" value="S'inscrire" name="inscription">

				
				
			</fieldset>
		</form>
</div>



<?php $this->stop('main_content') ?>

<?php $this->start('customScript') ?>

	<script type="text/javascript" src="http://api.geonames.org/export/geonamesData.js?username=estheremiliefranck"></script>
	<script src="<?= $this->assetUrl('js/geoname.js') ?>"></script>
	<script src="<?= $this->assetUrl('js/jsr_class.js') ?>"></script>

<?php $this->stop('customScript') ?>




