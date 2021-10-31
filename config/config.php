<?php

require_once('dirname(__FILE__)/'.$level.'/../vendor/autoload.php');

// UNCOMMENT THESE LINES IF DEVELOPMENT
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__."\\..\\");
$dotenv->load();

?>