<?php

namespace Controller;

use \W\Controller\Controller;

use Model\User\UserModel;
use Model\User\userConnexionModel;


class DeconnexionController extends Controller
{

	public function deconnexion()
	{
		
				unset($_SESSION['user']);

				
				$this->redirectToRoute('default_home');

				

				

		}
		

	
	}
	

