<?php $this->layout('layoutAdmin', ['title' => 'Espace administrateur'])?>
<?php $this->start('dashboard_section_account-info') ?>

<div class="containerbutton">
		<button type="button" class="btn btn-default"><a href="<?php echo $this->url('gestion_membres');?>" class="btn-text">Gestion des membres</a></button>

		<button type="button" class="btn btn-default"><a href="<?php echo $this->url('gestion_news');?>" class="btn-text">Gestion des news</a></button>
</div>
		
			<div class="container">
	
				<form method="POST">
						
					<label for="username" class="col-md-4 control-label">Pseudo</label>
					<input name="username" value="<?php echo $user['username']?>" class="form-control input-md">	
			
						
					<label for="firstname" class="col-md-4 control-label">Prénom</label>
					<input name="firstname" value="<?php echo $user['firstname']?>" class="form-control input-md">

					<label for="lastname" class="col-md-4 control-label">Nom</label>
					<input name="lastname" value="<?php echo $user['lastname']?>" class="form-control input-md">
						
			
					<label for="email" class="col-md-4 control-label">Email</label>
					<input name="email" value="<?php echo $user['email']?>" class="form-control input-md">

					<label for="gender" class="col-md-4 control-label">Genre</label>
					<input name="gender" value="<?php echo $user['gender']?>" class="form-control input-md">
							 

					<label for="role" class="col-md-4 control-label">Statut</label>
					<input name="role" value="<?php echo $user['role']?>" class="form-control input-md">
					

					<label class="col-md-4 control-label" for="rechercher"></label>
					<input type="submit" name="modifier" class="btn btn-default btn-block">
					
			</form>

			<form method="POST">
					<label for="password" class="col-md-4 control-label">Mot de passe</label>
					<input name="password" type="password" value="" class="form-control input-md">
					<input type="submit" name="modifierMdp" class="btn btn-default btn-block">

			</form>

			</div>



<?php $this->stop('dashboard_section_account-info') ?>


