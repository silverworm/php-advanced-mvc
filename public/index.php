<?php



ini_set('display_errors', '1');

include '../vendor/autoload.php';

use core\Application;

$app = new Application();
$app->run();