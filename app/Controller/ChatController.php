<?php

namespace Controller;

use \W\Controller\Controller;
use Model\Chat\ChatModel;

class ChatController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	// public function chat()
	// {
	// 	$connected_user = $this->getUser();
	// 	$this->show('chat/chat', ['user' => $connected_user]);
	// }


// todo changer nom de la methde

	public function add_msg() {
		$chat = new ChatModel();

		$connected_user = $this->getUser();
		$userId = $connected_user['id_user'];

		if (isset($_POST['msg'])) {

			$msg = $_POST['msg'];

			$result = $chat->addMessage($userId, $msg);
		}


		// RECUPERATION DES MESSAGES

		$messages = $chat->getMessages();


		$this->show('templates/footer/chat/chat', ['user' => $connected_user , 'messages' => $messages]);

	}

	public function get_msg() {


		$chat = new ChatModel();

		$messages = $chat->getMessages();


		$this->show('templates/footer/chat/chat_messages', ['messages' => $messages]);


	}
	



}