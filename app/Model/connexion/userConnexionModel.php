<?php 
namespace Model\Connexion;

use Model\UserModel;


class userConnexionModel extends \W\Security\AuthentificationModel {
	
	public function getUser($id_user) {
		$user = $this->find($id_user);

		$objetUser = new UserModel (
				$user["id_user"],
				$user["username"],
				$user["email"],
				$user["password"],
				$user["date_joined"],
				$user["role"],
				$user["dob"],
				$user["firstname"],
				$user["lastname"],
				$user["gender"],
				$user["friendship"],
				$user["love"],
				$user["orientation"],
				$user["id_battlenet"],
				$user["id_psn"],
				$user["id_lol"],
				$user["id_xbox_live"],
				$user["id_steam"],
				$user["description"]
		);

		return $objetUser;
	}
}




 ?>