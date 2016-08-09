<?php 
namespace Controller;

use \W\Controller\Controller;
use Model\Registration\UserRegistrationModel;
//use Model\Inscription\InscriptionModel;

class InscriptionController extends Controller {

	public function inscription() {


		if ($_POST) {
			// TODO PRECISER LE FORMULAIRE EN POST (if($_POST[] == ""))
			$db = new UserRegistrationModel;
			$db->setTable("user");
			$db->setPrimaryKey('id_user');

			//tableau des erreurs
			$errors = array();



			/***************************************/
			/////// VERIFICATION DES CHAMPS /////////
			/***************************************/
			// verification username 
			// if(empty($_POST['username'])) {
			// 	$errors['username'] = 'Veuillez remplir ce champs';		
			// }
			// else if(strlen($_POST['username']) < 3){
			// 	$errors['username'] = 'Votre pseudo doit comporter au moins 3 caractères';		
			// }else if(strlen($_POST['username']) > 45) {
			// 	$errors['username'] = 'Votre pseudo est trop long !(45 caractères max)';
			// }else if(!preg_match('/^[A-Za-z][A-Za-z0-9]$/', $_POST['username'])) {
			// 	$errors['username'] = 'Veuillez ne pas utiliser de caractères spéciaux dans votre pseudo';
			// }else { // vérification de l'existence en base

			// 	if($db->usernameExists($_POST['username'])) {
			// 		$errors['username'] = 'Ce nom d\'utilisateur existe déjà !';
			// 	}

			// }

			//verification email
			// if(empty($_POST['email'])) {
			// 	$errors['email'] = 'Veuillez remplir ce champs';		
			// }
			// elseif(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
			// 	$errors['email'] = 'Veuillez entrer un email valide';		
			// }
			// else {
			// 	if($db->emailExists($_POST["email"])) {
			// 		$errors['email'] = 'Cet email existe déjà !';		
			// 	}
			// }

			// verification firstname
			// if(empty($_POST['firstname'])) {
			// 	$errors['firstname'] = 'Veuillez remplir ce champs';		
			// }
			// else if(strlen($_POST['firstname']) < 2){
			// 	$errors['firstname'] = 'Votre prénom doit comporter au moins 2 caractères';		
			// }else if(strlen($_POST['firstname']) > 45) {
			// 	$errors['firstname'] = 'Votre prénom est trop long !(45 caractères max)';
			// }else if(!preg_match('/^[A-Za-z][A-Za-z0-9]$/', $_POST['firstname'])) {
			// 	$errors['firstname'] = 'votre prénom ne peut contenir de caractères spéciaux';
			// }


			// verification lastname
			// if(empty($_POST['lastname'])) {
			// 	$errors['lastname'] = 'Veuillez remplir ce champs';		
			// }
			// else if(strlen($_POST['lastname']) < 2){
			// 	$errors['lastname'] = 'Votre nom doit comporter au moins 2 caractères';		
			// }else if(strlen($_POST['lastname']) > 45) {
			// 	$errors['lastname'] = 'Votre nom est trop long !(45 caractères max)';
			// }else if(!preg_match('/^[A-Za-z][A-Za-z0-9]$/', $_POST['lastname'])) {
			// 	$errors['lastname'] = 'votre nom ne peut contenir de caractères spéciaux';
			// }

			// verification mot de passe
			// if(empty($_POST['password'])) {
			// 	$errors['password'] = 'Veuillez remplir ce champs';		
			// }else if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/', $_POST['password'])) {
			// 	$errors['password'] = 'Votre mot de passe doit respecter les conditions suivantes : minimum 8 caractères comprenant 1 chiffre et 1 caractère spécial';		
			// }

			// verification que les mots de passe correspondent
			// if(empty($_POST['passwordConfirm'])) {
			// 	$errors['passwordConfirm'] = 'Veuillez remplir ce champs';		
			// }else if($_POST['password'] != $_POST['passwordConfirm']) {
			// 	$errors['password'] = 'Vos mots de passe ne se correspondent pas';		
			// }


			// verification date de naissance

			// if(empty($_POST['dob'])) {
			// 	$errors['dob'] = 'Veuillez entrer votre date de naissance';
			// }
			// if(isset($_POST['dob'])) {
			// 	$from = new DateTime('1970-02-01');
			// 	$to   = new DateTime('today');
			// 	echo $from->diff($to)->y;
			// }
			// else if () { // age trop jeune
			// 	$errors['dob'] = 'Vous devez avoir plus de 18 ans pour devenir membre de ce site';
			// }
			 $username = $_POST["username"];
			 $email = $_POST["email"];
			 $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
			 $date_joined = date("Y-m-d");
			 $role = "0";
			 $dob = $_POST["dob"];
			 $firstname = $_POST["firstname"];
			 $lastname = $_POST["lastname"];
			 $gender = $_POST["gender"];
			 $friendship = $_POST["friendship"];
			 $love = $_POST["love"];


			//var_dump($errors);
			// SI PAS D'ERREUR, CREATION DU TABLEAU DES DONNEES
			// todo hashage mot de passe
			if(empty($errors)) {
				$data= array(
					"id_user"				=> null,
					"username"				=> "test",
					"email"					=> "test",
					"password"				=> $password,
					"date_joined"			=> "test",
					"role"					=> "test",
					"dob"					=> "test",
					"firstname"				=> "test",
					"lastname"				=> "test",
					"gender"				=> "test",
					"friendship"			=> "test",
					"love"					=> "test",

					);





				// SI PAS D'ERREUR INSERER EN BDD
				$db->insert($data, $stripTags = true);

				//print_r($data);

		//print_r($colNamesString);

			// DEUXIEME ETAPE : INSERTION DE L'ADRESSE
				var_dump($db);




			} // end if empty $errors

		}



		$this->show('inscription/inscription');


	}

}


 ?>