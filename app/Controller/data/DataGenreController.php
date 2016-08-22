<?php 
namespace Controller\Data;

use \W\Controller\Controller;
use Model\Gaming\GamingModel;


class dataGenreController extends Controller {

	public function allGenreData () {

			$dbGameGenre = new GamingModel;
			$dbGameGenre->setTable('game_all_genre');
			$dbGameGenre->setPrimaryKey('id_genre');

			
			// ENVOIE DES DONNEES SOUS FORME D'ARRAY JSON
			// NE MARCHE PAS JE LAISSE TOMBER

			// recherche dynamique avec ajax?
			$gameGenre = $dbGameGenre->findAll();
			$gameGenre= $this->showJson($gameGenre);

			$this->show('profil_allGenreData');


	}

}

 ?>