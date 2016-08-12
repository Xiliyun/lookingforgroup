<?php $this->layout('layoutLanding', ['title' => 'Lookingforgroup.win']) ?>  ?>

<!-- Homepage -->

<?php $this->start('content_header_gauche') ?>
	




<?php $this->stop('content_header_gauche') ?>

<?php $this->start('content_header_droite') ?> 

		<h1 hidden>Looking for group, site de rencontre pour gamers</h1>

		<div class="img-responsive">	
			<img src="<?= $this->assetUrl('img/logo-OK.svg');?>" >
		</div>



		<div>
			Un site communautaire de rencontre cool entre gamers!
		</div>


		<div>
			<p>Première visite ? </p>
			<a href="<?= $this->url('inscription_inscription') ?>">
			<input type="submit" name="inscription" value="Inscription" class="btn btn-lg btn-block" id="btnInscription"></a>
		
			<p>Déjà membre ?
			<a href="<?= $this->url('connexion_connexion') ?>"> Se connecter </a>
			</p>
		</div>



<?php $this->stop('content_header_droite') ?>

<?php $this->start('content_header-bas-1') ?> 
	<span class="glyphicons glyphicons-gamepad">fdg</span>	<h2>Rencontrez d'autres gamers !</h2>
	<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt maiores reprehenderit temporibus labore, et ratione commodi, repudiandae blanditiis nam earum, omnis quam asperiores culpa dolores fuga. Nisi odio, atque accusamus.</div>
<?php $this->stop('content_header-bas-1') ?> 

<?php $this->start('content_header-bas-2') ?> 
	<h2>Trouvez des partenaires de jeux !</h2>
	<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt maiores reprehenderit temporibus labore, et ratione commodi, repudiandae blanditiis nam earum, omnis quam asperiores culpa dolores fuga. Nisi odio, atque accusamus.</div>
<?php $this->stop('content_header-bas-2') ?> 

<?php $this->start('content_header-bas-3') ?> 
	<h2>Partagez votre passion !</h2>
	<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt maiores reprehenderit temporibus labore, et ratione commodi, repudiandae blanditiis nam earum, omnis quam asperiores culpa dolores fuga. Nisi odio, atque accusamus.</div>
<?php $this->stop('content_header-bas-3') ?> 

<?php $this->start('content_header-bas-4') ?> 
	<h2>Et un peu plus si affinités...</h2>
	<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt maiores reprehenderit temporibus labore, et ratione commodi, repudiandae blanditiis nam earum, omnis quam asperiores culpa dolores fuga. Nisi odio, atque accusamus.</div>
<?php $this->stop('content_header-bas-4') ?> 





<!-- MAIN CONTENT -->
<?php $this->start('content_block-1') ?> 

<?php $this->stop('content_block-1') ?>


<?php $this->start('content_block-2-gauche') ?> 

<?php $this->stop('content_block-2-gauche') ?>


<?php $this->start('content_block-2-centre') ?> 

<?php $this->stop('content_block-2-centre') ?>


<?php $this->start('content_block-2-droite') ?> 

<?php $this->stop('content_block-2-droite') ?>


