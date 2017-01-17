<?php

class SecondUserRepository implements UserRepository
{
    protected $users;

    public function __construct()
    {
        $this->users = ['User4', 'User5', 'User6'];
    }

    public function get()
    {
        return $this->users;
    }
}