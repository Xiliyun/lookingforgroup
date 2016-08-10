<?php

namespace Controller;

use \W\Controller\Controller;

use Model\Connexion\UserModel;
use Model\Connexion\userConnexionModel;


class DeconnexionController extends Controller
{

	public function deconnexion()
	{
		
				unset($_SESSION['user']);

				
				$this->redirectToRoute('default_home');

				

				

		}
		

	
	}
	

