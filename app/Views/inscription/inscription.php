<?php $this->layout('layoutConnexionInscription') ?>

<!-- Page d'inscription' -->

<?php $this->start('main_content') ?>
<div class="container">
	<form class="form-horizontal" id="formconnexion" method="POST"> 
	<!-- TODO envoyer le formulaire sur une page -->
			<fieldset>
				
				<div class="form-group">
				  <label class="col-md-4 control-label" for="username">Pseudo</label>  
				  <div class="col-md-4">
				  <input id="username" name="username" type="text" placeholder="Pseudo" class="form-control input-md">   
				  </div>
				</div>

				<div class="form-group">
				  <label class="col-md-4 control-label" for="email">Email</label>  
				  <div class="col-md-4">
				  <input id="email" name="email" type="text" placeholder="Email" class="form-control input-md">   
				  </div>
				</div>

				<div class="form-group">
				  <label class="col-md-4 control-label" for="password">Mot de passe</label>  
				  <div class="col-md-4">
				  <input id="password" name="password" type="password" placeholder="Mot de passe" class="form-control input-md">   
				  </div>
				</div>


				<!-- Champ date_joined caché -->
				<input id="date_joined" name="date_joined" value="" type="hidden" >   
		
				<!-- Champ role caché  -->
				<input name="role" type="hidden" value="0">   


				<div class="form-group">
				  <label class="col-md-4 control-label" for="dob">Date de naissance</label>  
				  <div class="col-md-4">
				  <input id="dob" name="dob" type="date"  class="form-control input-md">   
				  </div>
				</div>

				<div class="form-group">
				  <label class="col-md-4 control-label" for="lastname">Nom</label>  
				  <div class="col-md-4">
				  <input id="lastname" name="lastname" type="text" placeholder="Nom" class="form-control input-md">   
				  </div>
				</div>


				<div class="form-group">
				  <label class="col-md-4 control-label" for="firstname">Prénom</label>  
				  <div class="col-md-4">
				  <input id="firstname" name="firstname" type="text" placeholder="Prénom" class="form-control input-md">   
				  </div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label" for="gender">Civilité</label>
						<div class="form-group">
							<label class="col-md-4 control-label" class="radio-inline">
								<input type="radio" id="gender"  name="gender" value="m" checked>Homme
							</label>
							<label class="radio-inline">
								<input type="radio" id="gender" name="gender" value="f">Femme
							</label>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label" for="friendship">Je sui ici pour :</label>
						<div class="form-group">
							<label class="col-md-4 control-label" class="radio-inline">
								<input type="radio" id="friendship"  name="love" value="1" checked>Rencontre amoureuse
							</label>
							<label class="radio-inline">
								<input type="radio" id="friendship" name="friendship" value="1">Rencontre geek
							</label>
					</div>
				</div>





			<!-- Champs ville -->










			<input type="submit">

				
				
			</fieldset>
		</form>
</div>



<?php $this->stop('main_content') ?>

<?php $this->start('customScript') ?>
	
<?php $this->stop('customScript') ?>




