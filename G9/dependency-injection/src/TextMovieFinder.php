<?php


class TextMovieFinder implements MovieFinder {

    public function __construct()
    {
        $file = fopen("MovieFinderUses.txt", "r");
        $count = fgets($file);
        $count++;
        $file = fopen("visits", "w");
        fputs($file, $count);
        fclose($file);
    }

    public function getMovies()
    {
        return file(__DIR__ . "/../data/movies.txt");
    }

    
}

