<?php

class Stiva
{
    public $stiva=[] ;
    
    public function push($vlere)
{
    return array_push ($this_stiva, $vlere);
}
    public function pop()
    {
    return array_pop($this_stiva);
    }
 public function top()
 {
     return end($this_stiva);
 }
}