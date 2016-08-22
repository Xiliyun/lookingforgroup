<?php
namespace Controller;
use \W\Controller\Controller;
use Model\User\UserModel;
use \W\Security\AuthorizationModel;
use Model\Gaming\GamingModel;


//En W, mes controleurs hérites toujours de la classe Controller de W.
//De cette façon j'ai accès aux fonctions tel que $this->
class RechercheController extends Controller
{
	
	public function recherche()
	{
		$security = new AuthorizationModel;
		$security->isGranted(0);

		$db = new UserModel;
		$tri = '';

		$dbGames = new GamingModel;
		
		if(isset($_POST['envoyer'])){
			$db->setTable('table_resume');
			$data = array();
			if(!empty($_POST['sexe'])) :
				$data['gender'] = $_POST['sexe'];
			endif;
			// AGE par défaut il est à 18min et max 120, pas moyen de chercher du zéro ou undefined
			$from = $_POST['from'];
			$to = $_POST['to'];			
			// pas de tri sur genre, pose des problèmes dans la base car un utilisateur a plusieurs genres favoris, a approfondir
			if(!empty($_POST['city'])) :
				$data['city'] = $_POST['city'];
			endif;
			if(!empty($_POST['region'])) :
				$data['region'] = $_POST['region'];
			endif;

			// LA RECHERCHE AVANCEE PRENANT EN COMPTE LES AGES DANS USERMODEL
			$tri = $db->searchAdvanced($data, $operator='AND', $from, $to );
		
		$this->show('Recherche/Recherche',['tri'=>$tri]); 	 	 
		
		}
		//SEARCH VA NOUS PERMETTRE DE FAIRE DES TRIS COMME SUIVI
		// $db->setTable('table_resume');
		// $_triParis = $db->search(['genre_name' => 'action']);
		//$this->search(['nom de la colonne dans la bdd' => 'valeur à chercher'])
	
		$this->show('Recherche/Recherche');
		
	}
}


