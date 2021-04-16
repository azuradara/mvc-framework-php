<?php

use app\controllers\AppController;
use app\controllers\AuthController;
use app\core\Application;

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
	'db' => [
		'dsn' => $_ENV['DB_DSN'],
		'user' => $_ENV['DB_USER'],
		'pwd' => $_ENV['DB_PWD'],
	]
];

$app = new Application(dirname(__DIR__), $config);

$app->router->get('/', [AppController::class, '_render_home']);

$app->router->get('/contact', [AppController::class, '_render_contact']);

$app->router->post('/contact', [AppController::class, '_wrangle_contact']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->get('/signup', [AuthController::class, 'signup']);

$app->router->post('/login', [AuthController::class, 'login']);
$app->router->post('/signup', [AuthController::class, 'signup']);

$app->run();
