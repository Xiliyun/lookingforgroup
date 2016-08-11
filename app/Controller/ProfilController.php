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

	public function userOwnProfile()
	{

		// information de l'utilisateur connecté => correspond à la table user.
		$MonObjetProfil = $this->getUser();
		//print_r($MonObjetProfil);
		$id_user = $MonObjetProfil['id_user'];

		$db = new UserModel;
		$db->setTable('user_info');
		$db->setPrimaryKey('id_user');

		$MesInfosDeProfil = $db->find($id_user);

		$db = new UserModel;
		$db->setTable('user_location');
		$db->setPrimaryKey('id_user');

		$LocalisationProfil = $db->find($id_user);


		$this->show('Profil/profil',['user'=>$MonObjetProfil,'userInfo'=>$MesInfosDeProfil,'userLocation'=>$LocalisationProfil ]);
	

	}
}

