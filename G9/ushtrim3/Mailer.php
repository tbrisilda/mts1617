<?php

require_once 'DB.php';
class Mailer
{
    protected $db;
    protected $csv;
    protected $config;


    function __construct(DB $db, CSV $csv, Config $c)
    {
        $this->db = $db;
        $this->csv = $csv;
        $this->config = $c->loadConfig();
        
    }

    public function sendEmails()
    {
        return true;
        if ($this->db->logSuccess('anxhelosako@gmail.com') && $this->db->logError('anxhelosako@gmail.com')) {
            return true;
        }
        return false;

    }

}