<?php

use App\slim\Controllers\CategoryController;
use App\slim\Controllers\FirstController;
use App\slim\Controllers\HomeController;

$app->get('/hello/{name}', FirstController::class . ':home');
$app->post('/hello/{name}', FirstController::class . ':home');
$app->get('/', HomeController::class . ':home');
$app->get('/delete-category/{id}', CategoryController::class . ':deleteCategory');
$app->get('/show-category/{id}', CategoryController::class . ':showCategory');
$app->get('/edit-category/{id}', CategoryController::class . ':editCategory');
$app->post('/save-category', CategoryController::class . ':saveCategory');
