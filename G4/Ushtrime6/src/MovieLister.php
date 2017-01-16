<?php

class MovieLister {
    
    private $movieFinder;
    private $displayer;
    
    public function __construct(MovieFinder $movieFinder, 
                                MovieFinder $movieFinder2, 
                                MovieFinder $movieFinder3, 
                                Displayer $displayer)
    {
        $this->movieFinder = $movieFinder;
        $this->movieFinder2 = $movieFinder2;
        $this->movieFinder3 = $movieFinder3;
        $this->displayer = $displayer;
    }
    
    public function test()
    {
        $this->displayer->display($this->movieFinder->getMovies());
    }
}