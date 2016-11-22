<?php

require '../DB.php';
require '../JsonReader.php';
require '../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
require '../vendor/phpunit/phpunit/src/ForwardCompatibility/TestCase.php';

use PHPUnit\Framework\TestCase;

class MailStubTest extends TestCase {
	
	/**
	 * Tests if the email is sent.
	 */
	public function testSend()
	{
		//Create a stub for JsonReader class and return an array for "get" method
		//to simulate the decoding of JSON file and returning a PHP array.
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

		//Create a stub for DB class and return true from "save" method
		//to simulate the saving of array information into database.
        $dbStub = $this->getMock(DB::class);

		$dbStub->expects($this->any())
					->method('save')
					->will($this->returnValue(true));						
		
		//Test the PHPMailer class with the other classes simulated.
		foreach ($jsonReaderStub->get() as $email)
		{		
			$mail = new PHPMailer;
			
			$mail->Username = '9c14cc1a02a818';               
			$mail->Password = '1ff71b91278aa1';                                                                          
			$mail->setFrom('aurelzefi1994@gmail.com', 'Aurel Zefi');

			$mail->addAddress($email['address']); 
			$mail->Subject = $email['subject'];
			$mail->Body = $email['body'];
			
			if(!$mail->send()) 
			{
				$dbStub->errorInfo = $mail->ErrorInfo;
			} 
			else 
			{
				$dbStub->sent = 1;
			}

			$dbStub->save();

			$this->assertTrue($mail->send());			
		}	
	}	
	
}