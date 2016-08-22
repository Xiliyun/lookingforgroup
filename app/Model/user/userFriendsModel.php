<?php 
namespace Model\User;


class UserFriendsModel extends UserModel {

	private $_friends_array;


	// // extension des fonctions de recherche
	// public function findAll($id)
	// {
	// 		if (!is_numeric($id)){
	// 			return false;
	// 		}

	// 		$sql = 'SELECT * FROM ' . $this->table . ' WHERE ' . $this->primaryKey .'  = :id LIMIT 1';
	// 		$sth = $this->dbh->prepare($sql);
	// 		$sth->bindValue(':id', $id);
	// 		$sth->execute();

	// 		return $sth->fetchAll();
	// }

	public function searchSqlQuery($sql) {

		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
	}





	// METHODES DE LA CLASSE FRIENDS

	public function getUsername($id) {
		$this->setTable('user');
		$this->setPrimaryKey('id_user');

		if (!is_numeric($id)){
			return false;
		}

		$sql = 'SELECT username FROM ' . $this->table . ' WHERE ' . $this->primaryKey .'  = :id LIMIT 1';
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id', $id);
		$sth->execute();

		return $sth->fetch();
	}

	public function addUserToFriends($id_user_one, $id_user_two) {

			// étape 1 : connexion à la bdd 
			$this->setTable('user_friendlist');
			$this->setPrimaryKey('id_user_one');

			// étape 2 : vérification de la base, si l'utilisateur n'existe pas déjà en base
			$sql = "SELECT * FROM user_friendlist WHERE (id_user_one=".$id_user_one." AND id_user_two=".$id_user_two.") OR (id_user_one=".$id_user_two." AND id_user_two=".$id_user_one.")";

			$sth = $this->dbh->prepare($sql);
			$sth->execute();

			$friend_array = $sth->fetchAll();
				// étape 3 :
				// si l'array retourne empty, c'est que l'un et l'autre ne sont pas amis, alors on insere en base !
				if(empty($friend_array)) {
					$data = array(

						'id_user_one'	=> $id_user_one,
						'id_user_two'	=> $id_user_two,
						'date_added'	=> date("Y-m-d"),
						'status'		=> 0,
						);
					// insertion en base ici
					$this->insert($data, $stripTags = true);
					// retourner un true?
					return true;
				}
				else {
					return false;
					// todo passer un argument pour l'afficher dans le profil à la place du botuon actuel
				}

	}


	// RECUPERATION DE TOUS LES RELATIONS AMIS DE L'UTILISATEUR : qu'il soit en position 2 ou en position 1 => s'il est en position 2 c'est qu'il a reçu la demande, s'il est en position 1, c'est qu'il l'a envoyée
	public function getFriendsArray($id) {

		$this->setTable('user_friendlist');
		$this->setPrimaryKey('id_user_one');

		$requete_sql = "SELECT * FROM user_friendlist WHERE (id_user_one=".$id.") OR (id_user_two=".$id.")";

		$sth = $this->dbh->prepare($requete_sql);
		$sth->execute();

		$_friends_array = $sth->fetchAll();


		return $_friends_array;
	}

	public function getFriendRequestsSent ($id) {
		$this->setTable('user_friendlist');
		$this->setPrimaryKey('id_user_one');

		$requete_sql = "SELECT * FROM user_friendlist WHERE (id_user_one=".$id.") OR (id_user_two=".$id.")";

		$sth = $this->dbh->prepare($requete_sql);
		$sth->execute();

		$friends_array = $sth->fetchAll();


		$db = new UserModel;

		$friend_request_sent = array();

		foreach ($friends_array as $key => $friend) {

			//  s'il est en position 1, c'est qu'il l'a envoyée
			if($friend['id_user_one']== $id && $friend['status']=='0')
			{
					// friend request sent -> on peut rien y faire sauf annuler
					$user_two 			=	$db->getUserById($friend['id_user_two']);
					$user_twoInfo 		= 	$db->getUserInfo($friend['id_user_two']);
					$user_twoLocation 	=   $db->getUserLocation($friend['id_user_two']);


					// insertion du username dans le tableau friend
					// $requete_sql = "SELECT username FROM user WHERE (id_user=".$friend['id_user_two'].")";
					// $friend_username = $dbUserFriends->searchSqlQuery($requete_sql);

					// // insertion de la photo dans le tableau friend

					// print_r(($friend_data));
					$friend['user'] = $user_two;
					$friend['userInfo'] = $user_twoInfo;
					$friend['userLocation'] = $user_twoLocation;
					 // $friend['friend_username'] =  $user_two['username'];
					 // $friend['friend_avatar'] =  $user_twoInfo['user_avatar'];

					$friend_request_sent[] = $friend;

			}
			

		} // end foreach


		return $friend_request_sent;

	}


	public function getFriendRequestsReceived ($id) {
		$this->setTable('user_friendlist');
		$this->setPrimaryKey('id_user_one');

		$requete_sql = "SELECT * FROM user_friendlist WHERE (id_user_one=".$id.") OR (id_user_two=".$id.")";

		$sth = $this->dbh->prepare($requete_sql);
		$sth->execute();

		$friends_array = $sth->fetchAll();

		$db = new UserModel;

		// PASSER L'ARRAY EN VUE => ici je créé un tableau contenant les informations que j'enverrai en vue !
		$friend_request_received = array();

		foreach ($friends_array as $key => $friend) {

			if($friend['id_user_two']== $id && $friend['status']=='0') 
			{
					//friend request received -> on peut dont y faire une action
					// $requete_sql = "SELECT username FROM user WHERE (id_user=".$friend['id_user_two'].")";
					// $friend_username = $dbUserFriends->searchSqlQuery($requete_sql);
					// $friend['friend_username'] =  $friend_username[0]['username'];

					$user_two 			=	$db->getUserById($friend['id_user_one']);
					$user_twoInfo 		= 	$db->getUserInfo($friend['id_user_one']);
					$user_twoLocation 	=   $db->getUserLocation($friend['id_user_one']);


					// insertion du username dans le tableau friend

					// print_r(($friend_data));
					$friend['user'] = $user_two;
					$friend['userInfo'] = $user_twoInfo;
					$friend['userLocation'] = $user_twoLocation;
					$friend_request_received[] = $friend;
			}
		} // end foreach
		return $friend_request_received;
	}





	public function getUserFriends($id) {

		$this->setTable('user_friendlist');
		$this->setPrimaryKey('id_user_one');

		$requete_sql = "SELECT * FROM user_friendlist WHERE (id_user_one=".$id.") OR (id_user_two=".$id.")";

		$sth = $this->dbh->prepare($requete_sql);
		$sth->execute();

		$friends_array = $sth->fetchAll();
		
		$db = new UserModel;

		$friend_list = array();

		foreach ($friends_array as $key => $friend) {

			if($friend['id_user_one']== $id && $friend['status']=='1')
			{

					$friendUser 		=	$db->getUserById($friend['id_user_two']);
					$friendInfo 		= 	$db->getUserInfo($friend['id_user_two']);
					$friendLocation 	=   $db->getUserLocation($friend['id_user_two']);


					$friend['user'] = $friendUser;
					$friend['userInfo'] = $friendInfo;
					$friend['userLocation'] = $friendLocation;

					$friend_list[] = $friend;

			}// s'il est en position 2 c'est qu'il a reçu la demande
			elseif($friend['id_user_two']== $id && $friend['status']=='1') 
			{

					$friendUser 		=	$db->getUserById($friend['id_user_one']);
					$friendInfo 		= 	$db->getUserInfo($friend['id_user_one']);
					$friendLocation 	=   $db->getUserLocation($friend['id_user_one']);


					$friend['user'] = $friendUser;
					$friend['userInfo'] = $friendInfo;
					$friend['userLocation'] = $friendLocation;

					$friend_list[] = $friend;
			}

		} // end foreach
		return $friend_list;	
	}







	public function acceptFriendRequest($id_user, $id_friend, $stripTags = true)
	{
		if (!is_numeric($id_user)){
			return false;
		}

		$this->setTable('user_friendlist');
		$this->setPrimaryKey('id_user_one');

		$data = array (
			'status'	=> 1,
			);


		$sql = 'UPDATE ' . $this->table . ' SET ';
		foreach($data as $key => $value){
			$sql .= "`$key` = :$key, ";
		}
		// Supprime les caractères superflus en fin de requète
		$sql = substr($sql, 0, -2);

		$sql .= ' WHERE id_user_one = ' .$id_friend. ' AND id_user_two = ' .$id_user ;

		$sth = $this->dbh->prepare($sql);


		foreach($data as $key => $value){
			$value = ($stripTags) ? strip_tags($value) : $value;
			$sth->bindValue(':'.$key, $value);
		}


		if(!$sth->execute()){
			return false;
		}
		return $this->find($id_user);
	}


	public function deleteFriend($id_user, $id_friend)
	{

		$this->setTable('user_friendlist');
		$this->setPrimaryKey('id_user_one');


		$sql = 'DELETE FROM ' . $this->table;

		$sql .= ' WHERE id_user_one = '. $id_friend .' AND id_user_two = '. $id_user .' OR id_user_one = '. $id_user. ' AND id_user_two = ' .$id_friend ; 

		$sth = $this->dbh->prepare($sql);

		return $sth->execute();
	}


	//  TODO : public function isAFriend($id_friend) {} pour vérifier si l'utilisateur connecté est ami avec le profil qu'il consukte


	public function isFriend($id_connected_user, $id_friend) {

		// si user one = id connecter user ET user two = id friend OU user one = id_friend ET user two = id connected user ET status = 1
		// ils sont amis.

		$this->setTable('user_friendlist');
		$this->setPrimaryKey('id_user_one');

		$requete_sql = "SELECT * FROM user_friendlist WHERE (id_user_one=".$id_connected_user." AND id_user_two=".$id_friend."  AND status = '1' ) OR (id_user_one=".$id_friend." AND id_user_two=".$id_connected_user."  AND status = '1') ";

		$sth = $this->dbh->prepare($requete_sql);
		$sth->execute();

		$friend = $sth->fetchAll();

		if(!empty($friend)) {
			return true;
		}

	}

	public function isRequestSent($id_connected_user, $id_friend) {


		$this->setTable('user_friendlist');
		$this->setPrimaryKey('id_user_one');

		$requete_sql = "SELECT * FROM user_friendlist WHERE id_user_one=".$id_connected_user." AND id_user_two=".$id_friend." AND status = '0' ";

		$sth = $this->dbh->prepare($requete_sql);
		$sth->execute();

		$friend = $sth->fetchAll();

		if(!empty($friend)) {
			return true;
		}

	}



	public function isRequestReceived($id_connected_user, $id_friend) {


		$this->setTable('user_friendlist');
		$this->setPrimaryKey('id_user_one');

		$requete_sql = "SELECT * FROM user_friendlist WHERE id_user_one=".$id_friend." AND id_user_two=".$id_connected_user." AND status = '0' ";

		$sth = $this->dbh->prepare($requete_sql);
		$sth->execute();

		$friend = $sth->fetchAll();

		if(!empty($friend)) {
			return true;
		}

	}







}


 ?>