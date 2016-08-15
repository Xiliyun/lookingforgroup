<!-- boutton de collapse -->
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>

<!-- TODO http://bootsnipp.com/snippets/featured/rainbow-nav METTRE UN TRUC COMME CA -->


    <div class="navbar-header">
        <a class="navbar-brand" href="<?= $this->url('accueil_accueil') ?>">Lookingforgroup.win</a>
    </div>

    <div id="myNavbar" class="collapse navbar-collapse">
		<!-- navigation principale -->

		<ul class="nav navbar-nav">
			<li><a href="<?= $this->url('accueil_accueil') ?>">Accueil</a></li>
			<li><a href="<?= $this->url('recherche_recherche') ?>">Recherche</a></li>
			<li><a href=""></a></li>
		</ul>






		<!-- navigation droite -->
    	<ul class="nav navbar-nav navbar-right">
    		<?php if($w_user['role'] == 1): // si l'utilisateur est admin ?>
			<li><a href="<?= $this->url('admin_dashboard') ?>">Admin</a></li> 
    		<?php endif; ?>

    		<!-- <li><p class="navbar-text">Espace membre : </p></li> -->    		
		<li class="dropdown">
		<!-- A faire : afficher nom de l'utilisateur -->

        	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Espace membre </b> <span class="caret"></span></a>
			<ul class="dropdown-menu">

				<!-- ici j'ai passé l'id de l'utilisateur connecté en paramètre :> -->
				<li><a href="<?= $this->url('profil_user', ['id' => $w_user['id_user']]) ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"> </span> Mon Profil</a></li> 
				<li><a href="<?= $this->url('profil_accountInfo') ?>"><span class="glyphicon glyphicon-cog" aria-hidden="true"> </span> Parametres</a></li> 
	            <li><a href="<?= $this->url('deconnexion_deconnexion') ?>">Se deconnecter</a></li>


	        </ul>


		</li>

    </div><!--/.navbar-collapse -->
