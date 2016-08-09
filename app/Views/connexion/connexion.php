<?php $this->layout('layout', ['title' => 'Formulaire de connexion']) ?>  ?>



<!-- Page de connexion -->

<?php $this->start('main_content') ?>
<div class="containerForm">
	<form class="form-horizontal" id="formconnexion" method="POST" action="">
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
				    <input id="pwd" name="password" type="password" placeholder="Mot de passe" class="form-control input-md">
				    
				  </div>
				</div>

				<!-- Button -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="connexion"></label>
				  <div class="col-md-4">
				    <input type="submit" id="connexion" name="connexion" value="Se connecter" class="btn btn-default btn-block">
				  </div>
				</div>
			</fieldset>
		</form>
</div>



<?php $this->stop('main_content') ?>
