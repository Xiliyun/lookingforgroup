<?php

namespace Controller;

use \W\Controller\Controller;

use Model\Connexion\UserModel;
use Model\Connexion\userConnexionModel;


class ConnexionController extends Controller
{

	public function connexion()
	{
		$errors ="";

		if($_POST) {
			if(isset($_POST) && $_POST['connexion'] == 'Se connecter') {

					// initialisation de la classe qui permet de vérifier l'utilisateur en BDD
					$dbUser = new userConnexionModel;

					$username = $_POST['username'];
					$password = $_POST['password'];

					$id_user = $dbUser->isValidLoginInfo($username, $password);

					if( $id_user > 0){ // si la fonction renvoie un résultat autre que 0, l'utilisateur existe

						// REMPLISSAGE DE S_SESSION AVEC LES DONNES UTILISATEURS RECUPEREES EN BASE
						$db = new UserModel;
						$db->setTable("user");
						$db->setPrimaryKey("id_user");

						$user = $db->find($id_user);

						$dbUser->logUserIn($user);


						$this->redirectToRoute('accueil_accueil');

					}
					else {
						$errors = "identifiant et/ou mot de passe incorrect(s) !";
					}
				}
		}
		

		$this->show('connexion/connexion', ['errors' => $errors]);
	}



	public function header_default_connexion() {

		

		// CONTROLLEUR DU FORMULAIRE DE CONNEXION DES LA HOMEPAGE
		$errors ="";
		
			if(isset($_POST['connexion']) && $_POST['connexion'] == 'Se connecter') {

					// initialisation de la classe qui permet de vérifier l'utilisateur en BDD
					$dbUser = new userConnexionModel;

					$username = $_POST['username'];
					$password = $_POST['password'];

					$id_user = $dbUser->isValidLoginInfo($username, $password);

					if($id_user > 0){ // si la fonction renvoie un résultat autre que 0, l'utilisateur existe

						// REMPLISSAGE DE S_SESSION AVEC LES DONNES UTILISATEURS RECUPEREES EN BASE
						$db = new UserModel;
						$db->setTable("user");
						$db->setPrimaryKey("id_user");

						$user = $db->find($id_user);

						$dbUser->logUserIn($user);


						$this->redirectToRoute('accueil_accueil');

					}
					else {
						// TODO GERER L'ERREUR DE REDIRECTION ?!!!
						$errors = "identifiant et/ou mot de passe incorrect(s) !";
						$this->redirectToRoute('default_connexionerror', ['errors' => $errors]);

					}

			} // END CONDITION IF POST
		

		// AFFICHAGE DU HEADER + envoi erreurs s'il y a
		$this->show('templates/header/default');






	}//end public function
	

}

