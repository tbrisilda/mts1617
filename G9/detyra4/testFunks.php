<?php

require_once 'function.php';


class testFunks extends PHPUnit_Framework_TestCase
{
    // ...

    public function testFuncsKlasaEkuivalence()
    {

        $this->assertTrue(true, funks(rand(1,100), array_rand(['anxhelo' ,'alesio' ,'ardit' ,'donald'])));
        $this->assertFalse(false, funks(rand(101,PHP_INT_MAX), array_rand(['anxhelo' ,'alesio' ,'ardit' ,'donald'])));
        $this->assertFalse(false, funks(rand(-99999,0), array_rand(['anxhelo','ardit', 'alesio','ardit'])));
        $this->assertFalse(false, funks(rand(1,000), 'asdasds'));
    }

    public function testFunksVleraKufi()
    {
        $this->assertFalse(false, funks(0, array_rand(['anxhelo' ,'alesio' ,'ardit' ,'donald'])));
        $this->assertFalse(false, funks(101, array_rand(['anxhelo' ,'alesio' ,'ardit' ,'donald'])));
        $this->assertTrue(true, funks(1, array_rand(['anxhelo' ,'alesio' ,'ardit' ,'donald'])));
        $this->assertTrue(true, funks(100, array_rand(['anxhelo' ,'alesio' ,'ardit' ,'donald'])));

    }

}