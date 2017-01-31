<?php

class JsonMovieFinder implements MovieFinder {

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
        return json_decode(file_get_contents(__DIR__ . "/../data/movies.json"));
    }
}