<?php  
/**
* 
*/
require '../readFile.php';
class TestReadFile
{
	private $file;
	function __construct()
	{
		$this->file = new readFile('../emails.txt','r',';');
	}
	public function testOpenFile(){
		return $this->file->openFile();
	}
	public function testCloseFile(){
		return $this->file->closeFile();
	}
	public function testFileToAssocArray(){
		return $this->file->fileToAssocArray();
	}
}
?>