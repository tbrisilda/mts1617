<?php
require '../phpmailer/PHPMailerAutoload.php';
require '../mailConfig.php';
class TestEmail
{
	public function sendMail(){
		global $username,$user,$pass;
		$mail = new PHPMailer;
		$mail->isSMTP(); 
		$mail->Host = 'smtp.gmail.com';  
		$mail->SMTPAuth = true;   
		$mail->Username = $username;  
		$mail->Password = $pass;
		$mail->FromName = $user;
		$mail->SMTPSecure = 'tls'; 
		$mail->addAddress('pasho.toska@fshnstudent.info'); 
		$mail->addReplyTo($username, $user); 
		$mail->WordWrap = 50;     

		$mail->Subject = 'Test';
		$mail->Body    = 'Test mail body';

		if(!$mail->send()) {
		    return '<span style="color:red;">Mesazhi nuk u dergua. Mailer Error: ' . $mail->ErrorInfo." </span>";
		} else {
		    return '<span style="color:green;">Mesazhi u dergua me sukses</span>';
		}
	}
}
?>