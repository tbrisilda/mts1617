<?php

class FirstDisplayer implements Displayer {
    
    public function display($array)
    {
        foreach ($array as $row)
        {
            echo $row . "<br />\n";
        }
    }
    
}