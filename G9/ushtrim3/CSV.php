<?php


class CSV
{
    protected $filename;

    function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function loadEmails()
    {
        try {
            $f = fopen($this->filename, 'r');
            return [['anxhelosako@gmail.com','subjekt','test phpmailer'],['anxhelosako@gmail.com','subjekt','test phpmailer']];
        }
        catch (Exception $e)
        {
            return [];
        }
    }
}
