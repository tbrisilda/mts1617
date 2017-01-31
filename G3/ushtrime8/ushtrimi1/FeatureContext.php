<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Tester\Exception\PendingException;


/**
 * Defines application features from the specific context.
 */
class Stiva
{

    public $stiva=[] ;
    
    public function push($vlere)
{
    return array_unshift ($this->stiva, $vlere);
}
    public function pop()
    {
    return array_shift($this->stiva);
    }
 public function top()
 {
     return current($this->stiva);
 }
}

class FeatureContext extends PHPUnit_Framework_TestCase implements Context

{
   
  protected $stiva;
  
public function __construct() {
        $this->stiva =  array();
    }
    /**
     * @Given Na jepet stiva
     */
    public function naJepetStiva(TableNode $table)
    {
       $this->stiva= new stiva();
    }

    /**
     * @When heq elemente nga stiva
     */
    public function heqElementeNgaStiva()
    {
     $this->stiva->pop();
    
    }

    /**
     * @Then :arg1 nuk duhet te jete ne stive
     */
    public function nukDuhetTeJeteNeStive($arg1)
    {
       PHPUnit_Framework_TestCase::assertNotContains($arg1,$this->stiva->stiva);
    }

    /**
     * @When shtoj :arg1
     */
    public function shtoj($arg1)
    {
      $this->stiva->push($arg1);  
    }

    /**
     * @Then :arg1 duhet te jete ne stive
     */
    public function duhetTeJeteNeStive($arg1)
    {
       PHPUnit_Framework_TestCase::assertContains($arg1,$this->stiva->stiva);
    }

    /**
     * @When Kap elementin e fillimit
     */
    public function kapElementinEFillimit()
    {
       $this->stiva->top();
    }

    /**
     * @Then duhet te kem :arg1
     */
    public function duhetTeKem($arg1)
    {
         PHPUnit_Framework_TestCase:: assertEquals($arg1, $this->stiva->top());
    }

   
}





 