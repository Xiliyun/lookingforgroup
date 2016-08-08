<?php $this->layout('layoutConnexionInscription') ?>

<!-- Page d'inscription' -->

<?php $this->start('main_content') ?>
<div class="container">
	<form class="form-horizontal" id="formconnexion">
			<fieldset>
				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="username">Pseudo</label>  
				  <div class="col-md-4">
				  <input id="username" name="username" type="text" placeholder="Pseudo" class="form-control input-md">
				    
				  </div>
				</div>

				<!-- Password input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="pwd">Mot de Passe</label>
				  <div class="col-md-4">
				    <input id="pwd" name="pwd" type="password" placeholder="Mot de passe" class="form-control input-md">
				    
				  </div>
				</div>

				<!-- Button -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="envoyer"></label>
				  <div class="col-md-4">
				    <button id="envoyer" name="envoyer" class="btn btn-default btn-block">Envoyer</button>
				  </div>
				</div>
			</fieldset>
		</form>
</div>



<?php $this->stop('main_content') ?>
