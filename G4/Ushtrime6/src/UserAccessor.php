<?php

class UserAccessor
{
    protected $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function get()
    {
        foreach ($this->users->get() as $user) {
            echo $user . '<br>';
        }
    }
}