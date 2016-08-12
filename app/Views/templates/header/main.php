<!-- boutton de collapse -->
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>



    <div class="navbar-header">
        <a class="navbar-brand" href="<?= $this->url('accueil_accueil') ?>">Lookingforgroup.win</a>
    </div>

    <div id="myNavbar" class="collapse navbar-collapse">
		<!-- navigation principale -->

		<ul class="nav navbar-nav">
			<li><a href="<?= $this->url('accueil_accueil') ?>">Accueil</a></li>
			<li><a href="">Recherche</a></li>
			<li><a href=""></a></li>
		</ul>






		<!-- navigation droite -->
    	<ul class="nav navbar-nav navbar-right">
    		<li><p class="navbar-text">Espace membre : </p></li>
			<!-- FORMULAIRE DE CONNEXION DIRECTEMENT DEPUIS LA PAGE D'ACCUEIL -->

		<li class="dropdown">
		<!-- A faire : afficher nom de l'utilisateur -->
         <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Espace membre </b> <span class="caret"></span></a>
			<ul class="dropdown-menu">

			<!-- TODO gérer : if user connecté ou non !!! -->
			<?php if($w_user == null): // si l'utilisateur n'est pas connecté ?>

			<?php else: ?>
				<li><a href="<?= $this->url('profil_myprofile') ?>">Mon Profil</a></li> 
	            <li role="separator" class="divider"></li>
	            <li><a href="<?= $this->url('deconnexion_deconnexion') ?>">Se deconnecter</a></li>

			<?php endif; ?>

	        </ul>


				</li>

    </div><!--/.navbar-collapse -->
