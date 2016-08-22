<?php 
namespace Model\Gaming;



class GamingModel extends \W\Model\Model {


	// fonction pour récupérer un array de genre favori par l'utilisateur connecté uniquement
	public function findUserGenreFavById($id_user)
	{
		$this->setTable('user_genre_fav');
		$this->setPrimaryKey('id_user');

		if (!is_numeric($id_user)){
			return false;
		}
		

		$sql = 'SELECT user_genre_fav.id_user, user_genre_fav.id_genre, game_all_genre.*  FROM '  . $this->table .  ', game_all_genre WHERE user_genre_fav.id_user = ' . $id_user . ' AND user_genre_fav.id_genre =  game_all_genre.id_genre ';
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
	}

	public function findUserGenreFavByGenre($id_genre)
	{
		$this->setTable('user_genre_fav');

		if (!is_numeric($id_genre)){
			return false;
		}
		

		$sql = 'SELECT user_genre_fav.id_user, user_genre_fav.id_genre, game_all_genre.*  FROM '  . $this->table .  ', game_all_genre WHERE user_genre_fav.id_genre = ' . $id_genre . ' AND user_genre_fav.id_genre =  game_all_genre.id_genre ORDER BY RAND() limit 10';
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
	}



	public function insertUserGenre($data , $stripTags = true) {
		$this->setTable('user_genre_fav');
		$this->setPrimaryKey('id_user');

		$sql = 'SELECT * FROM user_genre_fav WHERE (id_user= '.$data['id_user'].' AND id_genre= '.$data['id_genre'] .' )';
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		$genre_array = $sth->fetchAll();

		if(!empty($genre_array) && !empty($data)){

			foreach ($genre_array as $key => $genre) {

					// SUPPRIMER LA OU ID USER ET ID GENRE NE SE CORRESPONDENT PAS DONC
				$new_genre_selection = array_diff_assoc($data, $genre_array);
				//print_r($new_genre_selection['id_genre'] );
				$sql = 'DELETE FROM ' . $this->table . ' WHERE id_user = '. $new_genre_selection['id_user'] .' AND  id_genre <> '.$new_genre_selection['id_genre'];
				$update = $this->dbh->prepare($sql);
				$update->execute();

			}




		}
		else { // si genre array retourne vide : faire l'insertion


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


		}

	}

	public function deleteAll($id) {

		if (!is_numeric($id)){
			return false;
		}

		$sql = 'DELETE FROM ' . $this->table . ' WHERE ' . $this->primaryKey .' = :id ';
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id', $id);
		return $sth->execute();
	

	}


}







 ?>