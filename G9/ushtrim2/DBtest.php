<?php

require_once 'DB.php';
require_once 'Config.php';
class DBtest extends PHPUnit_Framework_TestCase
{
    public function setUp(){ }
    public function tearDown(){ }

    public function testLogError()
    {
        $db = new DB(new Config());

        $this->assertTrue(true === $db->logError('anxhelosako@gmail.com'));
        $this->assertTrue(false === $db->logError('anxhelosako'));
        $this->assertTrue(true === $db->logSuccess('anxhelosako@gmail.com'));
        $this->assertTrue(false === $db->logSuccess('anxhelosako'));
        $this->assertTrue(true === $db->log('anxhelosako@gmail.com', 'ERROR'));
        $this->assertTrue(true === $db->log('anxhelosako@gmail.com', 'SUCCESS'));
        $this->assertTrue(false === $db->log('anxhelosako@gmail.com', 'sdf'));
    }
}