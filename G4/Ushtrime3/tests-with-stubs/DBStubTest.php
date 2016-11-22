<?php

require '../DB.php';
require '../JsonReader.php';
require '../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
require '../vendor/phpunit/phpunit/src/ForwardCompatibility/TestCase.php';

use \PHPUnit\Framework\TestCase;

class DBStubTest extends TestCase {
	
	/**
	 * Tests if the email info has been saved into database.
	 */	
	public function testSave()
	{
		//Create a stub for JsonReader class and return an array for "get" method
		//to simulate the decoding and returning a PHP array
        $jsonReaderStub = $this->getMock(JsonReader::class);

		$jsonReaderStub->expects($this->any())
						->method('get')
						->will($this->returnValue([
							[
								"address" => "aurel.zefi@fshnstudent.info",
								"subject" => "Hi Aurel!",
								"body" => "This is a test email from G4."					
							]			
						]));
				
		//Create a stub for PHPMailer class and return true from "send" method
		//to simulate a successful email sending
        $mailStub = $this->getMock(PHPMailer::class);

		$mailStub->expects($this->any())
					->method('send')
					->will($this->returnValue(true));

		//Test the DB class with the other classes simulated
		$db = new DB;
		
		foreach ($jsonReaderStub->get() as $email)
		{
			$db->email = $email['address'];
			
			if (!$mailStub->send())
			{
				$db->errorInfo = $mailStub->ErrorInfo;
			}	
			else 
			{
				$db->sent = 1;
			}
		
			$this->assertTrue($db->save());
		}
	}	
	
}