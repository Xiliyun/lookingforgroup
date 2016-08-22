<?php 
namespace Model\Chat;

use Model\User\UserModel;
use Datetime;

class ChatModel extends \W\Model\Model {

  public function getMessages() {
    $messages = array();
    

		$allMessages = new ChatModel;
		$allMessages->setTable('messages');
	    $allMessages->setPrimaryKey('id');

	   	$objetMessages = $allMessages->findAll($orderby ="sent_on", $orderdir ="DESC", $limit = 100);

	   	foreach ($objetMessages as $key => $message) {
	   		$messages[] = $message;

	   	}


    return $messages;
  }


  public function addMessage($id_user, $message) {

		$dbChat = new ChatModel;

    $dbUser = new UserModel;
    $user = $dbUser->getUserById($id_user);


        $username = $user['username'];
        $message = $message; 

        $dbChat->setTable('messages');
        $dbChat->setPrimaryKey('id');

        $data = array(
          	'id'	=>null,
            'username' => $username,
            'message' => $message,
            'id_user' => $id_user,
            'sent_on' => date("Y-m-d H:i:s"),

        );

		$addResult = $dbChat->insert($data, $stripTags = true);

		return $addResult;


  }




}