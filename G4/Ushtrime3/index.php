<?php

require 'DB.php';
require 'JsonReader.php';
require 'vendor/autoload.php';

$db = new DB;
$jsonReader = new JsonReader;

$jsonReader->read('info.json');

foreach ($jsonReader->get() as $email)
{
	$mail = new PHPMailer;

	$mail->Username = '9c14cc1a02a818';               
	$mail->Password = '1ff71b91278aa1';                                                                          
	$mail->setFrom('aurelzefi1994@gmail.com', 'Aurel Zefi');

	$mail->addAddress($email['address']); 
	$mail->Subject = $email['subject'];
	$mail->Body = $email['body'];	
	
	$db->email = $email['address'];
	
	if(!$mail->send()) 
	{
		echo $mail->ErrorInfo;
		
		$db->errorInfo = $mail->ErrorInfo;
	} 
	else 
	{
		$db->sent = 1;
	}

	$db->save();	
}