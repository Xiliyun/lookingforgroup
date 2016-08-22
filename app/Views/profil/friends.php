<?php $this->layout('layoutProfil', ['title' => 'Lookingforgroup.win/Vos Amis']) ?>

<?php 

// TODO si le temps : englober le menu de gauche du profil dans un sidenav
// DEFINITION DE TOUTES LES VARIABLES DE L'UTILISATEUR :

// table user
$id_user = $user['id_user'];
$username = $user['username'];

$userDob = $user['dob'];
$userAge =DateTime::createFromFormat('Y-m-d', $userDob)->diff(new DateTime('now'))->y;

$gender = $user['gender'];

// table user_location
$city = $userLocation['city'];
$cp = $userLocation['postal_code'];
$country = $userLocation['country'];

// Table user_info
$description = $userInfo['description'];
$user_avatar = $this->assetUrl('img/user/user_avatar/'.$userInfo['user_avatar']);
$orientation = $userInfo['orientation'];


// Table genre préféré (TODO)

// GESTION DE LA PAGE DE PROFIL DYNAMIQUE (utilisateur connecté ou non)
if ($id_user == $w_user['id_user']) {
  $main_user = true;
} else {
  $main_user = false;
}



// GESTION DES AMIS

 ?>



<!-- Page profil -->






<?php $this->start('profil-titre') ?>
  <?php if ($main_user): ?>
    <p><h1>Vos amis</h1>
    <i class="glyphicon glyphicon-pencil"></i><a href="<?= $this->url('profil_settings',['id' => $w_user['id_user']]) ?>">modifier les informations du profil</a></p>
  <?php else: ?>
      <p><h1>Amis de <?= $username ?></h1></p>
  <?php endif; ?>

<?php $this->stop('profil-titre') ?>





<?php $this->start('profil-gauche') ?>
  

    <!-- SIDEBAR USERPIC -->
    <div class="profile-userpic">
    <?php if (empty($userInfo['user_avatar']) && ($gender == "m")): ?>
      <img class="img-responsive center-block" title ="user default avatar male" alt="user default avatar male" src="<?= $this->assetUrl('img/avatar_man.svg') ?>">
    <?php elseif(empty($userInfo['user_avatar']) && ($gender == "f")): ?>
      <img class="img-responsive center-block" title ="user default avatar female" alt="user default avatar female" src="<?= $this->assetUrl('img/avatar_woman.svg') ?>">
    <?php else: ?>
      <img class="img-responsive center-block" alt="" src="<?= $user_avatar ?>">
    <?php endif ?>






    </div>
    <!-- END SIDEBAR USERPIC -->


    <!-- SIDEBAR USER TITLE -->
    <div class="profile-userinfo">
      <div class="profile-userinfo-username">
        <?= $username?>
      </div>
      <div class="profile-userinfo-info">
      <p>LVL <?= $userAge?></p>
      
      <p>
      <!-- gender -->
      <?php if($gender == "m") { echo "homme";} elseif($gender == "f") { echo "femme";}?>
      <!-- orientation -->
      <?php if($orientation == "hetero"):?>
          <?php if($gender == "m"){echo " - hétérosexuel"; }elseif($gender == "f"){echo " - hétérosexuelle";} ?><?php endif; ?>
      <?php if($orientation == "homo"):?>
          <?php if($gender == "m"){echo " - homosexuel"; }elseif($gender == "f"){echo " - homosexuelle";} ?><?php endif; ?>
      <?php if($orientation == "bi"):?>
          <?php if($gender == "m"){echo " - bisexuel"; }elseif($gender == "f"){echo " - bisexuelle";} ?><?php endif; ?>
      </p>

      <p><?= $city .' - '. $cp ?></p>
      </div>
    </div>
    <!-- END SIDEBAR USER TITLE -->

    <!-- SIDEBAR BUTTONS -->


    <!-- enlevé car la gestion de l'ajour d'ami se fait sur la page du profil -->



    <!-- END SIDEBAR BUTTONS -->
    <!-- SIDEBAR MENU -->
  <?php if($main_user): ?>
    <div class="profile-usermenu">
      <ul class="nav">
        <li>
          <a href="<?= $this->url('profil_user', ['id' => $w_user['id_user']]) ?>">
          <i class="glyphicon glyphicon-home"></i>
          Profil </a>
        </li>
        <li>
          <a href="<?= $this->url('profil_friends', ['id' => $w_user['id_user']]) ?>">
          <i class="glyphicon glyphicon-user"></i>
          Amis </a>
        </li>
        <li>
          <a href="#">
          <i class="glyphicon glyphicon-envelope"></i>
          Messages </a>
        </li>

      </ul>
    </div>
  <?php else: ?>
    <div class="profile-usermenu">
      <ul class="nav">
       <li class="">
          <a href="<?= $this->url('profil_user', ['id' => $id_user]) ?>">
          <i class="glyphicon glyphicon-home"></i>
          Profil </a>
        </li>       
        <li>
          <a href="<?= $this->url('profil_friends', ['id' => $id_user ]) ?>">
          <i class="glyphicon glyphicon-user"></i>
          Amis </a>
        </li>
  
      </ul>
    </div>

  <?php endif; ?>
    <!-- END MENU -->


<?php $this->stop('profil-gauche') ?>

<!-- END REDONDANCE DE MENU -->


<!-- CONTENT DE DROITE -->


<?php $this->start('profil-droite-content-bloc1') ?>

<!-- AFFICHAGE DES CONFIRMATIONS ICI -->
<?php if(isset($_GET['confirm'])): ?>
  

<div class="col-md-9">
    <div class="col-md-12">
 
      <?php if ($_GET['confirm'] == "accepted"): ?>
        <p class='alert alert-success'>Félicitations, vous êtes maintenant ami avec <?= $_GET['friend'] ?> :) !</p>
      <?php endif ?>
      <?php if ($_GET['confirm'] == "refused"): ?>
        <p class='alert alert-success'>Demande d'ami de <?= $_GET['friend'] ?> ignorée avec succès.</p>
      <?php endif ?>
      <?php if ($_GET['confirm'] == "canceled"): ?>
        <p class='alert alert-success'>Demande d'ami avec <?= $_GET['friend'] ?> annulée avec succès.</p>
      <?php endif ?>
      <?php if ($_GET['confirm'] == "deleted"): ?>
        <p class='alert alert-success'><?= $_GET['friend'] ?> a été supprimé(e) de votre liste d'amis. </p>
      <?php endif ?>

    </div>
</div>
<?php endif ?>

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- FRIENDS LIST -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<div class="col-md-9">
  <div class="profile-content">
    <div class="col-md-12">
 


  	<h2>Mes amis</h2>
  	<!-- affichage de tous les amis en bdd -->
    
      <?php if (!empty($friend_list)): ?>

        <?php foreach ($friend_list as $friend): ?>
          


              <div class="col-md-4">
                      <div class="well well-sm">
                          <div class="media">

                          <!-- Le lien sera le profil de l'utilisateur -->
                              <?php  
                              // id_friend à afficher =/= de l'utilisateur connecté
                              if($friend['id_user_one'] == $w_user['id_user']) { $id_friend = $friend['id_user_two'] ;}
                              else ($id_friend = $friend['id_user_one']);
                              ?>
                              <a class="thumbnail pull-left" href="<?= $this->url('profil_user', ['id' => $id_friend]) ?>">



                                  <?php if (empty($friend['userInfo']['user_avatar']) && ($friend['user']['gender'] == "m")): ?>
                                  <img class="media-object" title ="user default avatar male" alt="user default avatar male" src="<?= $this->assetUrl('img/avatar_man.svg') ?>">
                                  <?php elseif(empty($friend['userInfo']['user_avatar']) && ($friend['user']['gender'] == "f")): ?>
                                  <img class="media-object" title ="user default avatar female" alt="user default avatar female" src="<?= $this->assetUrl('img/avatar_woman.svg') ?>">
                                  <?php else: ?>
                                  <img class="media-object" alt="photo de <?= $friend['user']['username']; ?>" src="<?=  $this->assetUrl('img/user/user_avatar/').$friend['userInfo']['user_avatar'] ?>">
                                  <?php endif ?>
                              </a>
                              <div class="media-body">
                                  <h4 class="media-heading"><?= $friend['user']['username']; ?></h4>
                                  <p><?= $friend['userLocation']['city']; ?></p>
                                  <?php if($main_user): ?>

                                  <p>

                                        <form method="POST">
                                        <button type="submit" name="supprimer" class="btn btn-xs btn-default" value="<?= $friend['id_user_one'] ?>" "><span class="glyphicon glyphicon-ban-circle"></span> Supprimer </button>
                                        </form>
                                  </p>

                                  <?php endif; ?>
                              </div>
                          </div>
                      </div>
                  </div>         



        <?php endforeach ?>
        
      <?php else: ?>
        <p>Cette section est bien vide... </p>
      <?php endif; ?>





    </div>
  </div>
</div>


<?php $this->stop('profil-droite-content-bloc1') ?>


<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- FRIENDS REQUEST LIST -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<?php $this->start('profil-droite-content-bloc2') ?>
<!-- TODO mettre ici une condition que cette partie est uniquement visible à l'utilisateur connecté -->

<?php if($main_user): ?>


  <div class="col-md-9">
    <div class="profile-content">
      <div class="col-md-12">

      	<h2> Mes demandes d'amis </h2>

        <!-- gauche : reçues -->
  		<div class="col-xs-6">
  			<h3>reçues</h3>
  			<p>Vous avez reçu ces demandes d'ami :</p>
  				<div class="row">
  				<?php if(!empty($friend_request_received)): ?>
  					<?php foreach ($friend_request_received as $key => $received) : ?>
  						<!-- DEBUT DE L'AFFICHAGE EN BOUCLE !!! -->



  						<div class="col-md-4">
  				            <div class="well well-sm">
  				                <div class="media">

  				                <!-- Le lien sera le profil de l'utilisateur -->
  				                    <a class="thumbnail pull-left" href="<?= $this->url('profil_user', ['id' => $received['id_user_one'] ]) ?>">
  										<?php if (empty($received['userInfo']['user_avatar']) && ($received['user']['gender'] == "m")): ?>
  										<img class="media-object" title ="user default avatar male" alt="user default avatar male" src="<?= $this->assetUrl('img/avatar_man.svg') ?>">
  										<?php elseif(empty($received['userInfo']['user_avatar']) && ($received['user']['gender'] == "f")): ?>
  										<img class="media-object" title ="user default avatar female" alt="user default avatar female" src="<?= $this->assetUrl('img/avatar_woman.svg') ?>">
  										<?php else: ?>
  										<img class="media-object" alt="photo de <?= $received['user']['username']; ?>" src="<?=  $this->assetUrl('img/user/user_avatar/').$received['userInfo']['user_avatar'] ?>">
  										<?php endif ?>
  				                    </a>
  				                    <div class="media-body">
  				                        <h4 class="media-heading"><?= $received['user']['username']; ?></h4>
  				                        <p>
  				                        <!-- Le bouton annuler fait une suppression -->
                                        <form method="POST">
                                        <button type="submit" name="accepter" class="btn btn-xs btn-default" value="<?= $received['id_user_one'] ?>"><span class="glyphicon glyphicon-ok" ></span> Accepter </button>
                                        <button type="submit" name="refuser" class="btn btn-xs btn-default" value="<?= $received['id_user_one'] ?>" "><span class="glyphicon glyphicon-ban-circle"></span> Refuser </button>
                                        </form>
  				                        </p>
  				                    </div>
  				                </div>
  				            </div>
  				        </div>



  					<?php endforeach; ?>
  				<?php else: ?>
  					<p> vous n'avez aucune demande d'ami en attente :(</p>
  				<?php endif; ?>

  			</div>
  		</div>




        <!-- droites : envoyées -->
  		<div class="col-xs-6">
  			<h3>envoyées</h3>
  			<p>Vous avez envoyé des demandes d'amis aux personnes suivantes :</p>

  			<div class="row">
  			<?php if(!empty($friend_request_sent)): ?>
  				<?php foreach ($friend_request_sent as $key => $sent) : ?>
  					<!-- DEBUT DE L'AFFICHAGE EN BOUCLE !!! -->



  					<div class="col-md-4">
  			            <div class="well well-sm">
  			                <div class="media">
  			                <!-- Le lien sera le profil de l'utilisateur -->
  			                    <a class="thumbnail pull-left" href="<?= $this->url('profil_user', ['id' => $sent['id_user_two'] ]) ?>">
  									<?php if (empty($sent['userInfo']['user_avatar']) && ($sent['user']['gender'] == "m")): ?>
  									<img class="media-object" title ="user default avatar male" alt="user default avatar male" src="<?= $this->assetUrl('img/avatar_man.svg') ?>">
  									<?php elseif(empty($sent['userInfo']['user_avatar']) && ($sent['user']['gender'] == "f")): ?>
  									<img class="media-object" title ="user default avatar female" alt="user default avatar female" src="<?= $this->assetUrl('img/avatar_woman.svg') ?>">
  									<?php else: ?>
  									<img class="media-object" alt="photo de <?= $sent['user']['username']; ?>" src="<?=  $this->assetUrl('img/user/user_avatar/').$sent['userInfo']['user_avatar'] ?>">
  									<?php endif ?>
  			                    </a>
  			                    <div class="media-body">
  			                        <h4 class="media-heading"><?= $sent['user']['username']; ?></h4>
  			                        <p>
  			                        <!-- Le bouton annuler fait une suppression -->
                                <form method="POST">
                                  <button type="submit" name="annuler" class="btn btn-xs btn-default" value="<?= $sent['id_user_two'] ?>" "><span class="glyphicon glyphicon-ban-circle"></span> Annuler</a></button>

                                </form>

  			                        </p>
  			                    </div>
  			                </div>
  			            </div>
  			        </div>



  				<?php endforeach; ?>
  			<?php else: ?>
  				<p> vous n'avez envoyé aucune demande d'ami </p>
  			<?php endif; ?>
  			</div>
  			<!-- FIN DE LA BOUCLE -->
  		</div>


      </div>
    </div>
  </div>

<?php endif; ?>

<?php $this->stop('profil-droite-content-bloc2') ?>
