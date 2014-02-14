<?php
define('ROOT', __DIR__.'/../');

require ROOT . 'vendor/autoload.php';

$app = new \Slim\Slim(
    require(ROOT . 'app/config.php')
);

require ROOT. "/app/functions.php";
require ROOT. "/app/routes.php";

$app->run();