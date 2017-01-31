<?php

/**
 * Created by PhpStorm.
 * User: Anxhelo
 * Date: 1/17/2017
 * Time: 8:58 AM
 */
class MultipleImplementationContainer extends Container
{
    private $dependencies;
    private $interfaceUses;

    public function __construct()
    {
        parent::__construct();
        $this->dependencies = array();
    }

    public function addImpl($interface, $class)
    {
        //array qe mban varesite eshte multidimensional per te lejuar me shume se 1 implementim per nje klase
        array_push($this->dependencies[$interface], $class);

    }

    public function getInstance($class)
    {

        $c = new ReflectionClass($class);

        $dep = [];

        foreach ($c->getConstructor()->getParameters() as $p) {
            $interfaceName = $p->getClass()->name;


            if (!isset($this->dependencies[$interfaceName])) {
                throw new Exception("The implementation for interface {$interfaceName} has not been defined.");
            } else if (!class_exists($this->dependencies[$interfaceName])) {
                throw new Exception("Class {$this->dependencies[$interfaceName]} does not exist.");
            } else {
                foreach ($this->dependencies[$interfaceName] as $cls) {
                    if ($cls == $class) {

                        if (key_exists("MovieFinder", $this->interfaceUses)) {
                            $this->interfaceUses["MovieFinder"]++;
                        } else {
                            $this->interfaceUses["MovieFinder"] = 1;
                        }
                        if ($interfaceName == "MovieFinder" && count($this->dependencies[$interfaceName]) > 2){
                            $dep[$cls] = new TextMovieFinder();
                        }
                        else {
                            $dep[$cls] = new $cls();
                        }
                    }

                }
            }
        }

        $instance = $c->newInstanceArgs($dep);

        return $instance;
    }
}