<?php

class Container {


    private $dependencies;
    private $interfaceUses;

    public function __construct()
    {
        $this->dependencies = [];

    }
    
    public function addImpl($interface, $class)
    {
        $this->dependencies[$interface] = $class;


    }
    
    public function getInstance($class)
    {
        
        $c = new ReflectionClass($class);
        
        $dep = [];
        
        foreach ($c->getConstructor()->getParameters() as $p)
        {
            $interfaceName = $p->getClass()->name;
            
            
            if (!isset($this->dependencies[$interfaceName]))
            {
                throw new Exception("The implementation for interface {$interfaceName} has not been defined.");
            }
            else if (!class_exists($this->dependencies[$interfaceName]))
            {
                throw new Exception("Class {$this->dependencies[$interfaceName]} does not exist.");
            }
            else 
            {
                $dep[$interfaceName] = new $this->dependencies[$interfaceName]();
            }
        }
        
        $instance = $c->newInstanceArgs($dep);
        
        return $instance;
    }
    
}