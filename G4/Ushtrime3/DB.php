<?php

class DB {

	/**
	 * Database server name.
	 *
	 * @var string
	 */		
	private $servername = 'localhost';
	
	/**
	 * Username for the database.
	 *
	 * @var string
	 */		
	private $username = 'aurel';
	
	/**
	 * User password for the database.
	 *
	 * @var string
	 */		
	private $password = '123456';
	
	/**
	 * Database name to be used.
	 *
	 * @var string
	 */		
	private $dbname = 'mts3';

	/**
	 * Database table to be used.
	 *
	 * @var string
	 */		
	private $table = 'emails';
	
	/**
	 * Store a new Mysqli connection.
	 *
	 * @var string
	 */		
	private $conn;
	
	/**
	 * Email of the user.
	 *
	 * @var string
	 */		
	public $email;
	
	/**
	 * Store a boolean value when message is sent or not.
	 *
	 * @var bool
	 */	
	public $sent = 0;
	
	/**
	 * Store errors (if any) when sending an email.
	 *
	 * @var string
	 */
	public $errorInfo;
	
	/**
	 * Create a new database connection instance.
	 *
	 * @return bool
	 */	
	public function __construct()
	{
		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

		if ($this->conn->connect_error) 
		{
			echo $this->conn->connect_error;
			
			return false;
		}

		return true;		
	}

	/**
	 * Store the email information into the database.
	 *
	 * @return bool
	 */		
	public function save()
	{
		$sql = "INSERT INTO $this->table(email, sent, error_info) VALUES('$this->email', '$this->sent', '$this->errorInfo')";

		if ($this->conn->query($sql) === true) 
		{
			return true;
		} 
		
		echo $this->conn->error;
		
		return false;	
	}

	/**
	 * Close the database connection when object goes out of scope.
	 *
	 * @return void
	 */		
	public function __destruct()
	{
		$this->conn->close();
	}
	
}