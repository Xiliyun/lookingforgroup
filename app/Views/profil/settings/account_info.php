<?php $this->layout('layoutSettings', ['title' => 'Espace modification des informations de compte']) ?>

<?php 

// GESTION DES VARIABLES

$username = $user['username'];
$email = $user['email'];
$date_joined = new Datetime($user['date_joined']);
 ?>
<?php $this->start('dashboard_titre') ?>

        <div>
          <h3>Votre compte utilisateur</h4>
          <p></p>
        </div>

		<?php if(isset($_GET['confirm'])) echo "<p class='alert alert-success'>Vos modifications ont bien été prises en compte</p>"; ?>

<?php $this->stop('dashboard_titre') ?>


<?php $this->start('dashboard_section_account-info') ?>

<!-- Well 1 -->
<div class="col-sm-9">
    <div class="well">
    	Vous êtes membre depuis le : <?= $date_joined->format('d/m/Y')  ?>
    </div>
</div>  


<!-- well 2 -->
<div class="col-sm-9">
    <div class="well">


		<form class="form-horizontal" method="POST">

		<legend>Modifier les informations du compte</legend>
		  <div class="form-group">
		  	<label class="col-sm-2 control-label" for="username">Votre pseudo</label> 
		    <div class="col-sm-10">
		    	<input class="form-control" id="username" name="username" type="text" placeholder="Pseudo" value="<?= $username ?>"> 
		    	<p class="help-block errors"><?php if(isset($errors["username"])) echo $errors["username"]; ?></p>

		    </div>
		  </div>

		 <div class="form-group">
		  	<label class="col-sm-2 control-label" for="email">Votre email</label> 
		    <div class="col-sm-10">
		    	<input class="form-control" id="email" name="email" type="text" placeholder="email" value="<?= $email ?>"> 
		    </div>
		    <p class="help-block errors"><?php if(isset($errors["email"])) echo $errors["email"]; ?></p>
		  </div>


		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <input type="submit" class="btn btn-default btn-block" name="modifierInfo" value="modifier vos informations">
		    </div>
		  </div>
		</form>


    </div>
 

<!-- well 3 -->
    <div class="well">
		<form method="POST">

		<legend>Modifier le mot de passe</legend>
			<div class="form-group">
				<label for="currentPassword">Veuillez entrer votre mot de passe actuel</label>
				<input type="password" class="form-control" name="currentPassword" id="currentPassword" placeholder="Votre mot de passe actuel">
				<p class="help-block errors"><?php if(isset($errors["password"])) echo $errors["password"]; ?></p>

			</div>

			<div class="form-group">
				<label for="newPassword">Veuillez entrer votre nouveau mot de passe</label>
				<input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Votre nouveau mot de passe">
				<!-- <p class="help-block">Rappel : le format authorisé est de 6 caractères minimum dont 1 chiffre minimum</p>-->				
				<p class="help-block errors"><?php if(isset($errors["newPassword"])) echo $errors["newPassword"]; ?></p>


			</div>

			<div class="form-group">
				<label for="newPasswordConfirm">Veuillez confirmer votre nouveau mot de passe</label>
				<input type="password" class="form-control" id="newPasswordConfirm" name="newPasswordConfirm" placeholder="Confirmation de votre mot de passe">
				<p class="help-block errors"><?php if(isset($errors["newPasswordConfirm"])) echo $errors["newPasswordConfirm"]; ?></p>

			</div>

			<input type="submit" class="btn btn-default btn-block" name="modifierPassword" value="modifier votre mot de passe">
		</form>


    </div>
</div>

<?php $this->stop('dashboard_section_account-info') ?>



