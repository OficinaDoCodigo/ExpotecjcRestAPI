<?php  
	class Activity{
		private $id;
		private $speaker;
		private $title;
		private $description;
		private $type;
		private $duration;
		private $vacancies;
		private $visible;

		function __construct($speaker,$title,$description,$type,$duration,$vacancies,$visible){
			$this->speaker 		= $speaker;
			$this->title 		= $title;
			$this->description 	= $description;
			$this->type 		= $type;
			$this->duration 	= $duration;
			$this->vacancies 	= $vacancies;
			$this->visible  	= $visible;
		}

		public function setId($id){
			$this->id = $id;
		}
		public function getId(){
			return $this->id;
		}

		public function setSpeaker($speaker){
			$this->speaker = $speaker;
		}
		public function getSpeaker(){
			return $this->speaker;
		}

		public function setTitle($title){
			$this->title = $title;
		}		
		public function getTitle(){
			return $this->title;
		}

		public function setDescription($description){
			$this->description = $description;
		}		
		public function getDescription(){
			return $this->description;
		}


		public function setType($type){
			$this->type = $type;
		}
		public function getType(){
			return $this->type;
		}

		public function setDuration($duration){
			$this->duration = $duration;
		}
		public function getDuration(){
			return $this->duration;
		}		

		public function setVacancies($vacancies){
			$this->vacancies = $vacancies;
		}
		public function getVacancies(){
			return $this->vacancies;
		}

		public function setVisible($visible){
			$this->visible = $visible;
		}
		public function isVisible(){
			return $this->visible;
		}
		


	}