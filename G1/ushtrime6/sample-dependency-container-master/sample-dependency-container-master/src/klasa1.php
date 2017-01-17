<?php
class Klasa1 implements VideoFinder {
    
    public function getVideos()
    {
        return file (file_get_contents(__DIR__ . "/../data/Videos.txt"));
    }
?>