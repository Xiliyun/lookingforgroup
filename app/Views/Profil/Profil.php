<?php $this->layout('layoutProfil', ['title' => 'Lookingforgroup.win/Profil']) ?>

<!-- Page profil -->

<?php $this->start('nav_main') ?>

    <div class="navbar-header">
        <a class="navbar-brand" href="#">LOGO ICI?</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="">Accueil</a></li>
						<li><a href="">Recherche</a></li>
						<li><a href=""></a></li>
						<li><a href="<?= $this->url('deconnexion_deconnexion') ?>"><input type="submit" id="deconnexion" name="deconnexion" value="Se deconnecter" class="btn btn-default btn-block"></a></li>

					</ul>

					<ul class="nav navbar-nav navbar-right">
						
						<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Espace membre<span class="caret"></span></a>

							<ul class="dropdown-menu">
								<li></li>
								<li></li>
							</ul>

					    </li>
					</ul>	
				</div>

<?php $this->stop('nav_main') ?>





<?php $this->start('profil-titre') ?>
	<p><h1>Votre profil</h1>
	<a href="#"> modifier les informations du profil</a></p>
<?php $this->stop('profil-titre') ?>





<?php $this->start('profil-gauche') ?>
	
	<!-- photo utilisateur -->

	<div class="col-xs-7 col-md-12">
		<img class="img-responsive center-block" alt="" src="http://dummyimage.com/500x500/000/fff">
	</div>
	<!-- username -->
	<div class="col-xs-5 col-md-12">
		<div class="profil-username">
			<h3><?php echo $user['username'];?></h3>
		</div>
	<!-- age -->
		<div class="profil-age">
			<p>Age : <?php
			$userDob = $user['dob'];
			echo " (".DateTime::createFromFormat('Y-m-d', $userDob)->diff(new DateTime('now'))->y." ans)";
			 // a faire : calculer l'âge (DateTime::createFromFormat('Y-m-d', $userDob)->diff(new DateTime('now'))->y);
			 ?></p>
		</div>	
		<!-- sexe -->
		<div class="profil-sexe">
			<p>sexe : 
			<?php if($user["sexe"] == "h") { echo "homme";} elseif($user["sexe" =="f"]) { echo "femme";}?>	 	
			</p>
		</div>	

	<!-- ville -->
		<div class="profil-ville">
			<p>ville : 
			<?php echo $user["city"]." (".$user["code_postal"].")"; ?>	 	
			</p>
		</div>	

	</div>
<?php $this->stop('profil-gauche') ?>



<?php $this->start('profil-droite') ?>

<h3>ICI LES ONGLETS AFFICHANT LES INFORMATIONS DU PROFIL : Général / amis / Photos</h3>
<div>
	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</div>
<?php $this->stop('profil-droite') ?>



<h1>Profil</h1>


<!-- Franck : creer la vue dans la BDD -->
<h3><?php echo $user['username'];?></h3>

<h3><?php echo $user['dob'];?></h3>

<h3><?php echo $LocalisationProfil['city'];?></h3>

<h2>Description</h2>
<p><?php echo $MesInfosDeProfil['description'];?></p>



