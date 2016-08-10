<?php $this->layout('layout', ['title' => 'Lookingforgroup.win']) ?>  ?>

<!-- Homepage -->
<?php $this->start('nav_homepage') ?> 
	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Lookingforgroup.win</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
 			
           <!--  <button type="submit" class="btn btn-default">Connectez-vous</button> -->
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

<?php $this->stop('nav_homepage') ?>
	

	
<?php $this->start('main_content') ?> 

<div id=bloc-image-home>
	
	<img src="<?= $this->assetUrl('img/ex-img-acc.jpg');?>" >
</div>

<div id=bloc-connect-home>


	<div id="bloc-boutons-home">
		<p>Déjà membre : </p>
		<a href="<?= $this->url('connexion_connexion') ?>">
		<input type="submit" name="connexion" value="Connexion" class="btn btn-default"></a>

		<p>Première visite : </p>
		<a href="<?= $this->url('inscription_inscription') ?>">
		<input type="submit" name="inscription" value="Inscription" class="btn btn-default"></a>
	</div>



	

	<div id="logo" class="img-responsive">	
		<img src="<?= $this->assetUrl('img/logo-OK.svg');?>" >
	</div>

	

<div class="clear"></div>

</div>
		
		




	







<?php $this->stop('main_content') ?>
