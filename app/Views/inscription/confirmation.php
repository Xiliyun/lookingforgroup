<?php $this->layout('layoutInscriptionConnexion',['title' => 'confirmation']) ?>

<?php $this->start('main_content') ?>

	<!-- todo confirmation par email du coup -->


	<!-- ANIMATION SUCCES XBOX -->

	<div class="container xbox_animation">
		<div class="achievement-banner">
			<div class="achievement-icon">
		    <span class="icon"><span class="icon-trophy"></span></span>
			</div>
			<div class="achievement-text">
				<p class="achievement-notification">Succès déverouillé</p>
				<p class="achievement-name">25G &ndash; être inscrit à lfg</p>
			</div>
		</div>
	</div>
	<!-- fin animation succès -->

	<div>
		<p> Bienvenue sur looking for group ! </p>

		<p> Felicitations, vous vous êtes inscrit avec succès à looking for group</p>
		<p>cliquez <a href="<?= $this->url('connexion_connexion') ?>">ici</a> pour vous connecter</p>
	</div>


<?php $this->stop('main_content') ?>


