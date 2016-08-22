<?php 

namespace Controller;

use \W\Controller\Controller;
use Model\Admin\AdminModel;

use \W\Security\AuthorizationModel;


class AdminController extends Controller {

	public function modifier_membres($id){
		$security = new AuthorizationModel;
		$security->isGranted(1);

		//Vérification si l'utilisateur est un admin
		$dbAdmin= new AdminModel;
		$dbAdmin->setTable('user');
		$admin= $dbAdmin->find('role');
		$this->allowTo($admin='1');
		//JE récupère les infos du membre ciblé
		$id_user = $id;
		$db = new AdminModel;
		$db->setTable('user');
		$db->setPrimaryKey('id_user');
		$user = $db->find($id_user);
		//UPDATE DE LA BDD
		if (isset($_POST['modifier'])) {
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$data= array(
				'username'	=> $_POST['username'],
				'firstname'	=> $_POST['firstname'],
				'lastname' =>$_POST['lastname'],
				'email' => $_POST['email'],
				'gender' => $_POST['gender'],
				'role' =>$_POST['role'],
				'password' =>$password,
			);	
			$db->update($data, $id);
			$this->redirectToRoute('gestion_membres');
	
		}
		$this->show('admin/modifier_membre', ['user'=>$user]);
	}
	public function supprimer_membre($id){
		$security = new AuthorizationModel;
		$security->isGranted(1);

		//Vérification si l'utilisateur est un admin
		$dbAdmin= new AdminModel;
		$dbAdmin->setTable('user');
		$admin= $dbAdmin->find('role');
		$this->allowTo($admin='1');
		//JE récupère les infos du membre ciblé
		$id_user = $id;
		$db = new AdminModel;
		$db->setTable('user');
		$db->setPrimaryKey('id_user');
		$user = $db->find($id_user);
		//suppression de la ligne et redirection
		$db->delete($user['id_user']);
		
		$this->redirectToRoute('gestion_membres');
	}
	public function dashboard() {
		$security = new AuthorizationModel;
		$security->isGranted(1);

		//Vérification si l'utilisateur est un admin
		$dbAdmin= new AdminModel;
		$dbAdmin->setTable('user');
		$admin= $dbAdmin->find('role');
		$this->allowTo($admin='1');
		$this->show('admin/dashboard');
	}

	public function gestion_membres() {
		$security = new AuthorizationModel;
		$security->isGranted(1);

		//Vérification si l'utilisateur est un admin
		$dbAdmin= new AdminModel;
		$dbAdmin->setTable('user');

		$admin= $dbAdmin->find('role');
		$this->allowTo($admin='1');


		$membres=$dbAdmin->findAll($orderBy="username", $orderDir="ASC");
		

		$this->show('admin/gestion_membres', ['membres'=>$membres]);
	}

	public function gestion_news() {
		$security = new AuthorizationModel;
		$security->isGranted(1);

			//Vérification si l'utilisateur est un admin
			$dbAdmin= new AdminModel;
			$dbAdmin->setTable('user');

			$admin= $dbAdmin->find('role');
			$this->allowTo($admin='1');

		//Inscription d'une news dans la bdd

		if (isset($_POST['envoyer'])) {
			$dbNews= new AdminModel;
			$dbNews->setTable('news');
			$dbNews->setPrimaryKey('id_news');
	
			$user=$this->getUser();
	
			$date=date('Y-m-d');
			$auteur=$user['username'];
			$contenu=$_POST['contenu'];
			$titre=$_POST['titre'];
	
			$data= array(
						"id_news"			=> null,
						"date"				=> $date,
						"contenu"			=> $contenu,
						"auteur"			=> $auteur,
						"titre"				=> $titre,
						);
	
			$dataUser = $dbNews->insert($data, $stripTags = true);




		}

		

			
		$this->show('admin/gestion_news');
	}






	// GESTION DE L'AJOUR DES GENRES DE L'API GIANTBOMB
	// ajouter
	public function genre() {
		$security = new AuthorizationModel;
		$security->isGranted(1);

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