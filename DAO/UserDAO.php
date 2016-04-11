<?php 
	require ('Connection.php');
	require ('model/User.php');

	class UserDAO{

		public static function getAll(){
			$users = array();
			try {
				$stmt = Connection::prepare("SELECT * FROM users");
				$stmt->execute();
				$users = $stmt->fetchAll(); 
			} catch (PDOException $e) {
				echo "USERS NOT FOUND!";
			}
			return $users;		
		}

		public static function get($user_id){
			$user = array();
			try {
				$stmt = Connection::prepare("SELECT * FROM users WHERE id = ?");
				$stmt->bindValue(1,$user_id);
				$stmt->execute();
				$u = $stmt->fetch();
				$user = new User($u->name,$u->surname,$u->email,$u->password,$u->photo);
				$user->setId($u->id);
			} catch (PDOException $e) {
				echo "USER NOT FOUND!";
			}
			return	$user;		
		}


	}

