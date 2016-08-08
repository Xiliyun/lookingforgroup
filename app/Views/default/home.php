<?php $this->layout('layoutHome') ?>

<!-- PAGE D'ACCUEIL -->
	
<?php $this->start('main_content') ?>
	

	<div class="container">
		<form class="form-inline" role="form" style="margin-top:250px;">
			<label>Déjà inscrit?</label>
			<a href="<?= $this->url('connexion_connexion') ?>"><input type="button" name="connexion" value="Connexion"></a>

			<label>1ère visite?</label>
			<a href="<?= $this->url('inscription_inscription') ?>"><input type="button" name="inscription" value="Inscription"></a>
		</form>
	</div>




		
	<div id="baseline">
		<p>Un site de rencontre (amitié et/ou amoureuse) orienté sur les goûts en jeux vidéo et à caractère communautaire.</p>
	</div>



<?php $this->stop('main_content') ?>
