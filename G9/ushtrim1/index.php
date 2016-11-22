<?php
require 'vendor/autoload.php';
require 'Mailer.php';
require 'DB.php';
require 'CSV.php';
require 'Config.php';



$config = new Config();
$csv = new CSV('mails.csv');
$db = new DB($config);

$mailer = new Mailer($db, $csv, $config);
$mailer->sendEmails();