<?php
	/**
	* 
	*/
	require '../db.php';
	class TestDb
	{
		private $db;
		public function __construct()
		{
			$db = new DB('localhost','mts_usht3','mts','UD2uH4aPaFZpSfAc');
			$this->db=$db;
		}
		public function testConnection(){
			$respons = $this->db->connect();
			if($respons->success){
				return '<span style="color:green">Lidhja u krye me sukses</span>';
			}else{
				return '<span style="color:red">Lidhja deshtoi: '.$respons->message.'</span>';
			}
		}
		public function testCloseConnection(){
			if($this->db->closeConnection())
				return '<span style="color:green">Lidhja u mbyll me sukses</span>' ;
			else
				return '<span style="color:red">Mbyllja e lidhjes me databazen deshtoi </span>';
		}
		public function testQuery($sql){
			return $this->db->query($sql);
		}


	}
?>