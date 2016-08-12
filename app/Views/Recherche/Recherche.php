

<h1>Recherche</h1>

<form method="post" action ="">
	<select name="sexe">
		<option></option>
		<option value="h">Homme</option>
		<option value="f">Femme</option>
	</select>
	<select name="genre">
		<option></option>
		<option value="Action">Action</option>
		<option value="RPG">RPG</option>
	</select>
	<select name="region">
		<option></option>
		<option value="Aquitaine">Aquitaine</option>
		<option value="Ile de France">Ile de France</option>
	</select>
	<input type="text" name="city" placeholder="ville">

<input type="submit" name="envoyer" value="Rechercher">
</form>

<?php
if (!empty($tri)) {
	foreach ($tri as $key => $value) {
	echo '<div class="col-sm-4 col-lg-4 col-md-4">';
	echo '<p>'.$tri[$key]['username'].$tri[$key]['id_user'].'</p>';
	echo '<p>'.$tri[$key]['city'].'</p>';
	echo '<p>'.$tri[$key]['dob'].'</p>';
	echo '</div>';
}

}
// echo "<pre>";
// print_r($triGenre);
// echo "</pre>";
// NOTE A MOI MEME:
//REGION AGE H/F
?>

