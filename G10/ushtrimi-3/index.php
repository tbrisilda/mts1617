<?php  
require 'db.php';
require 'mailConfig.php';
require 'readFile.php';
$file = new readFile('emails.txt','r',';');
$file->openFile();
$data = $file->fileToAssocArray();
$file->closeFile();
$db = new DB('localhost','mts_usht3','mts','UD2uH4aPaFZpSfAc');
$db->connect();
foreach ($data as $key => $value) {
	$mail = new PHPMailer;
	$mail->isSMTP(); 
	$mail->Host = 'smtp.gmail.com';  
	$mail->SMTPAuth = true;   
	$mail->Username = $username;  
	$mail->Password = $pass;
	$mail->FromName = $user;
	$mail->SMTPSecure = 'tls'; 
	$mail->addAddress($value['email_address']); 
	$mail->addReplyTo($username, $user); 
	$mail->WordWrap = 50;  

	$mail->Subject = $value['subject'];
	$mail->Body    = $value['body'];

	if(!$mail->send()) {
		$msg ='Mesazhi nuk u dergua. Mailer Error: ' . $mail->ErrorInfo;
		echo $msg.'<br>';

	} else {
		$msg ='Mesazhi u dergua me sukses ';
		echo $msg.'<br>';
	}
	$sql ="INSERT INTO send_email(reciever,subject,body,message) VALUES('".$value['email_address']."','".$value['subject']."','".$value['body']."','".$msg."')";
	if($db->query($sql))
		echo "Te dhenat u rregjistruan ne database";
	else{
		echo "Te dhenat nuk u rregjistruan ne database";
	}
}
$db->closeConnection();
?>