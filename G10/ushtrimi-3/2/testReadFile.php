<?php  
/**
* 
*/
require '../readFile.php';
class TestReadFile extends PHPUnit_Framework_TestCase
{
	public function setUp(){ }
	  
	public function tearDown(){ }

	private $file;
	function __construct()
	{
		$this->file = new readFile('../emails.txt','r',';');
	}
	public function testOpenFile(){
		$this->assertTrue($this->file->openFile());
	}
	public function testCloseFile(){
		$this->assertTrue($this->file->closeFile())
	}
	public function testFileToAssocArray(){
		$this->assertArrayEquals($this->file->fileToAssocArray());
	}
}
?>