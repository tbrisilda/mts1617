<?php

class FirstUserRepository implements UserRepository
{
    protected $users;

    public function __construct()
    {
        $this->users = ['User1', 'User2', 'User3'];
    }

    public function get()
    {
        return $this->users;
    }
}