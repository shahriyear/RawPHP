<?php
date_default_timezone_set('Asia/Dhaka');

require "Controllers/Controller.php";
require "Models/Database.php";

$config = require "resources/config/config.php";

$dsn = "mysql:host=" . $config['db_host'] . ";dbname=" . $config['db_name'] . ";charset=" . $config['db_charset'];

try {
    $pdo = new PDO($dsn, $config['db_user'], $config['db_password'], $config['db_options']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db = new Database($pdo);
    $controller = new Controller($db);
    $controller->index();
} catch (PDOException $exception) {
    echo "Connection error: " . $exception->getMessage();
}
