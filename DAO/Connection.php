<?php
	class Connection{
		private static $db;
		
		public static function init(){
			if(!isset(self::$db)){
				try {
					$host		= 'localhost';
				 	$dbname		= 'webrest';
				 	$user		= 'root';
					$pass		= 'root';
					self::$db = new PDO("mysql:host=$host;port=3306;dbname=$dbname", $user,$pass);
					self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   				self::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
				} catch (PDOException $e) {
					echo "CONNECTION ERROR!<br>".$e->getMessage();		
				}
			}	
			return self::$db;
		} 
		
		public static function prepare($sql){
			return self::init()->prepare($sql);
		}
	}
