<?php

namespace Controller;

use \W\Controller\Controller;
use Model\Profil\ProfilModel;

//En W, mes controleurs hérites toujours de la classe Controller de W.
//De cette façon j'ai accès aux fonctions tel que $this->
class ProfilController extends Controller
{

	/**
	 * Ici, il s'agit de l'action "monecole" du controller Ecole.
	 */
	public function monprofil()
	{
		$this->show('profil/profil');
	}
}