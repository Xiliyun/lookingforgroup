<?php $this->layout('layoutLanding', ['title' => 'Lookingforgroup.win']) ?>  ?>

<!-- Homepage -->

<?php $this->start('content_header_gauche') ?>
	


<?php $this->stop('content_header_gauche') ?>

<?php $this->start('content_header_full') ?> 

		<h1 hidden>Looking for group, site de rencontre pour gamers</h1>

		<div class="img-responsive">	
			<img src="<?= $this->assetUrl('img/logo-OK.svg');?>" >
		</div>


		<div>
			<p>Un site communautaire de rencontre cool entre gamers!</p>
			<a href="<?= $this->url('inscription_inscription') ?>">
			<input type="submit" name="inscription" value="Inscription" class="btn btn-lg" id="btnInscription"></a>
		
			<p>Déjà membre ?
			<a href="<?= $this->url('connexion_connexion') ?>"> Se connecter </a>
			</p>
		</div>



<?php $this->stop('content_header_full') ?>

<?php $this->start('content_header-bas-1') ?> 
<div>
	<i class="fa fa-gamepad fa-4x" aria-hidden="true"></i>
	<h2>Rencontrez d'autres gamers !</h2>
	<p>Basé sur vos goûts de jeux, rencontrez d'autres gamers dans votre région</p>
</div>
<?php $this->stop('content_header-bas-1') ?> 

<?php $this->start('content_header-bas-2') ?> 
<div>
	<i class="fa fa-users fa-4x" aria-hidden="true"></i>
	<h2>Trouvez des partenaires de jeux !</h2>
	<p>Vous aimez le multiplayer? vous n'êtes pas le seul !</p>
</div>
<?php $this->stop('content_header-bas-2') ?> 

<?php $this->start('content_header-bas-3') ?> 
<div>
	<i class="fa fa-comments fa-4x" aria-hidden="true"></i>
	<h2>Partagez votre passion !</h2>
	<p>Venez participer aux chats et events de la communauté !</p>
</div>
<?php $this->stop('content_header-bas-3') ?> 

<?php $this->start('content_header-bas-4') ?> 
<div>
	<i class="fa fa-heart fa-4x" aria-hidden="true"></i>
	<h2>Et un peu plus si affinités...</h2>
	<p>On est quand même là pour se... rencontrer ;)</p>
</div>
<?php $this->stop('content_header-bas-4') ?> 





<!-- MAIN CONTENT -->