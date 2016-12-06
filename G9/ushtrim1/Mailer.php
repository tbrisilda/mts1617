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
        

        try {
            $emails = $this->csv->loadEmails();
            if ($emails) {
                foreach ($emails as $e) {
                    if (!$this->send()) {
                        $this->db->logError($e[0]);
                        echo 'error to ', $e[0], "\n";
                    } else {
                        $this->db->logSuccess($e[0]);
                        echo 'Success to ', $e[0], "\n";
                    }

                }

                return true;
            }
            else return false;
        }
        catch (Exception $e)
        {
            return false;
        }
    }

}