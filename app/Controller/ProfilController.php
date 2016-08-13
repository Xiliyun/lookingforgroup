<?php

namespace Controller;

use \W\Controller\Controller;
use Model\Profil\ProfilModel;
use Model\UserConnexionModel;
use Model\connexion\UserModel;
use Model\UserInfoModel;




//En W, mes controleurs hérites toujours de la classe Controller de W.
//De cette façon j'ai accès aux fonctions tel que $this->
class ProfilController extends Controller
{



	public function userProfile($id) {


		// information de l'utilisateur => correspond à la table user.
		//$MonObjetProfil = $this->getUser($_GET['id']);
		//print_r($MonObjetProfil);

		$id_user = $id;

		$db = new UserModel;
		$db->setTable('user');
		$db->setPrimaryKey('id_user');

		$user = $db->find($id_user);

		$db = new UserModel;
		$db->setTable('user_info');
		$db->setPrimaryKey('id_user');

		$MesInfosDeProfil = $db->find($id_user);

		$db = new UserModel;
		$db->setTable('user_location');
		$db->setPrimaryKey('id_user');

		$LocalisationProfil = $db->find($id_user);




		// TODO : récupérer le genre préféré !!!
		if(!empty($user)) {
			$this->show('Profil/profil',['user'=>$user,'userInfo'=>$MesInfosDeProfil,'userLocation'=>$LocalisationProfil ]);
		}
		else { // pour quand on essaye d'afficher un utilisateur qui n'existe pas !!
			$this->showForbidden();
		}

	}



}

