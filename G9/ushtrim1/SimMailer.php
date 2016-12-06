<?php


class Mailer extends PHPMailer
{
    protected $db;
    protected $csv;
    protected $config;


    function __construct(DB $db, CSV $csv, Config $c)
    {
        $this->db = $db;
        $this->csv = $csv;
        $this->config = $c->loadConfig();
        parent::__construct();
    }

    public function sendEmails()
    {

        if ($this->db->logSuccess('anxhelosako@gmail.com') && $this->db->logError('anxhelosako@gmail.com')) {
            return true;
        }
        return false;

    }

}