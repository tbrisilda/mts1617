<?php

class ArsimiTest extends PHPUnit_Framework_TestCase
{
    protected $driver;
    protected $session;

    protected function setUp()
    {
        $this->driver = new \Behat\Mink\Driver\GoutteDriver();
        $this->session = new \Behat\Mink\Session($this->driver);
        $this->session->start();
    }
    
    public function testSearch()
    {
        $this->session->visit("http://arsimi.gov.al");
        $page = $this->session->getPage();
        
        $searchField = $page->findById('topSearchInput');
        
        if ($searchField)
        {
            $searchField->setValue("ligjet");
            $page->find("css", ".searchSubmit")->click();
            
            $page = $this->session->getPage();
            
            $this->assertTrue($page->hasContent("Arsimi i Lartë"));
            
            $page->find('css', '.titleDetalils a')->click();
            
            $page = $this->session->getPage();
            
            $this->assertEquals($page->find("css", ".detailesTitle h1")->getText(), "Arsimi i Lartë");
        }
    }
    
    public function testStruktura()
    {
        $this->session->visit("http://www.arsimi.gov.al/al/arsimi/universiteti");
        
        $this->assertTrue($this->session->getPage()->hasContent("Struktura e Vitit"));
        
        $this->session->getPage()->find("css", ".descPrioritati h2 a")->click();
        
        $this->assertTrue($this->session->getPage()->hasContent("PËR STRUKTURËN E VITIT AKADEMIK 2014"));
    }
    
    public function testStrukturaSporti()
    {
        $this->session->visit("http://www.arsimi.gov.al/al/sporti/legjislaconi");
        
        $this->assertTrue($this->session->getPage()->hasContent("Ligje"));
        
        $this->session->getPage()->find("css", ".descPrioritati h2 a")->click();
        
        $this->assertTrue($this->session->getPage()->hasContent("LIGJ Nr. 9376, datë 21.4.2005 PËR SPORTIN" ));
    }
    
    
    public function tearDown()
    {
        $this->session->stop();
    }
}