<?php
require_once 'DB.php';
require_once 'CSV.php';
require_once 'Mailer.php';
class Mailertest extends PHPUnit_Framework_TestCase
{
    public function setUp(){ }
    public function tearDown(){ }

    public function testSendEmails()
    {
        $config = new Config();
        $csv = new CSV('mails.csv');
        $db = new DB($config);

        $mailer = new Mailer($db, $csv, $config);
        $this->assertTrue(false === true);
    }

}