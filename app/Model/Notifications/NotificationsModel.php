<?php 

namespace Model\Notifications;

use Datetime;



class NotificationsModel extends \W\Model\Model {


	// STEP 1 : INSERTION D'UNE NOUVELLE NOTIFICATION dans la table notifications done
	// STEP 2 : INSERTION dans la table User_noficiation done
	// step 3 :checkNotifications ou le statut est à 0
	// step 4 : updateNotifications quand on fait une action

	public function newNotification( $details, $stripTags = true)
		{
			$data = array(
				'id_notification' => null,
				'details_notifications' => $details,
				'date' => date("Y-m-d H:i:s"),
				);

			$this->setTable('notification');
			$this->setPrimaryKey('id_notification');



			$sql = 'INSERT INTO ' . $this->table . ' VALUES (';
			foreach($data as $key => $value){
				$sql .= ":$key, ";
			}
			// Supprime les caractères superflus en fin de requète
			$sql = substr($sql, 0, -2);
			$sql .= ')';

			$sth = $this->dbh->prepare($sql);
			foreach($data as $key => $value){
				$value = ($stripTags) ? strip_tags($value) : $value;
				$sth->bindValue(':'.$key, $value);
			}

			if (!$sth->execute()){
				return false;
			}
			return $this->find($this->lastInsertId());
		}


	public function insertUserNewNotification(array $data, $stripTags = true)
		{
			$this->setTable('user_notification');
			$this->setPrimaryKey('id_user_notification');



			$sql = 'INSERT INTO ' . $this->table . ' VALUES (';
			foreach($data as $key => $value){
				$sql .= ":$key, ";
			}
			// Supprime les caractères superflus en fin de requète
			$sql = substr($sql, 0, -2);
			$sql .= ')';

			$sth = $this->dbh->prepare($sql);
			foreach($data as $key => $value){
				$value = ($stripTags) ? strip_tags($value) : $value;
				$sth->bindValue(':'.$key, $value);
			}

			if (!$sth->execute()){
				return false;
			}
			return $this->find($this->lastInsertId());
		}


	public function getNotifications ($id) {
			$this->setTable('user_notification');
			$this->setPrimaryKey('id_user_notification');

			if (!is_numeric($id)){
				return false;
			}

			//$sql = 'SELECT * FROM ' . $this->table . ', WHERE id_user = :id AND status = "0" ';
			//AND user_notification.status = "0"
			$sql = 'SELECT * FROM user_notification, notification WHERE user_notification.id_user = :id AND notification.id_notification = user_notification.id_notification ORDER BY user_notification.id_notification DESC limit 20';

			$sth = $this->dbh->prepare($sql);
			$sth->bindValue(':id', $id);
			$sth->execute();

			return $sth->fetchAll();

	}

	public function checkNotifications ($id) {
			$this->setTable('user_notification');
			$this->setPrimaryKey('id_user_notification');

			if (!is_numeric($id)){
				return false;
			}

			//$sql = 'SELECT * FROM ' . $this->table . ', WHERE id_user = :id AND status = "0" ';
			//AND user_notification.status = "0"
			$sql = 'SELECT * FROM user_notification, notification WHERE user_notification.id_user = :id AND notification.id_notification = user_notification.id_notification AND user_notification.status = "0" limit 20';

			$sth = $this->dbh->prepare($sql);
			$sth->bindValue(':id', $id);
			$sth->execute();

			return $sth->fetchAll();

	}

	public function updateStatus($id) {
			$this->setTable('user_notification');
			$this->setPrimaryKey('id_user_notification');

			if (!is_numeric($id)){
				return false;
			}

			$sql = 'UPDATE ' . $this->table . ' SET status = "1" WHERE id_user ='.strip_tags($id) ;
			$sth = $this->dbh->prepare($sql);
			if(!$sth->execute()){
				return false;
			}
			// update where id_user = $id
	}

}










 ?>