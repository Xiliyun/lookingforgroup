<!-- boutton de collapse -->
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>



    <div class="navbar-header">
        <a class="navbar-brand" href="<?= $this->url('default_home') ?>">Lookingforgroup.win</a>
    </div>

    <div id="myNavbar" class="collapse navbar-collapse">
    	<ul class="nav navbar-nav navbar-right">
    		<li><p class="navbar-text">déjà membre?</p></li>
			<!-- FORMULAIRE DE CONNEXION DIRECTEMENT DEPUIS LA PAGE D'ACCUEIL -->

		<li class="dropdown">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Se connecter</b> <span class="caret"></span></a>
			<ul id="login-dp" class="dropdown-menu">
				<li>

					<div class="row">
						<div class="col-md-12">
								 <form class="form" role="form" method="POST" id="login-nav">
									<div class="form-group">
										 <label class="sr-only" for="username">Email address</label>
										 <input type="text" class="form-control" id="username" name="username" placeholder="Pseudo ou adresse mail" required>
									</div>
									<div class="form-group">
										 <label class="sr-only" for="password">Password</label>
										 <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
                                         <!-- <div class="help-block text-right"><a href="">Forget the password ?</a></div> -->
									</div>
									<div class="form-group">
										 <input type="submit" id="connexion" name="connexion" value="Se connecter" class="btn btn-primary btn-block">
									</div>
									<p class="errors"><?php if(isset($_GET['errors'])) echo $_GET['errors']; ?></p>
									<!-- <div class="checkbox">
										 <label>
										 <input type="checkbox"> keep me logged-in
										 </label>
									</div> -->
								 </form>
							</div>
							<div class="bottom text-center">
								Pas de compte ? <a href="<?= $this->url('inscription_inscription') ?>"><b>Devenez membre !</b></a>
						</div>
					</div>

				</li>
	    </ul>

    </div><!--/.navbar-collapse -->
