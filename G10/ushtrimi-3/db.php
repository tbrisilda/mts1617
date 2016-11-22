<?php
	/**
	* Kjo klase ka 3 metoda
	* connect ben lidhjen me databazen
	* closeConnection mbyll lidhjen me databazen
	* query ekzekuton query
	*/
	class DB
	{
		private $database;
		private $server;
		private $user;
		private $password;
		private $conn;
		function __construct($server,$database,$user,$password)
		{
			$this->server = $server;
			$this->database = $database;
			$this->user = $user;
			$this->password =$password;
		}
		public function connect(){
			$respons = new stdClass();
			$conn = new mysqli($this->server,$this->user,$this->password,$this->database);
			// Check connection
			$respons->success = true;
			if ($conn->connect_error)
			{
				$respons->success = false;
			  	$respons->message ="Failed to connect to MySQL: " . $conn->connect_error;
			}
			if($respons->success)
				$this->conn = $conn;
			return $respons;
		}
		public function closeConnection(){
			return $this->conn->close();
		}
		public function query($sql){
			return $this->conn->query($sql);
		}
	}
?>