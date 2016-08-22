<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthorizationModel;

use Model\User\UserModel;
use Model\User\UserConnexionModel;



class AccueilController extends Controller
{

	/**
	 franck
	 */
	public function accueil()
	{
		// AUTHORISE L'ACCES DU SITE AUX UTILISATEURS CONNECTES UNIQUEMENT (role 0)
		
		// CONTROLE DE SI UTILISATEUR CONNECTE OU NON
		$security = new AuthorizationModel;
		$security->isGranted(0);
		///////////////////////
		$db= new UserModel;
		$db->setTable('table_resume');
		// $db->setPrimaryKey('id_user');


		$TousLesMembres = $db->findAll($orderBy="id_user", $orderDir="DESC", $limit=12);
		$user = $this->getUser();

		//GESTION DE L'AFFICHAGE DES NEWS

		$dbNews= new UserModel;
		$dbNews->setTable('news');

		$news=$dbNews->findAll($orderBy="id_news", $orderDir="DESC", $limit=10);

		

		$this->show('accueil/accueil', ['all_users'=>$TousLesMembres,'user'=>$user,'news'=>$news]);
	}
	

}

