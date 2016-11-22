<?php
	require 'testDb.php';
	$testDb = new TestDb();

	echo("Testo lidhjen me databazen: <br>");
	echo("---- ".$testDb->testConnection()."<br><br>");

	echo("Testimi i krijimit te tabeles test ne databaze: <br>");
	$sql ="CREATE TABLE IF NOT EXISTS `test` (`id` int(11) NOT NULL, `test` varchar(255) NOT NULL)";
	if($testDb->testQuery($sql))
		echo('----<span style="color:green"> Tabela test u krijua me sukses</span><br><br>');
	else
		echo('----<span style="color:red"> Tabela test nuk u krijua</span><br><br>');

	echo("Testimi shtimit te nje rreshti ne tabelen test: <br>");
	$sql ="INSERT into `test` (`id`, `test`) VALUES(1,'test')";
	if($testDb->testQuery($sql))
		echo('----<span style="color:green"> Shtimi i rreshtit ne tabelen test u be me sukses</span><br><br>');
	else
		echo('----<span style="color:red"> Shtimi i rreshtit ne tabelen test nuk u be me sukses</span><br><br>');

	echo("Testimi i modifikimit te rreshtit ne tabelen test <br>");
	$sql ="UPDATE `test` set test='test_updated'";
	if($testDb->testQuery($sql))
		echo('----<span style="color:green"> Modifikimi i rreshtit ne tabelen test u be me sukses</span><br><br>');
	else
		echo('----<span style="color:red"> Modifikimi i rreshtit ne tabelen test nuk u be me sukses</span><br><br>');
	
	echo("Testimi i fshirjes se rreshtit nga tabela test: <br>");
	$sql ="DELETE FROM `test` where id=1";
	if($testDb->testQuery($sql))
		echo('----<span style="color:green"> Fshirja e rreshtit ne tabelen test u be me sukses</span><br><br>');
	else
		echo('----<span style="color:red"> Fshirja e rreshtit ne tabelen test nuk u be me sukses</span><br><br>');

	echo("Testimi fshirjes se tabeles test: <br>");
	$sql ="DROP TABLE `test`";
	if($testDb->testQuery($sql))
		echo('----<span style="color:green"> Tabela test u fshi me sukses</span><br><br>');
	else
		echo('----<span style="color:red"> Tabela test nuk u fshi</span><br><br>');
	
	echo("Testimi i mbylljes se lidhjes me databazen: <br><br>");
	echo("---- ".$testDb->testCloseConnection()."<br><br>");
	
?>