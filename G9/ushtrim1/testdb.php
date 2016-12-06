<?php

require 'vendor/autoload.php';
require 'SimMailer.php';
require 'DB.php';
require 'SimCSV.php';
require 'Config.php';


$config = new Config();
$csv = new CSV('mails.csv');
$db = new DB($config);

$mailer = new Mailer($db, $csv, $config);
$mailer->sendEmails();

