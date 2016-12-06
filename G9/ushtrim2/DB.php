<?php


class DB extends PDO
{

    const dsn = 'mysql:dbname=mails;host=localhost';

    function __construct(Config $c)
    {
        $config = $c->loadConfig();
        parent::__construct(DB::dsn, $config['database']['username'], $config['database']['password']);
    }

    public function log($to, $status)
    {
        if (!filter_var($to,FILTER_VALIDATE_EMAIL))
        {
            return false;
        }
        if (!in_array($status,['ERROR', 'SUCCESS'])){
            return false;
        }
        try {
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function logError($to)
    {

        if ($this->log($to, 'ERROR')) {
            return true;
        }
        return false;
    }

    public function logSuccess($to)
    {
        if ($this->log($to, 'SUCCESS'))
            return true;
        return false;
    }
}