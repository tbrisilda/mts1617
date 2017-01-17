<?php

class SecondDisplayer implements Displayer {
    
    public function display($array)
    {
        echo implode("----", $array);
    }
}