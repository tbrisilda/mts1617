<?php

require '../mocks/DBMock.php';
require '../mocks/JsonReaderMock.php';
require '../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
require '../vendor/phpunit/phpunit/src/ForwardCompatibility/TestCase.php';

use PHPUnit\Framework\TestCase;

class MailTest extends TestCase {
	
	/**
	 * Tests if the email is sent.
	 */
	public function testSend()
	{
		$db = new DBMock;		
		$jsonReader = new JsonReaderMock;		
		
		foreach ($jsonReader->get() as $email)
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
				$db->errorInfo = $mail->ErrorInfo;
			} 
			else 
			{
				$db->sent = 1;
			}

			$db->save();

			$this->assertTrue($mail->send());			
		}	
	}
	
}