<?php

class ToodledoTest extends PHPUnit_Framework_TestCase
{
    protected $driver;
    protected $session;

    protected function setUp()
    {
        
        //You can get the key and secret here: https://testingbot.com/members/user/edit
        $key = '96c7a71005524f666a39eaafb7db7c1f';
        $secret = '8276ae937a2b675e210480d628798da1';
        
        $testingBotApiUrl = "http://{$key}:{$secret}@hub.testingbot.com/wd/hub";
        
        $this->driver = new \Behat\Mink\Driver\Selenium2Driver('chrome',
            array("platform"=>"WINDOWS", "browserName"=>"chrome", "name" => "Grupi 9"), $testingBotApiUrl);
        $this->session = new \Behat\Mink\Session($this->driver);
        $this->session->start();
    }

        protected function setUp()
    {
        $this->driver = new \Behat\Mink\Driver\GoutteDriver();
        $this->session = new \Behat\Mink\Session($this->driver);
        $this->session->start();
    }
    
    public function testSignup()
    {
        $this->session->visit("https://www.toodledo.com/signup.php");
        
        $page = $this->session->getPage();
        
        $page->fillField("email", "test.mts1617@bobmail.com");
        $page->fillField("pass1", "mts1617");
        $page->fillField("pass2", "mts1617");
        $page->find('css', '#terms')->check();
        $page->find("css", "#register")->click();
        
        $this->assertTrue($this->session->getPage()->hasContent('test.mts1617'));
    }
    
    public function testAdd()
    {
        $this->session->visit("https://www.toodledo.com/signin.php");
        $page = $this->session->getPage();
        $page->fillField("email", "test.mts1617@bobmail.com");
        $page->fillField("pass", "mts1617");
        $page->find("css", "form")->submit();

        $this->session->visit("https://www.toodledo.com/tasks/index.php");
       
        $this->session->getPage()->pressButton('nav_add');
        
        $this->session->getPage()->fillField("title", "Grupi-9");
        
        $this->session->getPage()->find('css', 'form#formAddTask')->submit();
        
        $this->session->visit("https://www.toodledo.com/tasks/index.php");
        
        $this->assertTrue($this->session->getPage()->hasContent('Grupi-9'));
    }
     public function testNotes()
    {
        $this->session->visit("https://www.toodledo.com/signin.php");
        $page = $this->session->getPage();
        $page->fillField("email", "test.mts1617@bobmail.com");
        $page->fillField("pass", "mts1617");
        $page->find("css", "form")->submit();

        $this->session->visit("https://www.toodledo.com/tasks/index.php");
    
        $this->session->getPage()->find('css', '.tn_switch_notes')->click();

        $this->assertTrue($this->session->getPage()->hasContent('Notes'));

        $this->session->getPage()->find('css', '.noteSection')->click();

        $this->session->getPage()->fillField("message", "Ky eshte nje note shembull i krijuar nga Grupi-9");

        $this->session->getPage()->find('css', '.edit-bar .sccs')->click();

    }
    
    
    public function tearDown()
    {
        $this->session->reset();
        $this->session->stop();
    }
    
}