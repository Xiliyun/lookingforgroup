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
		// AUTHORISE L'ACCES DU SITE AUX UTILISATEURS CONNECTES UNIQUEMENT (role 0)
		
		$this->allowTo(0);


		$user = $this->getUser();



		$this->show('accueil/accueil', ['user' => $user]);

	}
	

}

