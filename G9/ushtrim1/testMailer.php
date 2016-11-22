<?php
//
require_once 'vendor/autoload.php';
require_once 'Mailer.php';
require_once 'SimDb.php';
require_once 'SimCSV.php';
require_once 'Config.php';



$config = new Config();
$csv = new CSV('mails.csv');
$db = new DB($config);

$mailer = new Mailer($db, $csv, $config);
$mailer->sendEmails();