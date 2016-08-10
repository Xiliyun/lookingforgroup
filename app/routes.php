<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET|POST', '/connexion', 'Connexion#connexion', 'connexion_connexion'],
		['GET|POST', '/deconnexion', 'Deconnexion#deconnexion', 'deconnexion_deconnexion'],

		['GET|POST', '/inscription', 'Inscription#inscription', 'inscription_inscription'],

		['GET|POST','/inscription/confirmation', 'Inscription#confirmation', 'inscription_confirmation'],

		['GET','/mon-profil/', 'Profil#monprofil', 'profil_profil'],
		['GET','/recherche/', 'Recherche#marecherche', 'recherche_marecherche'],
		['GET','/accueil', 'Accueil#accueil', 'accueil_accueil'],

		
	);