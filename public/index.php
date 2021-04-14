<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\AppController;
use app\controllers\Authcontroller;
use app\core\Application;

$app = new Application(dirname(__DIR__));

$app->router->get('/', [AppController::class, '_render_home']);

$app->router->get('/contact', [AppController::class, '_render_contact']);

$app->router->post('/contact', [AppController::class, '_wrangle_contact']);

$app->router->get('/login', [Authcontroller::class, 'login']);
$app->router->get('/signup', [Authcontroller::class, 'signup']);

$app->router->post('/login', [Authcontroller::class, 'login']);
$app->router->post('/signup', [Authcontroller::class, 'signup']);

$app->run();