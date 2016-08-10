<?php $this->layout('layout', ['title' => 'Lookingforgroup.win/Accueil']) ?>


<!-- Page d'accueil -->

<!-- <?php //$this->start('nav_otherPages') ?>
<?php //$this->stop('nav_otherPages') ?> -->

<div class="space"></div>




<!-- Franck -->

<?php $this->start('main_content') ?>

<h1>ACCUEIL</h1>

<?php
foreach ($all_users as $key => $value) {
	echo '<div class="col-sm-4 col-lg-4 col-md-4">';
	echo '<p>'.$all_users[$key]['username'].'</p>';
	echo '<p>'.$all_users[$key]['ville'].'</p>';
	echo '<p>'.$all_users[$key]['dob'].'</p>';
	echo '</div>';
}



echo "<pre>";
print_r($all_users);
echo "</pre>";
?>

<?php $this->stop('main_content') ?>
