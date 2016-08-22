<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthorizationModel;

use Model\User\UserModel;
use Model\User\UserConnexionModel;
use Model\User\UserFriendsModel;
use Model\Notifications\NotificationsModel;

use Model\Gaming\GamingModel;

// pour l'upload de photos
use Model\Upload\UploadModel;


use DateTime;


//En W, mes controleurs hérites toujours de la classe Controller de W.
//De cette façon j'ai accès aux fonctions tel que $this->
class ProfilController extends Controller
{


	// AFFICHAGE DU PROFIL
	public function userProfile($id) {
		// CONTROLE DE SI UTILISATEUR CONNECTE OU NON
		$security = new AuthorizationModel;
		$security->isGranted(0);


		// /!\ data importante
		// on récupère l'user du profil qu'on affiche (pas forcément user connecté)
		$id_user = $id;


		$db = new UserModel;
		$user 			=	$db->getUserById($id_user);
		$userInfo 		= 	$db->getUserInfo($id_user);
		$userLocation 	=   $db->getUserLocation($id_user);


		$notificationsDb = new notificationsModel;



	///////////////////////////////////////////////////////////////////////////////////////////
	// AJOUT D'AMIS
	///////////////////////////////////////////////////////////////////////////////////////////
		// l'utilisateur connecté, est le premier argument à passer

		$connected_user = $this->getUser();
		$id_connected_user = $connected_user['id_user'];

		$dbUserFriends = new UserFriendsModel;

		if(isset($_POST['addFriend'])) {
			$id_user_two = $id_user; // l'user two est celui sur lequel on se trouve
			// en argument 1 : l'utilisateur connecté, en argument 2, l'utilisateur à ajouter
			if($dbUserFriends->addUserToFriends($id_connected_user, $id_user_two) == true ) {
				//echo "l'utilisateur a bien été ajoutey";
				// todo passer la confirmation en argument
				// //////////////////////////////////////////////////////
				// CREATION D'UNE NOTIFICATION POUR L'UTILISATEUR ID_USER_TWO, la notification vient de l'utilisateur 1, c'est l'utilisateur 2 qui la reçoit
				// //////////////////////////////////////////////////////
				
				$url = $this->generateUrl('profil_friends', ['id' => $id_user_two ]);
				$details = "<a href='".$url."'>".$connected_user['username']." vous a envoyé une demande d'ami !</a>";
				$id_notification = $notificationsDb->newNotification($details, $stripTags = false);

				// insertion dans la notification de l'utilisateur
				$data = array(
					'id_user_notification' => null,
					'id_notification' => $id_notification['id_notification'],
					'id_user' => $id_user_two,
					'status' => 0,
					);

				$notificationsDb->insertUserNewNotification($data);

				$confirmation = true;
				$this->redirectToRoute('profil_userConfirm', ['id'=>$id_user,'confirm' => $confirmation]);

			}
			else {
				//"ils sont déjà amis";
			}

		}// end condition if du post


		$isFriend = false;
		$isRequestSent = false;
		$isRequestReceived = false;
		// TODO : affichage du statut d'ami avec le profil qu'on affiche
		// case 1 : on est ami avec lui : ne pas afficher le bouton => isFriendWith && faire une suppression
		$isFriend = $dbUserFriends->isFriend($id_connected_user, $id_user); // renvoie true si ils sont amis, false si non

		// case 2 : on a envoyé une demande d'ami : afficher qu'on a fait la demande + au survol : annuler la demande => requestSent
		$isRequestSent = $dbUserFriends->isRequestSent($id_connected_user, $id_user); // renvoie true si ils sont amis, false si non

		// case 3 : on a reçu une demande d'ami : afficher demande d'ami + au survol : accepter la demande => requestReceived
		$isRequestReceived = $dbUserFriends->isRequestReceived($id_connected_user, $id_user); // renvoie true si ils sont amis, false si non

		if(isset($_POST['accepter'])) {
			$id_friend =  $_POST['accepter'];
			$friend_username = $dbUserFriends->getUsername($id_friend);
			$friend_username = $friend_username['username'];

			$dbUserFriends->acceptFriendRequest($id_connected_user, $id_friend);

			$confirmation = 'accepted';
			$this->redirectToRoute('profil_userConfirm', ['id'=>$id_user,'confirm' => $confirmation]);


		}
		if(isset ($_POST['supprimer'])) {
			$id_friend = $_POST['supprimer'];
			$friend_username = $dbUserFriends->getUsername($id_friend);
			$friend_username = $friend_username['username'];

			$dbUserFriends->deleteFriend($id_friend, $id_connected_user);

			$confirmation = 'deleted';
			$this->redirectToRoute('profil_userConfirm', ['id'=>$id_user,'confirm' => $confirmation]);

		}
		// OPTION ANNULER LA DEMANDE QU'ON A ENVOYE
		if(isset ($_POST['annuler'])) {
			$id_friend = $_POST['annuler'];
			$friend_username = $dbUserFriends->getUsername($id_friend);
			$friend_username = $friend_username['username'];

			$dbUserFriends->deleteFriend($id_friend, $id_connected_user);

			$confirmation = 'canceled';
			$this->redirectToRoute('profil_userConfirm', ['id'=>$id_user,'confirm' => $confirmation]);

		}

		///////////////////////////////////////////////////////////////////////////////////////////
		// AFFICHAGE DU GENRE DE JEUX FAVORI
		///////////////////////////////////////////////////////////////////////////////////////////

		$dbGenre = new GamingModel;
		$userGenreFav = $dbGenre->findUserGenreFavById($id_user);


		///////////////////////////////////////////////////////////////////////////////////////////
		// RECUPERATION ET AFFICHAGE DES MEMBRES QUI AIMENT LES MEMES GENRE DE JEU
		///////////////////////////////////////////////////////////////////////////////////////////
		// Etape 1 : récupérer tosu les genres de mon membre (voir ci dessus)
		// Etape 2 : récupérer tous les membres qui ont le même genre DANS UNE BOUCLE
		$other_user_id= array();
		$user_id = array();
		$shared_genre_user_data = array();

		foreach ($userGenreFav as $key => $genre) {
			$id_genre = $genre['id_genre'];
			$genre_name = $genre['genre_name'];

			$genre_array_others = $dbGenre->findUserGenreFavByGenre($id_genre);
			//print_r($genre_array_others);
			foreach ($genre_array_others as $key => $genre_others) {
				$other_user_id[] = ($genre_others['id_user']);
			}
		}
		$shared_genre_nb = array_count_values ($other_user_id ); 
		// ce dernier tableau nous intéresse car il a ET les user id ET le nombre de répétitions 

		$other_user_id = array_unique($other_user_id);
		foreach ($other_user_id as $key => $value) {
			if($value != $id_user) { // on n'a pas besoin d'afficher le profil en cours

				$sharedUser = 	$db->getUserById($value);
				$sharedUserInfo = 	$db->getUserInfo($value);
				$sharedUserLocation =    $db->getUserLocation($value);
				$sharedUser_genre_nb = $shared_genre_nb[$value] ;
				$shared_genre_user_data[] = array(
					'user' => $sharedUser,
					'userInfo' => $sharedUserInfo,
					'userLocation' => $sharedUserLocation,
					'shared_genre_nb' => $sharedUser_genre_nb ,

					);

			}
		}
		//print_r($shared_genre_user_data);
		//print_r($genre_array_others);
		//Au final afficher la liste par type de genre le nombre d'utilisateurs qui aiment les mêmes jeux



		//////////////////////////////////////////////////////////////////////////////////////////////////////// show de base du profil


		




		if(!empty($user)) {
			$this->show('Profil/profil',[
									'user'=>$user,
									'userInfo'=>$userInfo,
									'userLocation'=>$userLocation,

									// ICI on passe les arguments de s'ils ont amis ou non
									'isFriend'=>$isFriend,
									'isRequestSent'=>$isRequestSent,
									'isRequestReceived'=>$isRequestReceived,

									// genre de jeux favoris
									'userGenreFav' => $userGenreFav,
									'sharedGenreFav' => $shared_genre_user_data,
						]);
		}
		else { // pour quand on essaye d'afficher un utilisateur qui n'existe pas !!
			$this->showForbidden();
		}

	}


	
	///////////////////////////////////////////////////////////////////////////////////////////
	// Affichage et gestion des amis
	///////////////////////////////////////////////////////////////////////////////////////////
	public function friends ($id) {
		// CONTROLE DE SI UTILISATEUR CONNECTE OU NON
		$security = new AuthorizationModel;
		$security->isGranted(0);
		///////////////////////


		$id_user = $id;

		$db = new UserModel;
		$user 			=	$db->getUserById($id_user);
		$userInfo 		= 	$db->getUserInfo($id_user);
		$userLocation 	=   $db->getUserLocation($id_user);



		$connected_user = $this->getUser();
		$id_connected_user = $connected_user['id_user'];

		$dbUserFriends = new UserFriendsModel;
		// récupération de la table amis DE L'UTILISATEUR CONNECTE / PRINCIPAL
		//print_r($friends_array);

		////////////////////////////////////////////////////////////////////////////////
		// STATUS = 0 // RECUPERATION DES REQUETES & AJOUT OU ANNULATION
		////////////////////////////////////////////////////////////////////////////////

		$friend_request_sent = "";
		$friend_request_received = "" ;

		$friend_request_sent = $dbUserFriends->getFriendRequestsSent($id_connected_user);
		$friend_request_received = $dbUserFriends->getFriendRequestsReceived($id_connected_user);



		//	OPTION : ACCEPTER/ REFUSER LA DEMANDE
		if(isset($_POST['accepter'])) {
			$id_friend =  $_POST['accepter'];
			$friend_username = $dbUserFriends->getUsername($id_friend);
			$friend_username = $friend_username['username'];

			$dbUserFriends->acceptFriendRequest($id_connected_user, $id_friend);

			$confirmation = 'accepted';
			$this->redirectToRoute('profil_friendsConfirm', ['confirm' => $confirmation, 'id' => $id_connected_user, 'friend_username' => $friend_username]);


		}
		if(isset($_POST['refuser'])) {

			// delete
			$id_friend = $_POST['refuser'];
			$friend_username = $dbUserFriends->getUsername($id_friend);
			$friend_username = $friend_username['username'];

			$dbUserFriends->deleteFriend($id_connected_user, $id_friend);


			$confirmation = 'refused';
			$this->redirectToRoute('profil_friendsConfirm', ['confirm' => $confirmation, 'id' => $id_connected_user, 'friend_username' => $friend_username]);

		}
		// OPTION ANNULER LA DEMANDE QU'ON A ENVOYE
		if(isset ($_POST['annuler'])) {
			$id_friend = $_POST['annuler'];
			$friend_username = $dbUserFriends->getUsername($id_friend);
			$friend_username = $friend_username['username'];

			$dbUserFriends->deleteFriend($id_friend, $id_connected_user);

			$confirmation = 'canceled';
			$this->redirectToRoute('profil_friendsConfirm', ['confirm' => $confirmation, 'id' => $id_connected_user, 'friend_username' => $friend_username]);

		}



		////////////////////////////////////////////////////////////////////////////////
		// STATUS = 1 // RECUPERATION ET AFFICHAGE DES AMIS + SUPPRESSION (uniquement main_user)
		////////////////////////////////////////////////////////////////////////////////
		//NOTE : LA SELECTION SE FAIT SELON L'ID DU PROFIL CAR ON AFFICHE LES AMIS DU PROFIL
		$friend_list = "";

		$friend_list = $dbUserFriends->getUserFriends($id_user);


		if(isset ($_POST['supprimer'])) {
			$id_friend = $_POST['supprimer'];
			$friend_username = $dbUserFriends->getUsername($id_friend);
			$friend_username = $friend_username['username'];

			$dbUserFriends->deleteFriend($id_friend, $id_connected_user);

			$confirmation = 'deleted';
			$this->redirectToRoute('profil_profilConfirm', ['confirm' => $confirmation, 'id' => $id_connected_user, 'friend_username' => $friend_username]);

		}









		if(!empty($user)) {
							$this->show('Profil/friends',[
										'user'=>$user,
										'userInfo'=>$userInfo,
										'userLocation'=>$userLocation, 
										'friend_request_sent' =>$friend_request_sent,
										'friend_request_received' => $friend_request_received ,
										'friend_list' => $friend_list,

										]);
		}
		else { // pour quand on essaye d'afficher un utilisateur qui n'existe pas !!
			$this->showForbidden();
		}

	}








}//END CLASS

