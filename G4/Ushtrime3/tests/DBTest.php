<?php

require '../DB.php';
require '../mocks/MailMock.php';
require '../mocks/JsonReaderMock.php';
require '../vendor/phpunit/phpunit/src/ForwardCompatibility/TestCase.php';

use PHPUnit\Framework\TestCase;

class DBTest extends TestCase {

	/**
	 * Tests if a connection to database was established.
	 */		
	public function testConnection()
	{
		$db = new DB;
		
		$this->assertTrue($db->__construct());
	}
	
	/**
	 * Tests if the email info has been saved into database.
	 */	
	public function testSave()
	{
		$db = new DB;
		$jsonReader = new JsonReaderMock;		

		foreach ($jsonReader->get() as $email)
		{
			$mail = new MailMock;

			$db->email = $email['address'];
			
			if (!$mail->send())
			{
				$db->errorInfo = $mail->ErrorInfo;
			}	
			else 
			{
				$db->sent = 1;
			}
		
			$this->assertTrue($db->save());
		}	
	}
	
}