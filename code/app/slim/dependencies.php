<?php

$container = $app->getContainer();

$container->set('my_service', function ($c) {
        return 'My service in action, ';
});

$container->set('settings', function ($d) {
    return include 'config.php';
});

$container->set('view', function () {
    return new \Slim\Views\PhpRenderer(__DIR__ . '/views/', [
        'baseUrl' => '/slim/'
    ]);
});
