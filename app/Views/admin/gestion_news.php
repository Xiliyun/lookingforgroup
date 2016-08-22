<?php $this->layout('layoutAdmin', ['title' => 'Espace administrateur'])?>
<?php $this->start('dashboard_section_account-info') ?>

	<div class="containerbutton">
		<button type="button" class="btn btn-default"><a href="<?php echo $this->url('gestion_membres');?>" class="btn-text">Gestion des membres</a></button>

		<button type="button" class="btn btn-default"><a href="<?php echo $this->url('gestion_news');?>" class="btn-text">Gestion des news</a></button>
	</div>
		

<div class="form-group">


	<h1 class="text-center" id="legendtableau">Insertion d'une news</h1>

	<fieldset>

	<form method="post" class="form-horizontal">		
		<div class="form-goup">

		<input name="titre" type="text" class="form-control input-md" placeholder="Titre">
	</div>

	<div class="form-goup">
		<textarea class="form-control" name="contenu" rows="3" placeholder="Insérez votre news ici"></textarea>
	</div>

	<div class="form-goup">

		<input type="submit" name="envoyer"  class="btn btn-default btn-block">

	</div>
		
		</form>
	</fieldset>

</div>

<?php $this->stop('dashboard_section_account-info') ?>

