<?php 
namespace Model\Connexion;

class User {

	// définition des propriétés de la classe User : 
	// champs obligatoires de la table user
	private $_id_user;
	private $_username;
	private $_email;
	private $_password;
	private $_date_joined;
	private $_role;
	private $_dob;
	private $_firstname;
	private $_lastname;
	private $_gender;
	private $_friendship;
	private $_love;
	private $_orientation;

	// champs non obligatoires TODO : TROUVER QUAND OU COMMENT LES ENTRER EN BASE
	private $_id_battlenet;
	private $_id_psn;
	private $_id_lol;
	private $_id_xbox_live;
	private $_id_steam;
	private $_description;


	// constructeur des champs obligatoires
	public function __construct(
						$_id_user,
						$_username,
						$_email,
						$_password,
						$_date_joined,
						$_role,
						$_dob,
						$_firstname,
						$_lastname,
						$_gender,
						$_friendship,
						$_love,
						$_orientation,
						$_id_battlenet,
						$_id_psn,
						$_id_lol,
						$_id_xbox_live,
						$_id_steam,
						$_description
						)
	{
		$this->_id_user		=			$_id_user;
		$this->_username	=			$_username;
		$this->_email		=			$_email;
		$this->_password	=			$_password;
		$this->_date_joined	=			$_date_joined;
		$this->_role		=			$_role;
		$this->_dob			=			$_dob;
		$this->_firstname	=			$_firstname;
		$this->_lastname	=			$_lastname;
		$this->_gender		=			$_gender;
		$this->_friendship	=			$_friendship;
		$this->_love		=			$_love;
		$this->_orientation	=			$_orientation;
		$this->_id_battlenet= 			$_id_battlenet;
		$this->_id_psn		=  			$_id_psn;
		$this->_id_lol		=			$_id_lol;
		$this->_id_xbox_live=			$_id_xbox_live;
		$this->_id_steam	=			$_id_steam;
		$this->_description	=			$_description;
	}



} // end User class



 ?>