<?php

require 'vendor/autoload.php';

$c = new Container();

$c->addImpl("MovieFinder", "TextMovieFinder");

$c->addImpl("Displayer", "FirstDisplayer");

$ml = $c->getInstance("MovieLister");

$ml->test();