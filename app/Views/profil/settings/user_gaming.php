<?php $this->layout('layoutSettings', ['title' => 'Votre vie de gamer']) ?>



<?php $this->start('dashboard_titre') ?>
        <div>
          <h3>Vos vies de gamer</h4>
          <p></p>
        </div>

		<?php if(isset($_GET['confirm'])) echo "<p class='alert alert-success'>Vos modifications ont bien été prises en compte</p>"; 


		?>

<?php $this->stop('dashboard_titre') ?>

<?php $this->start('dashboard_section_user-gaming') ?>


	<div class="col-sm-9 game_genre_selection">
	<!-- AFFICHAGE DES GENRES -->
		<div class="well">

			<form method="POST">
				<div class="form-horizontal">
					<legend>Vos genres de jeux préférés :</legend>
					<p class="help-block">Notre sélection se fait en anglais pour le moment, mais on travaille sur une version française ;)</p>

					<!-- ici le champs de recherche pour affichage dynamique mais j'ai pas réussi T_T-->
					<input class="form-control input-lg" type="search" id="recherche_nom_genre" placeholder="rechercher un genre par son nom">
					<label for="check-all"><input type="checkbox" id="check-all">Sélectionner / désélectionner tout</label>
					<div>
						<?php foreach ($gameGenre as $key => $genre) :?>
							<div class="col-xs-4">

									<span  class="searchable-container ">
									<label class="form-control"><input  name="id_genre[]" value="<?= $genre['id_genre']?>" type="checkbox"
										<?php 
										foreach ($userGameFav as $key => $genreFav) {
											 if(isset($genreFav['id_genre']) && ($genreFav['id_genre'] == $genre['id_genre']))  echo "checked";  
										}
										 ?>

									><?= $genre['genre_name']?></label>
									</span>

							</div>
						<?php endforeach; ?>
					</div>
					<input type="submit" name="modifierGenreFav" class="btn btn-default btn-block" value="Sauvegarder vos goûts">
				</div>
			</form>

		</div>
	</div>



<?php $this->stop('dashboard_section_user-gaming') ?>

<!-- ici le custom script pour l'appel ajax -->
