<?php 
namespace Model\User;
use \W\Security\AuthentificationModel;


class UserModel extends \W\Model\UsersModel {

	private $_user;
	private $_userInfo;
	private $_userLocation;


	// Récupération des données utilisateur

	public function getUserById($id) {

		$this->setTable('user');
		$this->setPrimaryKey('id_user');

		$_user = $this->find($id);

		return $_user;
	}

	public function getUserInfo($id) {

		$this->setTable('user_info');
		$this->setPrimaryKey('id_user');

		$_userInfo = $this->find($id);

		return $_userInfo;
	}

	public function getUserLocation($id) {

		$this->setTable('user_location');
		$this->setPrimaryKey('id_user');

		$_userLocation = $this->find($id);

		return $_userLocation;


	}


	/**
	 * Effectue une recherche
	 * @param array $data Un tableau associatif des valeurs à rechercher
	 * @param string $operator La direction du tri, AND ou OR
	 * @param boolean $stripTags Active le strip_tags automatique sur toutes les valeurs
	 * @return mixed false si erreur, le résultat de la recherche sinon
	 */
	public function searchAdvanced(array $search, $operator = 'OR', $from, $to, $stripTags = true){

		// Sécurisation de l'opérateur
		$operator = strtoupper($operator);
		if($operator != 'OR' && $operator != 'AND'){
			die('Error: invalid operator param');
		}

		strip_tags($from);
		strip_tags($to);

        $sql = 'SELECT * FROM ' . $this->table.' WHERE';

        $sql .= " `AGE` BETWEEN ".$from." AND ".$to." ".$operator;

		foreach($search as $key => $value){
			$sql .= " `$key` LIKE :$key ";
			$sql .= $operator;
		}


		// Supprime les caractères superflus en fin de requète
		if($operator == 'OR') {
			$sql = substr($sql, 0, -3);
		}
		elseif($operator == 'AND') {
			$sql = substr($sql, 0, -4);
		}




		$sth = $this->dbh->prepare($sql);

		foreach($search as $key => $value){
			$value = ($stripTags) ? strip_tags($value) : $value;
			$sth->bindValue(':'.$key, '%'.$value.'%');
		}


		if(!$sth->execute()){
			return false;
		}

        return $sth->fetchAll();
	}



}


