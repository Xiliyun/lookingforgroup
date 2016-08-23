<?php $this->layout('layoutProfil', ['title' => 'Lookingforgroup.win/Profil']) ?>
<?php 

// TODO si le temps : englober le menu de gauche du profil grave redondant
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

 ?>



<!-- Page profil -->







<?php $this->start('profil-titre') ?>

  <?php if ($main_user): ?>
    <p><h1>Bienvenue <?= $username ?> !</h1>
    <i class="glyphicon glyphicon-pencil"></i><a href="<?= $this->url('profil_settings',['id' => $w_user['id_user']]) ?>">modifier les informations du profil</a></p>
  <?php else: ?>
      <p><h1>Profil de <?= $username ?></h1></p>
  <?php endif; ?>

<?php $this->stop('profil-titre') ?>





<?php $this->start('profil-gauche') ?>
  

    <!-- SIDEBAR USERPIC -->
    <div class="profile-userpic" data-toggle="modal" data-target="#imageModal">

    <?php if (empty($userInfo['user_avatar']) && ($gender == "m")): ?>
      <img class="img-responsive center-block" title ="user default avatar male" alt="user default avatar male" src="<?= $this->assetUrl('img/avatar_man.svg') ?>">
    <?php elseif(empty($userInfo['user_avatar']) && ($gender == "f")): ?>
      <img class="img-responsive center-block" title ="user default avatar female" alt="user default avatar female" src="<?= $this->assetUrl('img/avatar_woman.svg') ?>">
    <?php else: ?>
      <img class="img-responsive center-block" alt="photo de <?= $username ?>" src="<?= $user_avatar ?>">
    <?php endif ?>



    </div>
    <!-- END SIDEBAR USERPIC -->
    <!-- MODAL IMAGE -->
                <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Photo de <?= $username ?></h4>
                      </div>
                      <div class="modal-body">
                       
                        <?php if (empty($userInfo['user_avatar']) && ($gender == "m")): ?>
                          <img class="img-responsive center-block" title ="user default avatar male" alt="user default avatar male" src="<?= $this->assetUrl('img/avatar_man.svg') ?>">
                        <?php elseif(empty($userInfo['user_avatar']) && ($gender == "f")): ?>
                          <img class="img-responsive center-block" title ="user default avatar female" alt="user default avatar female" src="<?= $this->assetUrl('img/avatar_woman.svg') ?>">
                        <?php else: ?>
                          <img class="img-responsive center-block" alt="photo de <?= $username ?>" src="<?= $user_avatar ?>">
                        <?php endif ?>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                      </div>
                    </div>
                  </div>
                </div>

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
      <!-- <?php if($orientation == "hetero"):?>
          <?php if($gender == "m"){echo " - hétérosexuel"; }elseif($gender == "f"){echo " - hétérosexuelle";} ?><?php endif; ?>
      <?php if($orientation == "homo"):?>
          <?php if($gender == "m"){echo " - homosexuel"; }elseif($gender == "f"){echo " - homosexuelle";} ?><?php endif; ?>
      <?php if($orientation == "bi"):?>
          <?php if($gender == "m"){echo " - bisexuel"; }elseif($gender == "f"){echo " - bisexuelle";} ?><?php endif; ?> -->
      </p>

      <p><?= $city .' - '. $cp ?></p>
      </div>
    </div>
    <!-- END SIDEBAR USER TITLE -->

    <!-- SIDEBAR BUTTONS -->
    <?php if(!$main_user): ?>
    <div class="profile-userbuttons">

      <!-- ICI LA GESTION DES CONDITIONS S'ILS SONT AMIS OU NON -->
      <?php if (isset($isFriend) && $isFriend): ?>
        <!-- TODO ajouter condition au survol en css -->

          <form method="POST" class="hoverable">
            <button type="submit" class="btn btn-primary btn-info btn-ami" name="supprimer" value="<?=$id_user?>"> 
              <span class="normal"><?= $username ?> est votre <?php if($gender == "m") { echo "ami";} elseif($gender == "f") { echo "amie";}?></span>
              <span class="hover">Retirer <?= $username ?> des amis</span>
            </button>
          </form>

      <?php elseif(isset($isRequestSent) && $isRequestSent): ?>
          <form method="POST" class="hoverable">
            <button type="submit" class="btn btn-primary btn-info btn-demande-envoyee" name="annuler" value="<?=$id_user?>">
              <span class="normal"> Demande d'ami envoyée</span>
              <span class="hover">Annuler la demande</span>
            </button>
          </form>
      <?php elseif (isset($isRequestReceived) && $isRequestReceived): ?>
          <form method="POST" class="hoverable">
            <button type="submit" class="btn btn-primary btn-info btn-demande-reçue" name="accepter" value="<?=$id_user?>"> 
              <span class="normal"><?= $username ?> vous a envoyé une demande d'ami </span>
              <span class="hover">Accepter la demande</span>
            </button>
          </form>
      <?php else: ?>

      <form method="POST">
        <button type="submit" class="btn btn-primary btn-info" name="addFriend" value="<?=$id_user?>"><span class="glyphicon glyphicon-plus"></span> Ami</button>
      </form>

      <?php endif; ?>


      <!-- <a href="#" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-heart"></span> Love</a> -->
      <!-- <a href="#" class="btn btn-primary btn-warning"><span class="glyphicon glyphicon-pencil"></span> Message</a> -->


    </div>
  <?php endif; ?>



    <!-- END SIDEBAR BUTTONS -->
    <!-- SIDEBAR MENU -->
    <?php if($main_user): ?>
      <div class="profile-usermenu">
        <ul class="nav">
          <li class="active">
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




<?php $this->start('profil-droite-nav') ?>
  <li role="presentation" class="active"><a href="#">Home</a></li>
  <li role="presentation"><a href="#">Profile</a></li>
  <li role="presentation"><a href="#">Messages</a></li>
<?php $this->stop('profil-droite-nav') ?>

<?php $this->start('profil-droite-content-bloc1') ?>

<div class="col-md-9">
  <div class="profile-content">
    <div class="col-md-12">
 


  <h2>A propos de moi</h2>
      <div class="description">
        <?php 

        if($main_user) {

          if (empty ($description)) {
          echo "Vous n'avez pas ajouté de description";
          }
          else {
            echo $description;
          }

        }
        else {
          if (empty ($description)) {
          echo $username." n'a pas ajouté de description";
          }
          else {
            echo $description;
          }
        }

         ?>
      </div>
      <hr>
      <div class="objectifs">
          <p>Je suis ici pour :</p>

              <ul>
                <?php if($user['friendship'] == 1) { echo "<li>de l'amitié entre gamers</li>";} ?> 
                <?php if($user['love'] == 1) { echo "<li>de l'amour entre gamers</li>";} ?> 
            <?php if(!$main_user): ?>
                <?php if ($user['friendship'] == 0 && $user['love'] == 0) {echo $user['username']." n'a pas indiqué ses raisons d'être ici..." ; }?>
            <?php else: ?>
                <?php if ($user['friendship'] == 0 && $user['love'] == 0) {echo "Vous n'avez pas indiqué vos raisons d'être ici..." ; }?>
            <?php endif; ?>
              </ul>

      </div>
    </div>
  </div>
</div>


<?php $this->stop('profil-droite-content-bloc1') ?>

<!--  AFFICHAGE DES JEUX PREFERES -->


<?php $this->start('profil-droite-content-bloc2') ?>
<div class="col-md-9">
  <div class="profile-content">
    <div class="col-md-12">

      <h2> Mes genres de jeu préférés </h2>
          <div class="list-group list-group-horizontal">
              <?php if ($main_user): ?>
                  <?php if (empty($userGenreFav)): ?>
                        <p>Vous n'avez pas indiqué vos goûts en jeux, <a href="<?= $this->url('profil_userGaming',['id' => $w_user['id_user']]) ?>">modifiez vos genres de jeux favoris dans votre espace utilisateur !</a></p>
                  <?php else: ?>
                      <?php foreach ($userGenreFav as $key => $genre) :?>
                          <span class="list-group-item"><?= $genre['genre_name']?></span>
                      <?php endforeach; ?>
                  <?php endif ?>

              <?php else: ?>
                  <?php if (empty($userGenreFav)): ?>
                        <p> <?=$username ?> n'a pas indiqué ses goûts en jeux</p>
                  <?php else: ?>
                      <?php foreach ($userGenreFav as $key => $genre) :?>
                          <span class="list-group-item"><?= $genre['genre_name']?></span>
                      <?php endforeach; ?>
                  <?php endif ?>


              <?php endif ?>

      </div>

    </div>
  </div>
</div>

<?php $this->stop('profil-droite-content-bloc2') ?>



<?php $this->start('profil-droite-content-bloc3') ?>
<!-- AFFICHAGE DES SUGGESTIONS D'AMIS -->
<div class="col-md-12">
  <div class="profile-content">
        <?php if ($main_user): ?>
        <h2> Suggestion d'amis </h2>
       <?php if (!empty($sharedGenreFav)): ?>
            <p><?=$username ?>, ces personnes partagent les mêmes goûts en jeux que vous !</p>
            
            <?php foreach ($sharedGenreFav as $shared): ?>
              <?php 
              // traitement des variables
                if (empty($shared['userInfo']['user_avatar']) && ($shared['user']['gender'] == "m")){
                  $user_avatar = $this->assetUrl('img/avatar_man.svg');

                }
                elseif(empty($shared['userInfo']['user_avatar']) && ($shared['user']['gender'] == "f")){
                  $user_avatar = $this->assetUrl('img/avatar_woman.svg');

                }
                else{
                  $user_avatar = $this->assetUrl('img/user/user_avatar/').$shared['userInfo']['user_avatar'];
                }

                if($shared['user']['gender'] == "m") { $user_gender_sign = '<i class="fa fa-mars" aria-hidden="true"></i>'; $user_gender = "homme";}
                if($shared['user']['gender'] == "f") { $user_gender_sign = '<i class="fa fa-venus" aria-hidden="true"></i>'; $user_gender = "femme";}




               ?>
                  <div class="col-md-2 col-sm-4 col-xs-6">
                      <div class="well well-sm">
                          <div class="media">

                          <!-- Le lien sera le profil de l'utilisateur -->

                              <a class="thumbnail" href="<?= $this->url('profil_user', ['id' => $shared['user']['id_user']]) ?>">
                              <img class="media-object" title ="user default avatar male" alt="user default avatar male" src="<?=$user_avatar?>">
                              </a>
                              <div class="media-body">
                                  <h4 class="media-heading"><?= $user_gender_sign ?> - <?= $shared['user']['username']; ?></h4>
                                  <p><?= $shared['userLocation']['city']; ?></p>
                                  <p>En commun : <?= $shared['shared_genre_nb']?></p>
                              </div>
                          </div>
                      </div>
                  </div>         
              



            <?php endforeach ?>
            
          <?php else: ?>
            <p>C'est dommage, mais nous n'arrivons pas à vous trouver des amis, peut être devriez vous <a href="<?= $this->url('profil_userGaming',['id' => $w_user['id_user']]) ?>">indiquer vos genres de jeux favoris dans votre espace utilisateur !</a></p>
          <?php endif; ?>




        <?php endif; ?>
  </div>
</div>
<?php $this->stop('profil-droite-content-bloc3') ?>
