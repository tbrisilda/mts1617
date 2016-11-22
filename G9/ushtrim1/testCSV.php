<?php
require 'CSV.php';

$csv = new CSV('mails.csv');

if ([['anxhelosako@gmail.com','subjekt','test phpmailer']] == $csv->loadEmails())
{
    echo 'test passed';
}
else echo 'test failed';