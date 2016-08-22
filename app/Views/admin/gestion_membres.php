<?php $this->layout('layoutAdmin', ['title' => 'Espace administrateur'])?>
<?php $this->start('dashboard_section_account-info') ?>

	<div class="containerbutton">
		<button type="button" class="btn btn-default"><a href="<?php echo $this->url('gestion_membres');?>" class="btn-text">Gestion des membres</a></button>

		<button type="button" class="btn btn-default"><a href="<?php echo $this->url('gestion_news');?>" class="btn-text">Gestion des news</a></button>
	</div>
		

		<?php
		
		echo'<h1 class="text-center" id="legendtableau">Gestion des membres</h1>';

		echo '<table class="table">';

		echo '<tr>';
				echo '<td id="tetetableau">ID</td>';
				echo '<td id="tetetableau">Pseudo</td>';
				echo '<td id="tetetableau">Prénom</td>';
				echo '<td id="tetetableau">Nom</td>';
				echo '<td id="tetetableau">Email</td>';
				echo '<td id="tetetableau">Genre</td>';
				echo '<td id="tetetableau">Statut</td>';
				echo '<td id="tetetableau"></td>';
				echo '<td id="tetetableau"></td>';
		echo '</tr>';

		foreach ($membres as $key => $value) {


			
			echo'<tr>';
				echo '<td>'.$membres[$key]['id_user'].'</td>';
				echo '<td>'.$membres[$key]['username'].'</td>';
				echo '<td>'.$membres[$key]['firstname'].'</td>';
				echo '<td>'.$membres[$key]['lastname'].'</td>';
				echo '<td>'.$membres[$key]['email'].'</td>';
				echo '<td>'.$membres[$key]['gender'].'</td>';
				echo '<td>'.$membres[$key]['role'].'</td>';
				echo '<td><a href="'.$this->url('modifier_membre',['id'=>$membres[$key]['id_user']]).'">modifier</a></td>';
				echo '<td><a href="'.$this->url('supprimer_membre',['id'=>$membres[$key]['id_user']]).'">supprimer</a><td>';
			echo'</tr>';
			
		}
		echo '</table>';
		?>





<?php $this->stop('dashboard_section_account-info') ?>