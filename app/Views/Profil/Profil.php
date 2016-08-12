<?php $this->layout('layoutProfil', ['title' => 'Lookingforgroup.win/Profil']) ?>
<?php 

  // une condition comme ça pour l'image de profil
        // $avatar = base_url() . "images/avatar.png";
        
        // if(($res[0]->thumb_url == "" || $res[0]->photostatus == 0) && $res[0]->gender == 0) {
        //  $avatar = base_url() . "images/avatar.png";
        // } else if(($res[0]->thumb_url == "" || $res[0]->photostatus == 0) && $res[0]->gender == 1) {
        //  $avatar = base_url() . "images/avatar.png";
        // } else if($res[0]->thumb_url != "") {
        //  $avatar = $res[0]->thumb_url;
        // }
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
$description = $user_info['description'];
$user_avatar = $user_info['user_avatar'];

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
    <p><h1>Votre profil</h1>
    <i class="glyphicon glyphicon-pencil"></i><a href="#">modifier les informations du profil</a></p>
  <?php else: ?>
      <p><h1>Profil de <?= $username ?></h1></p>
  <?php endif; ?>

<?php $this->stop('profil-titre') ?>





<?php $this->start('profil-gauche') ?>
  

    <!-- SIDEBAR USERPIC -->
    <div class="profile-userpic">
    <?php if (empty($user_avatar) && ($gender == "m")): ?>
      <img class="img-responsive center-block" title ="user default avatar male" alt="user default avatar male" src="<?= $this->assetUrl('img/avatar_man.svg') ?>">
    <?php elseif(empty($user_avatar) && ($gender == "f")): ?>
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
      <p><?= $userAge?> ans </p>
      
      <p><?php if($gender == "m") { echo "homme";} elseif($gender == "f") { echo "femme";}?></p>

      <p><?= $city .' - '. $cp ?></p>
      </div>
    </div>
    <!-- END SIDEBAR USER TITLE -->

    <!-- SIDEBAR BUTTONS -->
    <?php if(!$main_user): ?>
    <div class="profile-userbuttons">
      <a href="#" class="btn btn-primary btn-info"><span class="glyphicon glyphicon-plus"></span> Ami</a>
      <a href="#" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-heart"></span> Love</a>
      <a href="#" class="btn btn-primary btn-warning"><span class="glyphicon glyphicon-pencil"></span> Message</a>
    </div>
  <?php endif; ?>



    <!-- END SIDEBAR BUTTONS -->
    <!-- SIDEBAR MENU -->
  <?php if($main_user): ?>
    <div class="profile-usermenu">
      <ul class="nav">
        <li class="active">
          <a href="#">
          <i class="glyphicon glyphicon-home"></i>
          Profil </a>
        </li>
        <li>
          <a href="#">
          <i class="glyphicon glyphicon-user"></i>
          Messages </a>
        </li>
        <li>
          <a href="#" target="_blank">
          <i class="glyphicon glyphicon-ok"></i>
          Tasks </a>
        </li>
        <li>
          <a href="#">
          <i class="glyphicon glyphicon-flag"></i>
          Help </a>
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

<?php $this->start('profil-droite-content-user_info') ?>



  <h2>A propos de moi</h2>
    <div class="divider"></div>
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
<?php $this->stop('profil-droite-content-user_info') ?>



<?php $this->start('profil-droite-content-user_genre') ?>
  <h2> Mes genres de jeu préféré </h2>
  <div class="genre-prefere">
     <?php 

      if($main_user) {

        if (empty ($user_genre_fav)) {
        echo "Vous n'avez pas indiqué vos goûts en jeux";
        }
        else {
          echo $description;
        }

      }
      else {
        if (empty ($user_genre_fav)) {
        echo $username." n'a pas indiqué ses goûts en jeux";
        }
        else {
          echo $description;
        }
      }


       ?>
  </div>
<?php $this->stop('profil-droite-content-user_genre') ?>
