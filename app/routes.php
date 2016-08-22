<?php
	
	$w_routes = array(
		//////////////////////// Landing Page
		['GET', '/', 'Default#home', 'default_home'],


		/////////////////////// Connexion
		['GET|POST', '/', 'Connexion#header_default_connexion', 'default_connexion'],
		['GET|POST', '/?errors=[:errors]', 'Connexion#header_default_connexion', 'default_connexionerror'],
		['GET|POST', '/?errors=[:errors]/', 'Connexion#header_default_connexion', 'default_connexionerrorbis'],

		['GET|POST', '/connexion', 'Connexion#connexion', 'connexion_connexion'],
		['GET|POST', '/connexion/', 'Connexion#connexion', 'connexion_connexionbis'],

		//////////////////////// Deconnexion
		['GET|POST', '/deconnexion', 'Deconnexion#deconnexion', 'deconnexion_deconnexion'],
		['GET|POST', '/deconnexion/', 'Deconnexion#deconnexion', 'deconnexion_deconnexionbis'],

		//////////////////////// inscription
		['GET|POST', '/inscription', 'Inscription#inscription', 'inscription_inscription'],
		['GET|POST', '/inscription/', 'Inscription#inscription', 'inscription_inscriptionbis'],
		['GET|POST','/inscription/confirmation', 'Inscription#confirmation', 'inscription_confirmation'],

		//////////////////////// User Profile
		['GET|POST','/profil/[i:id]', 'Profil#userProfile', 'profil_user'],
		['GET|POST','/profil/[i:id]/', 'Profil#userProfile', 'profil_userbis'],
		['GET|POST', '/profil/[i:id]/?confirm=[:confirm]', 'Profil#userProfile', 'profil_userConfirm'],



		//////////////////////// User Profil ajout d'amis
		['GET|POST','/profil/[i:id]/friends', 'Profil#friends', 'profil_friends'],
		['GET|POST','/profil/[i:id]/friends/', 'Profil#friends', 'profil_friendsbis'],
		['GET|POST', '/profil/[i:id]/friends/?confirm=[:confirm]&friend=[:friend_username]', 'Profil#friends', 'profil_friendsConfirm'],

		//////////////////////// Espace de modification utilisateurs
		['GET','/profil/modifier', 'UserSettings#settings', 'profil_settings'],
		['GET','/profil/modifier/', 'UserSettings#settings', 'profil_settingsbis'],

		['GET|POST', '/profil/modifier/compte', 'UserSettings#accountInfo', 'profil_accountInfo'],
		['GET|POST', '/profil/modifier/compte/', 'UserSettings#accountInfo', 'profil_accountInfobis'],
		['GET|POST', '/profil/modifier/compte/?confirm=[:confirm]', 'UserSettings#accountInfo', 'profil_accountInfoConfirm'],

		['GET|POST', '/profil/modifier/personnel', 'UserSettings#userInfo', 'profil_userInfo'],
		['GET|POST', '/profil/modifier/personnel/', 'UserSettings#userInfo', 'profil_userInfobis'],
		['GET|POST', '/profil/modifier/personnel/?confirm=[:confirm]', 'UserSettings#userInfo', 'profil_userInfoConfirm'],

		['GET|POST', '/profil/modifier/gaming', 'UserSettings#userGaming', 'profil_userGaming'],
		['GET|POST', '/profil/modifier/gaming/', 'UserSettings#userGaming', 'profil_userGamingbis'],
		['GET|POST', '/profil/modifier/gaming/?confirm=[:confirm]', 'UserSettings#userGaming', 'profil_userGamingConfirm'],

		// ['GET', '/profil/modifier/gaming/allGenreData?[:token]', 'Data\DataGenre#allGenreData', 'profil_allGenreData'],


		/////////////////////// espace admin

		['GET|POST', '/admin', 'Admin#dashboard', 'admin_dashboard'],
		['GET|POST','/admin/genre','Admin#genre', 'genre_add'],
		['GET|POST', '/admin/gestion_membres', 'Admin#gestion_membres', 'gestion_membres'],
		['GET|POST', '/admin/gestion_news', 'Admin#gestion_news', 'gestion_news'],

		/////////////////////// Admin ->modification d'un profil
		['GET|POST','/modifier/[:id]', 'Admin#modifier_membres', 'modifier_membre'],
		/////////////////////// Admin ->suppression d'un profil
		['GET|POST','/supprimer/[:id]', 'Admin#supprimer_membre', 'supprimer_membre'],

		

		//////////////////////// Recherche
		['GET|POST','/recherche', 'Recherche#recherche', 'recherche_recherche'],
		['GET|POST','/recherche/', 'Recherche#recherche', 'recherche_recherchebis'],


		//////////////////////// Chat
		['GET|POST','/chat', 'Chat#add_msg', 'chat_chat'],
		['GET|POST','/chat/messages', 'Chat#get_msg', 'chat_messages'],


		/////////////////////// Notifications
		['GET|POST','/notifications', 'Notification#get_notifications', 'notification_notification'],
		// ['GET|POST','/notifications/', 'Notification#notifications', 'notification_notificationbis'],



		/*********************************************************/
		/************************ ACCUEIL ************************/
		/*********************************************************/
		['GET','/accueil', 'Accueil#accueil', 'accueil_accueil'],

	);