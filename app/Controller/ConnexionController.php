<?php

namespace Controller;

use \W\Controller\Controller;

use Model\Connexion\UserModel;
use Model\Connexion\userConnexionModel;


class ConnexionController extends Controller
{

	public function connexion()
	{
		
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

						//print_r($_SESSION);

						// franck
						$this->redirectToRoute('accueil_accueil');

					}
				}
		}
		

		$this->show('connexion/connexion');
	}
	

}