<?php

class ToodledoTest extends PHPUnit_Framework_TestCase
{
    protected $driver;
    protected $session;

    protected function setUp()
    {
        
        //You can get the key and secret here: https://testingbot.com/members/user/edit
        $key = '';
        $secret = '';
        
        $testingBotApiUrl = "http://{$key}:{$secret}@hub.testingbot.com/wd/hub";
        
        $this->driver = new \Behat\Mink\Driver\Selenium2Driver('chrome',
            array("platform"=>"WINDOWS", "browserName"=>"chrome", "name" => "BehatTest"), $testingBotApiUrl);
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
        
        $this->session->getPage()->fillField("title", "test-task");
        
        $this->session->getPage()->find('css', 'form#formAddTask')->submit();
        
        $this->session->visit("https://www.toodledo.com/tasks/index.php");
        
        $this->assertTrue($this->session->getPage()->hasContent('test-task'));
    }
	
	public function testAddNote()
    {
        $this->session->visit("https://www.toodledo.com/signin.php");
        $page = $this->session->getPage();
        $page->fillField("email", "test.mts1617@bobmail.com");
        $page->fillField("pass", "mts1617");
        $page->find("css", "form")->submit();

        $this->session->visit("https://www.toodledo.com/tasks/index.php");
        $this->session->getPage()->findById('addnote123143629')->click();
        $element = $this->session->getPage()->findById('eton123143629');

        $element->setValue('test-note');

        $this->session->getPage()->findById('bot_len_sum')->click();

        $this->session->visit('https://www.toodledo.com/tasks/index.php');

        $text = $this->session->getPage()->findById('note123143629')->getText();
        $this->assertEquals($text, 'test-note');
	}
    
    public function tearDown()
    {
        $this->session->reset();
        $this->session->stop();
    }
    
}