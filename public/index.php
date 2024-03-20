<?php

use App\Routes\Router;

require dirname(__DIR__)."/vendor/autoload.php";
session_start();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..'); // Chemin vers la racine
$dotenv->load();

Router::run();