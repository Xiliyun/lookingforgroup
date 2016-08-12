<?php

namespace Controller;

use \W\Controller\Controller;


// pour la connexion directement dès la page d'accueil :)
use Model\Connexion\UserModel;
use Model\Connexion\userConnexionModel;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{

		$this->show('default/home');
	}


}