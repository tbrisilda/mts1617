<?php

class MailMock {

	/**
	 * Contains the mocked error info.
	 *
	 * @var string
	 */	
	public $ErrorInfo = 'There has been an error.';
	
	/**
	 * Mock the sending of email.
	 *
	 * @return bool
	 */
	public function send()
	{
		return true;
	}
	
} 