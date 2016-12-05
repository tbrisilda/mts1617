<?php

require_once 'CSV.php';
require_once 'Config.php';

class CSVTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
    }

    public function tearDown()
    {
    }

    public function testLoadEmails()
    {
        
        $csv = new CSV('mails.csv');
        //1 email kemi ne csv
        $this->assertTrue(count($csv->loadEmails()) === 2);
        //emailet ne csv perbehen nga 3 pjese
        $this->assertTrue(count($csv->loadEmails()[0]) === 3);
        $this->assertTrue('anxhelosako@gmail.com' === filter_var($csv->loadEmails()[0][0], FILTER_VALIDATE_EMAIL));
        $csv = new CSV('nofile');
        $this->assertTrue([]=== $csv->loadEmails());
        $this->assertTrue(0 === count($csv->loadEmails()));
    }
}