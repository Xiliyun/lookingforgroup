<?php $this->layout('layout', ['title' => 'Lookingforgroup.win/Profil']) ?>

<!-- Page profil -->

<?php $this->start('nav_otherPages') ?>
<?php $this->stop('nav_otherPages') ?>

<?php $this->start('main_content') ?>

<h1>Profil</h1>


<!-- Franck : creer la vue dans la BDD -->
<h3><?php echo $user['username'];?></h3>

<h3><?php echo $user['dob'];?></h3>

<h3><?php echo $LocalisationProfil['ville'];?></h3>

<h2>Description</h2>
<p><?php echo $MesInfosDeProfil['description'];?></p>

<?php $this->stop('main_content') ?>
