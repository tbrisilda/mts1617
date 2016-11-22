<?php

class JsonReaderMock {	

	/**
	 * Contains the mocked file content.
	 *
	 * @var string
	 */
	public $fileContent;
	
	/**
	 * Mock the reading of JSON file.
	 *
	 * @param  string  $fileName
	 * @return void
	 */	
	public function read()
	{
		$this->fileContent = '[
			{	
				"address": "aurel.zefi@fshnstudent.info",
				"subject": "Hi Aurel!",
				"body": "This is a test email from G4."
			}
		]';
	}

	/**
	 * Mock the decoding and returning of JSON file.
	 *
	 * @return array
	 */		
	public function get()
	{
		return [
			[
				'address' => 'aurel.zefi@fshnstudent.info', 
				'subject' => 'Hi Aurel!', 
				'body' => 'This is a test email from G4.'
			]
		];
	}
	
}