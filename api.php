<?php 

	require ('DAO/ActivityDAO.php');

	$method = $_SERVER['REQUEST_METHOD']; 
	$result  = Array();
	$status = "200";

	if($method == 'GET'){
		if(isset($_GET['id'])){
			$a = ActivityDAO::get($_GET['id']);
			if($a->getId() != null) {

				$u = ActivityDAO::getUser($a->getSpeaker());
				$speaker = ['id' => $u->getId(), 'name' => $u->getName(),'surname' => $u->getSurname(),'email' => $u->getEmail(), 'photo' => $u->getPhoto()];

				$activity = ['id' => $a->getId(), 'speaker' => $speaker,'title' => $a->getTitle(), 'description' => $a->getDescription(), 'type' => $a->getType(), 'duration' =>$a->getDuration(), 'vacancies' => $a->getVacancies(), 'visible' => $a->isVisible()];
				$result = ['activity' => $activity];
			}else{
				$result = ["ACTIVITY_NOT_FOUND"];
				$status = "404";
			}
		}else{
			$activities = ActivityDAO::getAll();
			if($activities != null){
				//$u = ActivityDAO::getUser($a->getSpeaker());
				$result = $activities;
			}else{
				$result = ['NO_RESULTS_FOUND'];
			}
		}	
	}
	else if($method == 'POST') {	
		//$u 	  = UserDAO::save($_POST['user']);
		//$result = ['users' => $_POST['name'] ];
	}


	else if($method == 'DELETE'){

	}	

	$arr = ['result' => $result, 'method' => $method, 'status' => $status ];
	die(json_encode($arr));