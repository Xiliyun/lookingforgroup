<?php $this->layout('layoutRechercheAccueil', ['title' => 'Lookingforgroup.win/Accueil']) ?>

<!-- Page d'accueil -->





<?php $this->start('main_content') ?>


<div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">Derniers membres inscrits</h1>
            </div>

<?php foreach ($all_users as $key => $user): ?>
	<?php 
		if (empty($user['user_avatar']) && ($user['gender'] == "m")){
			$user_avatar = $this->assetUrl('img/avatar_man.svg');
		}
		elseif(empty($user['user_avatar']) && ($user['gender'] == "f")){
			$user_avatar = $this->assetUrl('img/avatar_woman.svg');
		}
		else{
			$user_avatar = $this->assetUrl('img/user/user_avatar/').$user['user_avatar'];
		}
	?>


            <div class="col-lg-2 col-md-3 col-xs-6 thumb text-center">
                <a class="thumbnail" href="<?=$this->url('profil_user',['id'=>$user['id_user']])?>">
                    <img class="img-responsive" src="<?= $user_avatar ?>" alt="">
                    <strong><?=$user['username']?></strong>
                    <p><?=$user['AGE']?> ans - <?=$user['city']?></p>
                </a>
            </div>
<?php endforeach ?>
  
</div>


<legend class="text-center">News</legend>

<!-- AFFICHAGE DES NEWS -->
<div class="row">
	<div class="col-md-2">
		<?php
		foreach ($news as $key => $value) {
			echo'<div class="container">';
			echo '<h3>'.$news[$key]['titre'].'</p>';
			echo '<blockquote>';
			echo '<p>'.$news[$key]['contenu'].'</p>';
			echo '<footer id="footerNews">'.$news[$key]['auteur'].' - '.$news[$key]['date'].'</footer id="footerNews">';
			echo '</blockquote>';
			echo'</div>';
		}
		?>
	</div>
</div>



<?php $this->stop('main_content') ?>


