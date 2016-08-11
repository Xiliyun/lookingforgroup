<?php $this->layout('layoutInscriptionConnexion', ['title' => 'Formulaire de connexion']) ?>  

<!-- Page de connexion -->
<?php $this->start('nav_homepage') ?>

    <div class="navbar-header">
        <a class="navbar-brand" href="#">Lookingforgroup.win</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
    	<ul class="nav navbar-nav navbar-right">
    		<li><a class="" href="<?= $this->url('connexion_connexion') ?>">Connexion membre</a></li>
	    </ul>


    </div><!--/.navbar-collapse -->

<?php $this->stop('nav_homepage') ?>


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
		</form>
</div>



<?php $this->stop('content_form') ?>
