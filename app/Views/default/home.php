<?php $this->layout('layoutLanding', ['title' => 'Lookingforgroup.win']) ?>  ?>

<!-- Homepage -->
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

<?php $this->start('content_gauche') ?>
	




<?php $this->stop('content_gauche') ?>

<?php $this->start('content_droite') ?> 

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
			<input type="submit" name="inscription" value="Inscription" class="btn btn-default btn-lg btn-block"></a>
		
			<p>Déjà membre ?
			<a href="<?= $this->url('connexion_connexion') ?>"> Se connecter </a>
			</p>
		</div>



<?php $this->stop('content_droite') ?>


<?php $this->start('content_block-1-gauche') ?> 

	<h2>Rencontrez d'autres gamers !</h2>
	<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt maiores reprehenderit temporibus labore, et ratione commodi, repudiandae blanditiis nam earum, omnis quam asperiores culpa dolores fuga. Nisi odio, atque accusamus.</div>
<?php $this->stop('content_block-1-gauche') ?>


<?php $this->start('content_block-1-centre') ?> 
	<h2>Trouvez des partenaires de jeux !</h2>

	<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt maiores reprehenderit temporibus labore, et ratione commodi, repudiandae blanditiis nam earum, omnis quam asperiores culpa dolores fuga. Nisi odio, atque accusamus.</div>
<?php $this->stop('content_block-1-centre') ?>


<?php $this->start('content_block-1-droite') ?> 

	<h2>Partagez votre passion !</h2>
	<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt maiores reprehenderit temporibus labore, et ratione commodi, repudiandae blanditiis nam earum, omnis quam asperiores culpa dolores fuga. Nisi odio, atque accusamus.</div>
<?php $this->stop('content_block-1-droite') ?>


