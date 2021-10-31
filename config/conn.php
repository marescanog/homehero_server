<?php 

// var_dump(dirname(__FILE__));

// NOTE: When testing for local, comment out the production database code. 

// require_once(dirname(__FILE__).'/./config.php');

// // DEVELOPMENT VARIABLES
// $conn_host = 'localhost';
// $conn_db = 'homehero';
// $conn_user = 'root';
// $conn_pass = '';
// $conn_charset = 'utf8mb4';
// $conn_dsn = "mysql:host=$conn_host;dbname=$conn_db;charset=$conn_charset";

try{
    // // LOCAL DATABASE, DEVELOPMENT  DATABASE CONNECTION
    // $conn = new PDO($dsn, $user, $pass);

    // PRODUCTION DATABASE CONNECTION
    $conn = new PDO("mysql:host=".$_ENV['DB_HOST'].";dbname=".$_ENV['DB_NAME'].";charset=utf8mb4", $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e){
    echo "Database Connection Error, please check your connection file.";
    // throw new PDOException($e->getMessage());
}