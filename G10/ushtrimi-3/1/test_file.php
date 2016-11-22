<?php  
	require 'testReadFile.php';
	$test_read = new TestReadFile();
	echo("Testo hapjen e fajlit: <br>");
	echo("---- ".$test_read->testOpenFile()."<br><br>");


	echo("Testo marrjen e te dhenave te fajlit: <br>");
	echo("---- ".json_encode($test_read->testFileToAssocArray())."<br><br>");

	echo("Testo Mbylljen e fajlit: <br>");
	echo("---- ".$test_read->testCloseFile()."<br><br>");
?>