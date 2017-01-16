<?php

require 'vendor/autoload.php';

$c = new ChildContainer();

$c->addImpl("MovieFinder", [
    'options' => [
        'TextMovieFinder', 
        'JsonMovieFinder',
    ],
    'use' => 'TextMovieFinder',
]);

$c->addImpl("Displayer", [
    'options' => [
        'FirstDisplayer', 
        'SecondDisplayer'
    ],
    'use' => 'FirstDisplayer',
]);

$ml = $c->getInstance("MovieLister");

$ml->test();