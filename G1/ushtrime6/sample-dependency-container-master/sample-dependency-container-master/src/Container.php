<?php
class Container {
    
    private $dependencies;
	private $array;
    
    public function __construct()
    {
		
        $this->dependencies = [];
		$this->array = [];
		$array[0] = $JsonMovieFinder;
		$array[1] = $TextMovieFinder;
		
    }
	$c->addImpl($MovieFinder,$array[])
    { for($index=0;index<2;index++)
		
		{  $this->dependencies[$MovieFinder] = $array[index];
		
    }}
    
    public function addImpl($Interface,$klasat)
    { 
		
	 $this->klasat[$Interface] = $klasat[array[index]];
	 $this->dependencies[$Interface]=array[0];
		
    }
	
    
    public function getInstance($class)
    { $count=0;
	$varesite=[];
        
        {$c = new ReflectionClass($array[i]);}
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
				{this->varesite= $this->dependencies[$interfaceName];
				if($this->varesite==array[0])
				{$count++;
			if($count>=2)
			{ unset($this->klasat[array[0]]);
		$this->dependencies[$Interface]=array[1];
				
			}}}}
			$nraktive=0;
			$nraktive = $count;
			
			$file = fopen(C:\Users\USER\Desktop\instanca aktive.txt, "w");
			fwrite($file,$nraktive);
			fclose($file);
			
     
        $instance = $c->newInstanceArgs($dep);
		
	      
		return $instance;}
    
}
?>