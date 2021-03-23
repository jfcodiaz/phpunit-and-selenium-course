<?php

use App\slim\Controllers\CategoryController;
use App\slim\Controllers\FirstController;
use App\slim\Controllers\HomeController;

$app->get('/hello/{name}', FirstController::class . ':home');
$app->post('/hello/{name}', FirstController::class . ':home');
$app->get('/', HomeController::class . ':home');
$app->get('/delete-category', CategoryController::class . ':deleteCategory');
