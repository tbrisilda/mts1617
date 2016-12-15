<?php
require '../vendor/autoload.php';
class ToodledoTest extends PHPUnit_Framework_TestCase
{
    protected $driver;
    protected $session;

    protected function setUp()
    {
        
        //You can get the key and secret here: https://testingbot.com/members/user/edit
        $key = '89051498897c8c845169d41e6e02958e';
        $secret = '7bb546510e8762f4889dbe109d1e7c61';
        
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
        
        $page->fillField("email", "g10.mts1617@bobmail.com");
        $page->fillField("pass1", "mts1617");
        $page->fillField("pass2", "mts1617");
        $page->find('css', '#terms')->check();
        $page->find("css", "#register")->click();
        
        $this->assertTrue($this->session->getPage()->hasContent('g10.mts1617'));
    }
    
    public function testAdd()
    {
        $this->session->visit("https://www.toodledo.com/signin.php");
        $page = $this->session->getPage();
        $page->fillField("email", "g10.mts1617@bobmail.com");
        $page->fillField("pass", "mts1617");
        $page->find("css", "form")->submit();

        $this->session->visit("https://www.toodledo.com/tasks/index.php");
       
        $this->session->getPage()->pressButton('nav_add');
        
        $this->session->getPage()->fillField("title", "test-task");
        
        $this->session->getPage()->find('css', 'form#formAddTask')->submit();
        
        $this->session->visit("https://www.toodledo.com/tasks/index.php");
        
        $this->assertTrue($this->session->getPage()->hasContent('test-task'));
    }
    function testFolderAndTaskInFolde(){
        $this->session->visit("https://www.toodledo.com/signin.php");
        $page = $this->session->getPage();
        $page->fillField("email", "g10.mts1617@bobmail.com");
        $page->fillField("pass", "mts1617");
        $page->find("css", "form")->submit();

        $this->session->visit("https://www.toodledo.com/organize/folders.php");
        $this->session->getPage()->fillField('newfolder', 'G10');
        $this->session->getPage()->find('css', '#contextlist > table > tbody > tr > td > form')->submit();
        $this->session->visit("https://www.toodledo.com/organize/folders.php");
        
        $this->assertTrue($this->session->getPage()->hasContent('Remove'));
        
        $this->session->visit("https://www.toodledo.com/tasks/index.php");
       
        $this->session->getPage()->pressButton('nav_add');
        
        $this->session->getPage()->fillField("title", "G10");
        $select = $this->session->getPage()->find('css', '#fold');
        $options = $select->findAll('css', 'option');
        $secondOption = $options[1];
        $this->session->getDriver()->selectOption(
            $select->getXpath(),
            $secondOption->getValue()
        );
        $this->session->getPage()->fillField("addnote", "Duhet dorezuar ne daten 15 dhjetor ne github");
       
        $this->session->getPage()->find('css', 'form#formAddTask')->submit();
        
        $this->session->visit("https://www.toodledo.com/tasks/index.php");
        
        $this->assertTrue($this->session->getPage()->hasContent('G10')); 
        $this->session->getPage()->find('css', '.not.minico.note.ico_active')->click();
        
        $this->assertTrue($this->session->getPage()->hasContent('Duhet dorezuar ne daten 15 dhjetor ne github'));

    }
    public function tearDown()
    {
        $this->session->reset();
        $this->session->stop();
    }
    
}