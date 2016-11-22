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

        $this->isSMTP();
        $this->SMTPDebug = 0;
        $this->SMTPAuth = true;
        $this->SMTPSecure = 'tls';
        $this->Host = "smtp.gmail.com";
        $this->Port = 587; // or 587
        $this->isHTML(true);
        $this->Username = $this->config['email']['email'];
        $this->Password = $this->config['email']['pass'];
        $this->setFrom("anxhelosako@gmail.com");

        try {
            $emails = $this->csv->loadEmails();

            foreach ($emails as $e) {

                $this->clearAllRecipients();
                $this->addAddress($e[0]);
                $this->Subject = $e[1];
                $this->Body = $e[2];

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
        catch (Exception $e)
        {
            return false;
        }
    }

}