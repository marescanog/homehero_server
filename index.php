<?php
require_once('vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$db_host = $_SERVER['DB_HOST'];

var_dump($db_host);
