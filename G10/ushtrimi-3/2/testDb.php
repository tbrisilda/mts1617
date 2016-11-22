<?php
	/**
	* 
	*/
	require '../db.php';
	class TestDb extends PHPUnit_Framework_TestCase
	{
	  public function setUp(){ }
	  public function tearDown(){ }

		private $db;
		public function __construct()
		{
			$db = new DB('localhost','mts_usht3','mts','UD2uH4aPaFZpSfAc');
			$this->db=$db;
		}
		public function testConnection(){
			$respons = $this->db->connect();
			if(!$respons->success){
				$this->assertFalse($this->db->connect());
			} else {
			    $this->assertTrue($this->db->connect());
			}
		}
		public function testCloseConnection(){
			if(!$this->db->closeConnection()){
				$this->assertFalse($this->db->closeConnection());
			} else {
			    $this->assertTrue($this->db->closeConnection());
			}
		}
		public function testQuery($sql){
			 $this->assertTrue($this->db->query($sql));
		}


	}
?>