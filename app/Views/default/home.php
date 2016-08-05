<?php $this->layout('layout', ['title' => 'Looking For Group']) ?>

<!-- PAGE D'ACCUEIL -->

<?php $this->start('main_content') ?>

<form>
	<label>Déjà inscrit?</label>
	<input type="button" name="connexion" value="Connexion">

	<label>1ère visite?</label>
	<input type="button" name="inscription" value="Inscription">
</form>

<?php $this->stop('main_content') ?>
