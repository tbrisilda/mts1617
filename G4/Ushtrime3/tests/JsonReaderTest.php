<?php

require '../JsonReader.php';
require '../vendor/phpunit/phpunit/src/ForwardCompatibility/TestCase.php';

use PHPUnit\Framework\TestCase;

class JsonReaderTest extends TestCase {

	/**
	 * Tests if the JSON file has been read.
	 */
	public function testRead()
	{
        $jsonReader = new JsonReader;
		
		$jsonReader->read('../info.json');

		$this->assertJsonStringEqualsJsonFile(
			'../info.json', $jsonReader->fileContent
		);		
	}

	/**
	 * Tests if the JSON file has been decoded into a PHP array.
	 */	
	public function testGet()
	{
		$jsonReader = new JsonReader;
		
		$jsonReader->read('../info.json');
		
        $this->assertEquals($jsonReader->get(), [
			[
				"address" => "aurel.zefi@fshnstudent.info",
				"subject" => "Hi Aurel!",
				"body" => "This is a test email from G4."					
			],		
			[
				"address" => "alisa.cala@fshnstudent.info",
				"subject" => "Hi Alisa!",
				"body" => "This is a test email from G4."					
			],
			[
				"address" => "mikela.hallaci@fshnstudent.info",
				"subject" => "Hi Mikela!",
				"body" => "This is a test email from G4."					
			]			
		]);
	} 
	
}