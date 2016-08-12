<?php $this->layout('layoutProfil', ['title' => 'Lookingforgroup.win/Profil']) ?>
<?php 

	// une condition comme ça pour l'image de profil
				// $avatar = base_url() . "images/avatar.png";
				
				// if(($res[0]->thumb_url == "" || $res[0]->photostatus == 0) && $res[0]->gender == 0) {
				// 	$avatar = base_url() . "images/avatar.png";
				// } else if(($res[0]->thumb_url == "" || $res[0]->photostatus == 0) && $res[0]->gender == 1) {
				// 	$avatar = base_url() . "images/avatar.png";
				// } else if($res[0]->thumb_url != "") {
				// 	$avatar = $res[0]->thumb_url;
				// }
// DEFINITION DE TOUTES LES VARIABLES DE L'UTILISATEUR :

print_r($user);
print_r($userInfo);
print_r($userLocation);

// table user
$username = $user['username'];

$userDob = $user['dob'];
$userAge =DateTime::createFromFormat('Y-m-d', $userDob)->diff(new DateTime('now'))->y;

$gender = $user['gender'];

// table location
$city = $userLocation['city'];
$cp = $userLocation['postal_code'];
$country = $userLocation['country'];

 ?>



<!-- Page profil -->






<?php $this->start('profil-titre') ?>
	<p><h1>Votre profil</h1>
	<a href="#"> modifier les informations du profil</a></p>
<?php $this->stop('profil-titre') ?>





<?php $this->start('profil-gauche') ?>
	

        <!-- SIDEBAR USERPIC -->
    <div class="profile-userpic">
    	<img class="img-responsive center-block" alt="" src="http://dummyimage.com/500x500/000/fff">
    </div>
    <!-- END SIDEBAR USERPIC -->


    <!-- SIDEBAR USER TITLE -->
    <div class="profile-userinfo">
      <div class="profile-userinfo-username">
       	<?= $username?>
      </div>
      <div class="profile-userinfo-job">
        Developer
      </div>
    </div>
    <!-- END SIDEBAR USER TITLE -->

    <!-- SIDEBAR BUTTONS -->
    <div class="profile-userbuttons">
      <button type="button" class="btn btn-success btn-sm">Follow</button>
      <button type="button" class="btn btn-danger btn-sm">Message</button>
    </div>
    <!-- END SIDEBAR BUTTONS -->
    <!-- SIDEBAR MENU -->
    <div class="profile-usermenu">
      <ul class="nav">
        <li class="active">
          <a href="#">
          <i class="glyphicon glyphicon-home"></i>
          Overview </a>
        </li>
        <li>
          <a href="#">
          <i class="glyphicon glyphicon-user"></i>
          Account Settings </a>
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
    <!-- END MENU -->



	<!-- photo utilisateur -->
<!-- 
	<div class="col-xs-7 col-md-12">
		<img class="img-responsive center-block" alt="" src="http://dummyimage.com/500x500/000/fff">
	</div>
	<!-- username -->
	<div class="col-xs-5 col-md-12">
		<div class="profil-username">
			<h3><?= $username?></h3>
		</div>
	<!-- age -->
		<div class="profil-age">
			<p><?= $userAge ?> ans</p>
		</div>	
		<!-- sexe -->
		<div class="profil-sexe">
			<p>
			<?php if($gender == "m") { echo "homme";} elseif($gender == "f") { echo "femme";}?>	 	
			</p>
		</div>	

	<!-- ville -->
		<div class="profil-ville">
			<p>
			<?= $city .' - '. $cp ?>
			</p>
		</div>	

	</div> -->
<?php $this->stop('profil-gauche') ?>




<?php $this->start('profil-droite-nav') ?>
  <li role="presentation" class="active"><a href="#">Home</a></li>
  <li role="presentation"><a href="#">Profile</a></li>
  <li role="presentation"><a href="#">Messages</a></li>
<?php $this->stop('profil-droite-nav') ?>

<?php $this->start('profil-droite-content') ?>

<?php 
print_r($user);
print_r($userInfo);
print_r($userLocation);

 ?>

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



