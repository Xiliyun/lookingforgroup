<?php 
namespace Controller\Registration;

use \W\Controller\Controller;
use Model\Registration\UserRegistrationModel;

class UserRegistrationController extends Controller {

	public function registerNewUser {


		if ($_POST) {
			$db = new UserRegistrationModel;
			$db->setTable("user");
			$db->setPrimaryKey('id_user');

			// TODO VERIFIER SI LA SECURISATION DES DONNEES AVANT INSERTION SE FAIT GRACE AU MODEL
			$data= array(
				id_user => "null"
				username => $_POST["username"],
				email => $_POST["email"],
				password => $_POST["password"],
				date_joined => date("Y-m-d H:i:s"),
				role => "0",
				dob => $_POST["dob"],
				firstname => $_POST["firstname"],
				lastname => $_POST["lastname"],
				gender => $_POST["gender"],
				friendship => $_POST["friendship"],
				love => $_POST["love"],
				orientation => $_POST["orientation"]

				);



			$db->insert($data);

		}





	}


}


 ?>