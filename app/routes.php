<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET|POST', '/', 'Connexion#header_default_connexion', 'default_connexion'],

		
		['GET|POST', '/connexion', 'Connexion#connexion', 'connexion_connexion'],
		['GET|POST', '/deconnexion', 'Deconnexion#deconnexion', 'deconnexion_deconnexion'],

		['GET|POST', '/inscription', 'Inscription#inscription', 'inscription_inscription'],

		['GET|POST','/inscription/confirmation', 'Inscription#confirmation', 'inscription_confirmation'],

		['GET','/profil/utilisateur', 'Profil#userOwnProfile', 'profil_myprofile'],
		//['GET','/profil/[:id_user]', 'Profil#userProfile', 'profil_user'],

		['GET','/recherche', 'Recherche#marecherche', 'recherche_marecherche'],

		['GET','/accueil', 'Accueil#accueil', 'accueil_accueil'],

		
	);