<?php

namespace Controller;

use \W\Controller\Controller;
use Model\User\UserModel;

//En W, mes controleurs hérites toujours de la classe Controller de W.
//De cette façon j'ai accès aux fonctions tel que $this->
class RechercheController extends Controller
{

	
	public function recherche()
	{
		$db = new UserModel;
		$tri = '';
		
		if(isset($_POST['envoyer'])){

			$db->setTable('table_resume');
			$tri = $db->search(['genre_name' => $_POST['genre'],
			 					'city' => $_POST['city'],
			 					'gender'=> $_POST['sexe'],
			 					'region'=> $_POST['region']
			 					], $operator='AND');
			 	 
		
		}
		//SEARCH VA NOUS PERMETTRE DE FAIRE DES TRIS COMME SUIVI
		// $db->setTable('table_resume');
		// $_triParis = $db->search(['genre_name' => 'action']);


		//$this->search(['nom de la colonne dans la bdd' => 'valeur à chercher'])
	
		$this->show('Recherche/Recherche',['tri'=>$tri]); 
		
	}
}