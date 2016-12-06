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
        $mails = [];
        $f = fopen($this->filename, 'r');
        while ($mail = fgetcsv($f, 20000, ',')) {
            $mails[] = $mail;
        }
        return $mails;
    }
}