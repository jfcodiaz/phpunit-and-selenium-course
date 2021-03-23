<?php
use Slim\Factory\AppFactory;
use DI\Container;
require '../../vendor/autoload.php';
//$config = require '../../app/slim/config.php';

$container = new Container();
AppFactory::setContainer($container);

$app = AppFactory::create();
$app->setBasePath("/slim");
$app->addRoutingMiddleware();
$errorMiddleware = $app->addErrorMiddleware(true, true, true);
require '../../app/slim/dependencies.php';
require '../../app/slim/routes.php';
$app->run();

//require '../app/dependencies.php';
//
