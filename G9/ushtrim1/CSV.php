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
        $f = fopen('mails.csv', 'r');
        while ($mail = fgetcsv($f, 20000, ',')) {
            $mails[] = $mail;
        }
        return $mails;
    }
}