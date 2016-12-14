<?php

require 'vendor/phpunit/phpunit/src/ForwardCompatibility/TestCase.php';
require 'function.php';

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    public function testHasX()
    {
		$this->assertArrayHasKey('xKey', f(10, 'Aurel'), 'xKey is not valid.');
    }
	
    public function testHasY()
    {
		$this->assertArrayHasKey('yKey', f(10, 'Aurel'), 'yKey is not valid.');
    }	 
}