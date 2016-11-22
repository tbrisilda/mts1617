<?php

class DBMock {
	
	/**
	 * Mock the creation of database connection.
	 *
	 * @return bool
	 */	
	public function __construct()
	{
		return true;		
	}
	
	/**
	 * Mock the saving of email information.
	 *
	 * @return bool
	 */		
	public function save()
	{
		return true;
	}	
	
}