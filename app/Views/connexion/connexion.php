<?php $this->layout('layoutInscriptionConnexion', ['title' => 'Formulaire de connexion']) ?>  

<?php $this->start('content_top') ?>
<div class="alert alert-warning" role="alert">
  Le contenu du site est uniquement accessible aux membres connectés, merci de vous connecter via le formulaire ci-dessous ou <a href="<?= $this->url('inscription_inscription') ?>" class="alert-link"> créer un compte !</a>
</div>

<?php $this->stop('content_top') ?>


<!-- Page de connexion -->

<?php $this->start('content_form') ?>

<div id="container">
	<form class="form-horizontal"  method="POST" action="">
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
			<p class="help-block text-center"><?php if(isset($errors)) echo $errors; ?></p>
		</form>
</div>



<?php $this->stop('content_form') ?>
