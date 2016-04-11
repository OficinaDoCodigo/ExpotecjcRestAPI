<?php 
	require ('Connection.php');
	require ('model/Activity.php');
	require ('model/User.php');

	class ActivityDAO{

		public static $ACTIVITY_TYPES = ['Miniscurso','Oficina','Palestra','Mesa Redonda','Resumo','Outros'];

		public static function getAll(){
			$activities = array();
			try {
				$stmt = Connection::prepare("SELECT * FROM activities");
				$stmt->execute();
				$res = $stmt->fetchAll(); 
				foreach ($res as $key => $val) {
					$a = new Activity($val->speaker,$val->title,$val->description,$val->type,$val->duration,$val->vacancies,$val->visible);
					$a->setId($val->id);

					$u = ActivityDAO::getUser($a->getSpeaker());
				$speaker = ['id' => $u->getId(), 'name' => $u->getName(),'surname' => $u->getSurname(),'email' => $u->getEmail(), 'photo' => $u->getPhoto()];

					$arr[] = ['id' => $a->getId(), 'speaker' => $speaker,'title' => $a->getTitle(), 'description' => $a->getDescription(), 'type' => $a->getType(), 'duration' =>$a->getDuration(), 'vacancies' => $a->getVacancies(), 'visible' => $a->isVisible()];
				$result = ['activity' => $activity];
					$activities = ['activity' => $arr]; 
				}



			} catch (PDOException $e) {
				echo "ACTIVITIES NOT FOUND!";
			}
			return $activities;		
		}

		public static function get($activity_id){
			$activity = array();
			try {
				$stmt = Connection::prepare("SELECT * FROM activities WHERE id = ?");
				$stmt->bindValue(1,$activity_id);
				$stmt->execute();
				$a = $stmt->fetch();
				$activity = new Activity($a->speaker,$a->title,$a->description,$a->type,$a->duration,$a->vacancies,$a->visible);
				$activity->setId($a->id);
			} catch (PDOException $e) {
				echo "ACTIVITY NOT FOUND!";
			}
			return $activity;		
		}


		// COISAS DO USUÁRIO
		public static function getUser($user_id){
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

