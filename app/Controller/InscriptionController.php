<?php 
namespace Controller;

use \W\Controller\Controller;
use Model\Registration\UserRegistrationModel;
use Model\Registration\UserLocationModel;
use DateTime;

class InscriptionController extends Controller {




	public function inscription() {

		$errors = array();

		
			if(isset($_POST["inscrire"]) && $_POST["inscrire"] == "S'inscrire") {
			/**************************************************************/
			/////// ETAPE 1 : INSERTION DES DONNEES EN TABLE USER /////////
			/************************************************************/


				$dbUser = new UserRegistrationModel;
				$dbUser->setTable("user");
				$dbUser->setPrimaryKey('id_user');

				//tableau des erreurs

				/***************************************/
				/////// Recuperation des input /////////
				/***************************************/

				// table User
				$username = $_POST["username"];
				$email = $_POST["email"];
				$password = $_POST["password"];
				$date_joined = date("Y-m-d"); 
				$role = "0"; 
				$dob = $_POST['dob'];//date('Y-m-d', strtotime($_POST['dob'])
				$firstname = $_POST["firstname"];
				$lastname = $_POST["lastname"];
				$gender = $_POST["gender"];
				$friendship = $_POST["friendship"];
				$love = $_POST["love"];

				// table User_location

				$city = $_POST["city"];
				$region = $_POST["region"];
				$postal_code = $_POST["postalcode"];
				$country = $_POST["country"];
				$lat = $_POST["lat"];
				$lng = $_POST["lng"];







			/***************************************/
			/////// VERIFICATION DES CHAMPS /////////
			/***************************************/
			//verification username 
			if(empty($username)) {
				$errors['username'] = 'Veuillez remplir ce champs';		
			}
			else if(strlen($username) < 3){
				$errors['username'] = 'Votre pseudo doit comporter au moins 3 caractères';		
			}else if(strlen($username) > 45) {
				$errors['username'] = 'Votre pseudo est trop long !(45 caractères max)';
			}else { // vérification de l'existence en base

				if($dbUser->usernameExists($username)) {
					$errors['username'] = 'Ce nom d\'utilisateur existe déjà !';
				}

			}

			// verification date de naissance

			if(empty($dob)) {
				$errors['dob'] = 'Veuillez entrer votre date de naissance';
			}
			else if(isset($dob)) {

				if((DateTime::createFromFormat('Y-m-d', $dob)->diff(new DateTime('now'))->y) < 18) {
					$errors['dob'] = 'Vous devez avoir plus de 18 ans pour devenir membre de ce site';
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
				if($dbUser->emailExists($email)) {
					$errors['email'] = 'Cet email existe déjà !';		
				}
			}

			//verification firstname
			if(empty($firstname)) {
				$errors['firstname'] = 'Veuillez remplir ce champs';		
			}
			else if(strlen($firstname) < 2){
				$errors['firstname'] = 'Votre prénom doit comporter au moins 2 caractères';		
			}else if(strlen($firstname) > 45) {
				$errors['firstname'] = 'Votre prénom est trop long !(45 caractères max)';
			}
			else if(!ctype_alpha($lastname)) {
				$errors['firstname'] = 'votre prénom ne peut contenir de caractères spéciaux, ni de chiffres';
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
				$errors['lastname'] = 'votre prénom ne peut contenir de caractères spéciaux, ni de chiffres';
			} // ne marche pas

			//verification mot de passe
			if(empty($password)) {
				$errors['password'] = 'Veuillez remplir ce champs';		
			}
			else if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d$@$!%*#?&]{6,}$/', $password)) {
				$errors['password'] = 'Votre mot de passe doit respecter les conditions suivantes : minimum 6 caractères alphanumériques comprenant 1 chiffre';		
			}
			// (?=.*[$@$!%*#?&])

			// verification que les mots de passe correspondent
			if(empty($_POST['passwordConfirm'])) {
				$errors['passwordConfirm'] = 'Veuillez confirmer votre mot de passe';		
			}else if($_POST['passwordConfirm'] != $_POST['passwordConfirm']) {
				$errors['passwordConfirm'] = 'Vos mots de passe ne se correspondent pas';		
			}

			// verification que l'utilisateur a bien entré son genre
			if(empty($dob)) {
				$errors['gender'] = 'Êtes vous un homme ou une femme? Veuillez préciser votre sexe';
			}

			// verification que l'utilisateur a bien entré son adresse
			if(empty($postal_code)) {
				$errors['location'] = "Veuillez entrer votre ville ou la sélectionner grâce au code postal";
			}
		
		
	
		
		
		
			
			// SI PAS D'ERREUR, CREATION DES TABLEAUX DE DONNEES

			if(empty($errors)) {
				// HASHAGE PASSWORD ICI AVANT INSERTION

				$password = password_hash($password, PASSWORD_DEFAULT);

				$data= array(
					"id_user"				=> null,
					"username"				=> $username,
					"email"					=> $email,
					"password"				=> $password,
					"date_joined"			=> $date_joined,
					"role"					=> $role,
					"dob"					=> $dob,
					"firstname"				=> $firstname,
					"lastname"				=> $lastname,
					"gender"				=> $gender,
					"friendship"			=> $friendship,
					"love"					=> $love,

					);

				// SI PAS D'ERREUR INSERER EN BDD
				$dataUser = $dbUser->insert($data, $stripTags = true);

				//print_r($donnees);
				$id_user = $dataUser["id_user"];


			// DEUXIEME ETAPE : INSERTION DE L'ADRESSE DANS LA TABLE LOCATION

			$dbLoc = new UserLocationModel;
			$dbLoc->setTable('user_location');
			$dbLoc->setPrimaryKey('id_user');

			//print_r($id_user);
			$dataLoc = array(
				"id_user"				=> $id_user,
				"city"					=> $city,
				"region"				=> $region,
				"postal_code"			=> $postal_code,
				"country"				=> $country,
				"lat"					=> $lat,
				"lng"					=> $lng,
				);

			$insert = $dbLoc->insert($dataLoc, $stripTags = true);
			// //print_r($insert);

			$this->redirectToRoute('inscription_confirmation');

			} // end if empty $errors


			//$this->redirectToRoute('inscription_confirmation');
		} // END condition If($_POST)


		
		$this->show('inscription/inscription', ["errors" => $errors] );

	}

	public function confirmation () {
		// TODO gérer la connexion dès l'inscription
			$this->show('inscription/confirmation');
			
	}
	

}


 ?>