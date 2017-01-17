<?php

class ChildContainer extends Container 
{   
    protected $used = [];
    protected $counter = [];
    
    public function addImpl($interface, $implementations)
    {
        $this->implementations[$interface] = $implementations['options'];

        $this->dependencies[$interface] = $implementations['use'];
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
                $dep[] = new $this->dependencies[$interfaceName]();

                $this->used[] = $this->dependencies[$interfaceName];

                $this->counter = array_count_values($this->used);  

                if ($this->counter[$this->dependencies[$interfaceName]] >= 2) {         
                    $key = array_search($this->dependencies[$interfaceName], $this->implementations[$interfaceName]);

                    unset($this->implementations[$interfaceName][$key]);

                    $this->dependencies[$interfaceName] = $this->implementations[$interfaceName][array_rand($this->implementations[$interfaceName])];
                }                                  
            }
        }

        $content = "";
        
        foreach ($this->counter as $key => $value) {
            $content .= $key . " - " . $value . " active instances\n";            
        }
        
        file_put_contents(__DIR__ . '/../notes.txt', $content);
        
        $instance = $c->newInstanceArgs($dep);
        
        return $instance;
    }   
}