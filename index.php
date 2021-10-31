<?php
require_once('vendor/autoload.php');

// // TEST VARRIABLES
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
// $dotenv->load();
// $db_host = $_SERVER['DB_HOST'];

// PRODUCTION VARIABLES
$db_host = getenv('DB_HOST');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOMEHERO API</title>
</head>
<body>
    <p>This server is connected to: <?php echo isset($db_host) ? $db_host : "No Connection established"; ?></p>
</body>
</html>