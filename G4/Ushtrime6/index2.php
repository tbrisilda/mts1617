<?php

require 'vendor/autoload.php';

$c = new ChildContainer();

$c->addImpl("UserRepository", [
    'options' => [
        'FirstUserRepository', 
        'SecondUserRepository'
    ],
    'use' => 'FirstUserRepository',
]);

$userAccessor = $c->getInstance("UserAccessor");

$userAccessor->get();