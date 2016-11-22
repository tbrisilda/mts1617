<?php
require 'testEmail.php';
$test_mail = new TestEmail();
echo("Test sending email from toskapasho@gmail.com to pasho.toska@fshnstudent.info <br>");
echo('---- '.$test_mail->sendMail());

?>