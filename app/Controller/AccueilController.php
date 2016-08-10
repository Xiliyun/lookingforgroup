<?php

namespace Controller;

use \W\Controller\Controller;
use Model\membres\MembresModel;


class AccueilController extends Controller
{

	/**
	 franck
	 */
	public function accueil()
	{
		$db= new MembresModel;
		//ICI IL FAUT FAIRE UN INNERJOIN REPRENNANT TOUTES LES INFOS
		$db->setTable('test');
		// $db->setPrimaryKey('id_user');


		$TousLesMembres = $db->findAll();

		$this->show('accueil/accueil', ['all_users'=>$TousLesMembres]);

	}
	

}