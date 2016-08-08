<?php

namespace Controller;

use \W\Controller\Controller;

class AccueilController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function accueil()
	{
		$this->show('accueil/accueil');
	}
	

}