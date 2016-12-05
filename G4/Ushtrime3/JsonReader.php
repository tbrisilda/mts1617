<?php

class JsonReader {

	/**
	 * Containts the file content.
	 *
	 * @var string
	 */	
	public $fileContent;

	/**
	 * Read the JSON file.
	 *
	 * @param  string  $fileName
	 * @return void
	 */	
	public function read($fileName)
	{
		$this->fileContent = file_get_contents($fileName);
	}

	/**
	 * Get the decoded JSON file as a PHP associative array.
	 *
	 * @return array
	 */		
	public function get()
	{
		return json_decode($this->fileContent, true);
	}

}