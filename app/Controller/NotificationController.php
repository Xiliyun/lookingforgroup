<?php 
namespace Controller;

use \W\Controller\Controller;

use Model\User\UserModel;
use Model\Notifications\NotificationsModel;

class NotificationController extends Controller {

	public function updateNotifications() {

	$connected_user = $this->getUser();
	$id_connected_user = $connected_user['id_user'];

	$notificationsDb = new notificationsModel;
	$new_notifications = $notificationsDb->checkNotifications($id_connected_user);




	$this->show('templates/header/main', ['my_notifications' => $new_notifications]);

	}


	public function get_notifications() {

		$connected_user = $this->getUser();
		$id_connected_user = $connected_user['id_user'];

		$notificationsDb = new notificationsModel;
		$new_notifications = $notificationsDb->checkNotifications($id_connected_user);


		print_r($new_notifications);

		$this->show('templates/header/main', ['new_notifications' => "bonjour"]);



	}
	









}











 ?>