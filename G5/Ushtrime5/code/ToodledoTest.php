<?php

class ToodledoTest extends PHPUnit_Framework_TestCase
{
    protected $driver;
    protected $session;

    protected function setUp()
    {
        
        //You can get the key and secret here: https://testingbot.com/members/user/edit
        $key = '0cfa25002080f5710823f0d21cc347a9';
        $secret = '731d22678b864342aa2bcab3a112e064';
        
        $testingBotApiUrl = "http://{$key}:{$secret}@hub.testingbot.com/wd/hub";
        
        $this->driver = new \Behat\Mink\Driver\Selenium2Driver('chrome',
            array("platform"=>"WINDOWS", "browserName"=>"chrome", "name" => "G5-Test"), $testingBotApiUrl);
        $this->session = new \Behat\Mink\Session($this->driver);
        $this->session->start();
    }
    
    public function testLogin()
    {
        $this->session->visit("https://www.toodledo.com/signin.php");
        $page = $this->session->getPage();
        $page->fillField("email", "ermir.hoxhaj@fshnstudent.info");
        $page->fillField("pass", "ermirtik");
        $page->find("css", "form")->submit();

        $this->session->visit("https://www.toodledo.com/tasks/index.php");
        
        $page->find('css', '.bread_label')->click();
       
        $this->session->getPage()->find('css', 'a.select-foot')->click();
        
        $page = $this->session->getPage();
        
        $this->session->getPage()->find('css', 'a.orangebutton')->click();
        
        $this->assertTrue($this->session->getPage()->hasContent('Toodledo Productivity System'));
    }
    
    public function tearDown()
    {
        $this->session->reset();
        $this->session->stop();
    }
    
}