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
	}



} // end User class



 ?>