<?php
require_once 'DB.php';
require_once 'CSV.php';
require_once 'Config.php';
require_once 'Mailer.php';
class Mailertest extends PHPUnit_Framework_TestCase
{
    public function setUp(){ }
    public function tearDown(){ }

    public function testSendEmails()
    {
        $db = $this->getMockBuilder(DB::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->getMock();
      //  $db->method('logError')->willReturn(true);
      //  $db->method('logSuccess')->willReturn(true);
        $csv = $this->getMockBuilder(CSV::class)->disableOriginalConstructor()->getMock();

       // $csv->method('loadEmails')->willReturn([['anxhelosako@gmail.com','subjekt','test phpmailer'],['anxhelosako@gmail.com','subjekt','test phpmailer']]);
        $config = new Config();
        $mailer = new Mailer($db, $csv, $config);
        $this->assertTrue(true === $mailer->sendEmails());
    }

}