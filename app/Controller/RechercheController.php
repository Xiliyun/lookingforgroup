<?php

namespace Controller;

use \W\Controller\Controller;
use Model\Recherche\RechercheModel;

//En W, mes controleurs hérites toujours de la classe Controller de W.
//De cette façon j'ai accès aux fonctions tel que $this->
class RechercheController extends Controller
{

	
	public function marecherche()
	{
		// $db = new RechercheModel;
		
		
		// $MonObjetRecherce = $db->getrecherche();
	
		$this->show('recherche/recherche'); 
		//, ['recherche' => $MonObjetRecherce]);
	}
}