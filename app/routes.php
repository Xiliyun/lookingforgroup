<?php
	
	$w_routes = array(
		//////////////////////// Landing Page
		['GET', '/', 'Default#home', 'default_home'],


		/////////////////////// Connexion
		['GET|POST', '/', 'Connexion#header_default_connexion', 'default_connexion'],
		['GET|POST', '/?errors=[:errors]', 'Connexion#header_default_connexion', 'default_connexionerror'],
		['GET|POST', '/connexion', 'Connexion#connexion', 'connexion_connexion'],

		//////////////////////// Deconnexion
		['GET|POST', '/deconnexion', 'Deconnexion#deconnexion', 'deconnexion_deconnexion'],

		//////////////////////// inscription
		['GET|POST', '/inscription', 'Inscription#inscription', 'inscription_inscription'],
		['GET|POST','/inscription/confirmation', 'Inscription#confirmation', 'inscription_confirmation'],

		//////////////////////// User Profile
		['GET','/profil/[:id]', 'Profil#userProfile', 'profil_user'],

		//////////////////////// Espace de modification utilisateurs
		['GET','/profil/modifier/', 'Profil#settings', 'profil_settings'],

		['GET|POST', '/profil/modifier/compte/', 'Profil#accountInfo', 'profil_accountInfo'],
		['GET|POST', '/profil/modifier/compte/?confirm=[:confirm]', 'Profil#accountInfo', 'profil_accountInfoConfirm'],

		['GET|POST', '/profil/modifier/personnel/', 'Profil#userInfo', 'profil_userInfo'],
		['GET|POST', '/profil/modifier/personnel/?confirm=[:confirm]', 'Profil#userInfo', 'profil_userInfoConfirm'],

		/////////////////////// espace admin
		['GET', '/admin', 'Admin#dashboard', 'admin_dashboard'],
		['GET|POST','/admin/genre','Admin#genre', 'genre_add'],

		//////////////////////// Recherche
		['GET|POST','/recherche/', 'Recherche#recherche', 'recherche_recherche'],



		['GET','/accueil', 'Accueil#accueil', 'accueil_accueil'],

	);