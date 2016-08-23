<?php 
namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthorizationModel;

use Model\User\UserModel;
use Model\User\UserConnexionModel;
use Model\User\UserFriendsModel;

use Model\Gaming\GamingModel;

// pour l'upload de photos
use Model\Upload\UploadModel;


use DateTime;





class UserSettingsController extends Controller 
{


///////////////////////////////////////////////////////////////////////////////////////////
// ESPACE DE MODIFICATION DU PROFIL / dashboard
///////////////////////////////////////////////////////////////////////////////////////////
	public function settings() {
		$security = new AuthorizationModel;
		$security->isGranted(0);

		$this->show('Profil/settings/dashboard_user');
	}

	public function accountInfo() {
		$security = new AuthorizationModel;
		$security->isGranted(0);


		//////////////////// RECUPERATION DES INFO DE L'UTILISATEUR CONNECTE
		$connected_user = $this->getUser();
		$id_connected_user = $connected_user['id_user'];

		$dbUser = new UserModel;
		$dbUser->setTable('user');
		$dbUser->setPrimaryKey('id_user');

		$user = $dbUser->getUserById($id_connected_user);

		//print_r($user);

		///////////////////// MODIFICATIONS
		////1) INFO DU PROFIL
		$errors = array();

		if(isset($_POST['modifierInfo']) && $_POST['modifierInfo'] == "modifier vos informations") {
			$username = $_POST["username"];
			$email = $_POST["email"];

			// verification des erreurs

			if(empty($username)) {
				$errors['username'] = 'Veuillez remplir ce champs';		
			}else if(strlen($username) < 3){
				$errors['username'] = 'Votre pseudo doit comporter au moins 3 caractères';		
			}else if(strlen($username) > 45) {
				$errors['username'] = 'Votre pseudo est trop long !(45 caractères max)';
			}else if(ctype_space ($username)) {
				$errors['username'] = 'Merci de ne pas entrer uniquement des espaces';
			}else if(preg_match('/\s/',$username)) {
				$errors['username'] = 'Merci de ne pas utiliser d\'espaces dans votre pseudo';
			}
			else { // vérification de l'existence en base

				if($dbUser->usernameExists($username) && $username != $user['username']) {
					$errors['username'] = 'Ce nom d\'utilisateur existe déjà !';
				}
			}

			//verification email
			if(empty($email)) {
				$errors['email'] = 'Veuillez remplir ce champs';		
			}
			elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
				$errors['email'] = 'Veuillez entrer un email valide';		
			}
			else {
				if($dbUser->emailExists($email) && $email != $user['email']) {
					$errors['email'] = 'Cet email existe déjà !';		
				}
			}


			//////// update profil /////////
			if(empty($errors)) {
				$data = array(
					"username"				=> $username,
					"email"					=> $email,
				);

				$update = $dbUser->update($data, $id_connected_user, $stripTags = true);
				$confirmation = true;
				$this->redirectToRoute('profil_accountInfoConfirm', ['confirm' => $confirmation]);
			}

		}// END IF($_POST) MODIFICATION INFO


		//// 2) MOT DE PASSE
		if(isset($_POST['modifierPassword']) && $_POST['modifierPassword'] == "modifier votre mot de passe") {

			$currentPassword =  $_POST['currentPassword'];
			$newPassword = $_POST['newPassword'];
			$newPasswordConfirm = $_POST['newPasswordConfirm'];


			$user_connexion = new UserConnexionModel;
			// Verification que le mot de passe entré correspond au mot de passe du compte
			if(($user_connexion->isValidLoginInfo($user['username'], $currentPassword)) != $user['id_user']) {
				$errors['password'] = 'Le mot de passe entré ne correspond pas à votre mot de passe actuel';
			}

			//verification nouveau mot de passe
			if(empty($newPassword)) {
				$errors['newPassword'] = 'Veuillez remplir ce champs';		
			}
			if(empty($_POST['newPasswordConfirm'])) {
				$errors['newPasswordConfirm'] = 'Veuillez confirmer votre mot de passe';		
			}else if($_POST['newPasswordConfirm'] != $_POST['newPassword']) {
				$errors['newPasswordConfirm'] = 'Vos mots de passe ne se correspondent pas';		
			}


			/////////// INSERTION EN BASE
			if(empty($errors)) {
				$data = array(
					"password"			=> password_hash($newPassword, PASSWORD_DEFAULT)
				);

				$update = $dbUser->update($data, $id_connected_user, $stripTags = true);
				$confirmation = true;
				$this->redirectToRoute('profil_accountInfoConfirm', ['confirm' => $confirmation]);
			}



		} // END IF ISSET MOT DE PASSE





	//////////////////// AFFICHAGE
	$this->show('Profil/settings/account_info' , ['user' => $user, 'errors' => $errors]);
	} // END FONCTION MODIFICATION ACCOUNT INFO (page votre compte)


	public function userInfo () {
		$security = new AuthorizationModel;
		$security->isGranted(0);

		//////////////////// RECUPERATION DES INFO DE L'UTILISATEUR CONNECTE
		$connected_user = $this->getUser();
		$id_connected_user = $connected_user['id_user'];

		//1) connexion aux tables & 2) recuperation des données
		// pour l'insertion
		$dbUser = new UserModel;
		$dbUserInfo = new UserModel;
		$dbUserLocation = new UserModel;

		$dbUser -> setTable('user');
		$dbUser -> setPrimaryKey('id_user');

		$dbUserInfo -> setTable('user_info');
		$dbUserInfo -> setPrimaryKey('id_user');

		$dbUserLocation -> setTable('user_locaton');
		$dbUserLocation -> setPrimaryKey('id_user');



		$db = new UserModel;

		$user 			=	$db->getUserById($id_connected_user);
		$userInfo 		= 	$db->getUserInfo($id_connected_user);
		$userLocation 	=   $db->getUserLocation($id_connected_user);


		
		///////////////////// 5) MODIFICATIONS

		$errors = array();
		//// a) modifierDescription
		if(isset($_POST['modifierDescription']) && $_POST['modifierDescription'] == "modifier") {
			$description = $_POST['description'];

			if(strlen($description) > 1000) {
				$errors["description"] = "Merci de ne pas dépasser 1000 caractères pour votre description";
			}

			//insertion base
			if(empty($errors)) {
				// ici gérer que si la table est vide (uniquement pour la table user info), il faut faire un insert, sinon, un update ...
				if(empty($userInfo)) {

					$data = array(
						"id_user"				=> $id_connected_user,
						"orientation"			=> null,
						"id_battlenet"			=> null,
						"id_psn"				=> null,	
						"id_lol"				=> null, 
						"id_xbox_live"			=> null,	
						"id_steam"				=> null, 
						"description"			=> $description, 
						"user_avatar"			=> null	
					);
					$insert = $dbUserInfo->insert($data, $stripTags = true);
					$confirmation = true; 

				}
				else {
					$data = array(
						"description"			=> $description,
					);
					$update = $dbUserInfo->update($data, $id_connected_user, $stripTags = true);
					$confirmation = true;
				}
				$this->redirectToRoute('profil_userInfoConfirm', ['confirm' => $confirmation]);
			} // end if empty errors
		}


		//// b) modifierNom
		if(isset($_POST['modifierNom']) && $_POST['modifierNom'] == "modifier"){
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];

			//verification firstname
			if(empty($firstname)) {
				$errors['firstname'] = 'Veuillez remplir ce champs';		
			}
			else if(strlen($firstname) < 2){
				$errors['firstname'] = 'Votre prénom doit comporter au moins 2 caractères';		
			}else if(strlen($firstname) > 45) {
				$errors['firstname'] = 'Votre prénom est trop long !(45 caractères max)';
			}
			else if(!ctype_alpha($firstname)) {
				$errors['firstname'] = 'votre prénom ne peut contenir ni de caractères spéciaux, ni de chiffres, ni d\'espace';
			} // ne marche pas


			// verification lastname
			if(empty($lastname)) {
				$errors['lastname'] = 'Veuillez remplir ce champs';		
			}
			else if(strlen($lastname) < 2){
				$errors['lastname'] = 'Votre nom doit comporter au moins 2 caractères';		
			}else if(strlen($lastname) > 45) {
				$errors['lastname'] = 'Votre nom est trop long !(45 caractères max)';
			}
			else if(!ctype_alpha($lastname)) {
				$errors['lastname'] = 'votre prénom ne peut contenir ni de caractères spéciaux, ni de chiffres, ni d\'espace';
			}

			//insertion base
			if(empty($errors)) {
				// le prénom est forcément entré à l'inscription, donc juste besoin d'un update
				$data = array(
					"firstname"			=> $firstname,
					"lastname"			=> $lastname,
				);
				$update = $dbUser->update($data, $id_connected_user, $stripTags = true);

				$confirmation = true;
				$this->redirectToRoute('profil_userInfoConfirm', ['confirm' => $confirmation]);
			} // end if empty errors


		}


		//// c) modifierAge
		if(isset($_POST['modifierAge']) && $_POST['modifierAge'] == "modifier"){
			$dob = $_POST['dob'];

			if(empty($dob)) {
				$errors['dob'] = 'Veuillez entrer votre date de naissance';
			}
			else if(isset($dob)) {
				if((DateTime::createFromFormat('Y-m-d', $dob)->diff(new DateTime('now'))->y) < 18) {
					$errors['dob'] = 'Vous devez avoir plus de 18 ans pour être membre de ce site, auriez vous menti lors de votre inscription?';
				}
			}

			if(empty($errors)) {
				// le prénom est forcément entré à l'inscription, donc juste besoin d'un update
				$data = array(
					"dob"			=> $dob,
				);
				$update = $dbUser->update($data, $id_connected_user, $stripTags = true);

				$confirmation = true;
				$this->redirectToRoute('profil_userInfoConfirm', ['confirm' => $confirmation]);
			} // end if empty errors

		}


		//// d) modifierLocation
		if(isset($_POST['modifierLocation']) && $_POST['modifierLocation'] == "modifier"){
			$city = $_POST["city"];
			$region = $_POST["region"];
			$postal_code = $_POST["postalcode"];
			$country = $_POST["country"];
			$lat = $_POST["lat"];
			$lng = $_POST["lng"];

			// verification que l'utilisateur a bien entré son adresse
			if(empty($postal_code)) {
				$errors['location'] = "Veuillez sélectionner votre ville grâce au code postal";
			}
			else if(strlen($postal_code) != 5) {
				$errors['location'] = "Veuillez entrer un code postal valide (ex : 75001)";
			}		
			else if(empty($city)) {
				$errors['location'] = "Veuillez sélectionner votre ville grâce au code postal";
			}

			if(empty($errors)) {
				// TODO gérer problème s'il change son code postal sans changer sa ville ?! :/

				$data = array(
				"city"					=> $city,
				"region"				=> $region,
				"postal_code"			=> $postal_code,
				"country"				=> $country,
				"lat"					=> $lat,
				"lng"					=> $lng,
				);

				$update = $dbUserLocation->update($data, $id_connected_user, $stripTags = true);

				$confirmation = true;
				$this->redirectToRoute('profil_userInfoConfirm', ['confirm' => $confirmation]);
			} // end if empty errors
		
		}


		//// e) modifierSexeOrientation
		if(isset($_POST['modifierSexeOrientation']) && $_POST['modifierSexeOrientation'] == "modifier"){

			$gender = $_POST['gender'];
			$orientation = $_POST['orientation'];

			// normalement pas de probleme du genre possible mais sait-on jamais :)
			if(!isset($_POST["gender"])) {
				$errors['gender'] = 'Êtes vous un homme ou une femme? Veuillez préciser votre sexe';
			}

			if(empty($errors)) {
				$data = array(
				"gender"				=> $gender,
				);

				$update = $dbUser->update($data, $id_connected_user, $stripTags = true);

				// if(empty($userInfo)) {

				// 		$data = array(
				// 			"id_user"				=> $id_connected_user,
				// 			"orientation"			=> $orientation,
				// 			"id_battlenet"			=> null,
				// 			"id_psn"				=> null,	
				// 			"id_lol"				=> null, 
				// 			"id_xbox_live"			=> null,	
				// 			"id_steam"				=> null, 
				// 			"description"			=> null, 
				// 			"user_avatar"			=> null	
				// 		);
				// 		$insert = $dbUserInfo->insert($data, $stripTags = true);
				// 		$confirmation = true; 

				// 	}
				// 	else {

				// 		$data = array(
				// 		"orientation"				=> $orientation,
				// 		);

				// 		$update = $dbUserInfo->update($data, $id_connected_user, $stripTags = true);

				// 		$confirmation = true;
				// 	}

				$confirmation = true;
				$this->redirectToRoute('profil_userInfoConfirm', ['confirm' => $confirmation]);
			} // end if empty errors

		}


		//// d) modifierBut
		if(isset($_POST['modifierBut']) && $_POST['modifierBut'] == "modifier"){

			$friendship = $_POST["friendship"];
			$love = $_POST["love"];

			$data = array(
			"friendship"			=> $friendship,
			"love"					=> $love,
			);

			$update = $dbUser->update($data, $id_connected_user, $stripTags = true);

			$confirmation = true;
			$this->redirectToRoute('profil_userInfoConfirm', ['confirm' => $confirmation]);
		}



		//// 6)ajout de photo
		//*********************************************************
		// utilisation de https://github.com/verot/class.upload.php
		//*********************************************************
		if(isset($_POST['uploadAvatar']) && $_POST['uploadAvatar'] == "Uploader") {

			$avatar_path = 'assets/img/user/user_avatar';
			// TODO trouver un truc pour remplacer la racine?

			$handle = new UploadModel($_FILES['image_field']);


			if($_FILES['image_field']['error'] == 1) {
					$errors['avatar'] = "Echec du téléchargement : votre image dépasse la taille max autorisée (2Mo)";
			}

			if ($handle->uploaded) {

				// paramètres de l'upload
				$handle->file_new_name_body   = 'user_avatar';
				$handle->file_name_body_pre 	= $id_connected_user."_";
				$handle->image_max_width = 2000;
				$handle->image_max_height = 2000;
				$handle->allowed = array('image/*');
				$handle->file_overwrite = true;
				// $handle->file_max_size = '2097152';


				//verification des erreurs AVANT de faire le process

				if($handle->file_is_image == 0){
					$errors['avatar'] = "Echec du téléchargement : seules les images sont autorisées (jpeg, jpg, gif, png, bmp)";
				}

				if($handle->image_src_x > 2000) {
					$errors['avatar'] = "Echec du téléchargement : Votre image est trop large ! (2000px max)";
				}
				if($handle->image_src_y > 2000) {
					$errors['avatar'] = "Echec du téléchargement : Votre image est trop haute ! (2000px max)";
				}



				// si pas d'erreurs call du process = upload
				if(empty($errors)) {

					$handle->Process($avatar_path);
					if ($handle->processed) {
					$user_avatar = $handle->file_dst_name;


						// ici gérer que si la table est vide(ex: premiere connexion) (uniquement pour la table user info), il faut faire un insert, sinon, un update ET on unlink le lien précédent ...
						if(empty($userInfo)) {

							$data = array(
								"id_user"				=> $id_connected_user,
								"orientation"			=> null,
								"id_battlenet"			=> null,
								"id_psn"				=> null,	
								"id_lol"				=> null, 
								"id_xbox_live"			=> null,	
								"id_steam"				=> null, 
								"description"			=> null, 
								"user_avatar"			=> $user_avatar,
							);
							$insert = $dbUserInfo->insert($data, $stripTags = true);
							$confirmation = true; 

						}
						else {
							$data = array(
								"user_avatar"			=> $user_avatar,
							);
							$update = $dbUserInfo->update($data, $id_connected_user, $stripTags = true);
							$confirmation = true;
						}



						$handle->clean();
						$this->redirectToRoute('profil_userInfoConfirm', ['confirm' => $confirmation]);

					} 
					else {
					echo 'Echec du téléchargement de la photo' . $handle->error;
					}

					




				}// end if empty errors
				
				// notes : si on ajoute un nouveau fichier (= c'est un update), on efface l'ancien en mémoire avec unlink()

			}// end handle uploaded


		}// end upload images



	//////////////////// 3) envoi en AFFICHAGE
	$this->show('Profil/settings/user_info', ['user' => $user, 'userInfo' => $userInfo, 'userLocation' => $userLocation,'errors' => $errors]);

	}// END FONCTION MODIFICATION INFO PERSONNELLES(page informations personnelles)




	public function userGaming () {
		$security = new AuthorizationModel;
		$security->isGranted(0);

		// TODO une fois qu'on y retourne : faire la conenxion dans le model
		$connected_user = $this->getUser();
		$id_connected_user = $connected_user['id_user'];

		// ETAPE 1 PASSER TOUS LES GENRES DE JEU EN AFFICHAGE
		$dbGameGenre = new GamingModel;
		$dbGameGenre->setTable('game_all_genre');
		$dbGameGenre->setPrimaryKey('id_genre');

		$gameGenre = $dbGameGenre->findAll();

		$dbUserFav = new GamingModel;
		$dbUserFav->setTable('user_genre_fav');
		$dbUserFav->setPrimaryKey('id_user');

		$userGameFav = $dbUserFav->findUserGenreFavById($id_connected_user);


		if(isset($_POST['modifierGenreFav']) && $_POST['modifierGenreFav'] == "Sauvegarder vos goûts") {
			// ETAPE 2 : ajout DE NOUVEAUX GENRES ou suppression
			if(empty($_POST['id_genre'])) {
				$dbUserFav->deleteAll($id_connected_user);
				// SI RIEN N'EST SELECTIONNE, ON SUPPRIME TOUT
				$confirm = true;
				$this->redirectToRoute('profil_userGamingConfirm', ['confirm' => $confirm]);
			}
			else {

				$id_genre_array = $_POST['id_genre'];

				foreach ($_POST['id_genre'] as $genre) {
					
						//print_r($genre);
						$data = array(
							"id_user"					=> $id_connected_user,
							"id_genre"					=> $genre,
							);

					$dbUserFav->insertUserGenre($data);
				}
				$confirm = true;
				$this->redirectToRoute('profil_userGamingConfirm', ['confirm' => $confirm]);

			}

		} 



	$this->show('Profil/settings/user_gaming', ['gameGenre' => $gameGenre , 'userGameFav' => $userGameFav]);
	} // END FONCTION MODIFICATION JEUX

























} // end class


 ?>