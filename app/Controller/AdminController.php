<?php 

namespace Controller;

use \W\Controller\Controller;
use Model\Admin\AdminModel;



class AdminController extends Controller {

	public function dashboard() {

		$this->show('admin/dashboard');
	}





	// GESTION DE L'AJOUR DES GENRES DE L'API GIANTBOMB
	// ajouter
	public function genre() {
		$errors ="";
		if($_POST) {

			$dbGenre = new AdminModel;
			$dbGenre->setTable('game_all_genre');
			$dbGenre->setPrimaryKey('id_genre');

			/***************************************/
			/////// Recuperation des input /////////
			/***************************************/
			$id_genre = $_POST['id_genre'];


			$id_genre_array = $_POST['id_genre'];
			$genre_name_array = $_POST['genre_name'];
			$genre_name_fr_array = $_POST['genre_name_fr'];


			// INSERTION EN BASE DES TABLEAUX
			for ($i = 0; $i < count($id_genre_array); $i++) {

       		$id_genre = $id_genre_array[$i];
       		$genre_name = $genre_name_array[$i];
       		$genre_name_fr = $genre_name_fr_array[$i];


			$data = array(
					"id_genre"					=> $id_genre,
					"genre_name"				=> $genre_name,
					"genre_name_fr"				=> $genre_name_fr,
					);

			// si l'id existe déjà mettre à jour et afficher un message
				if($dbGenre->find($id_genre) > 0 ) {
					$dbGenre->update($data, $id_genre ,$stripTags = true);
				}
				else{
					$dbGenre->insert($data, $stripTags = true);
				}

   		 	} 	

		}



		$this->show('admin/genre', ['errors' => $errors ]);
	}







}


 ?>