<?php

// @package app\core

namespace app\core;

class Application {
	public static string $ROOT_DIR;
	public static Application $app;

	public Router $router;
	public Request $req;
	public Response $res;
	public Controller $controller;

	public function __construct($root) {
		self::$ROOT_DIR = $root;
		self::$app = $this;

		$this->req = new Request();
		$this->res = new Response();
		$this->router = new Router($this->req, $this->res);
	}

	public function run() {
		echo $this->router->resolve();
	}

	public function getController() {

	}

	public function setController() {
		
	}
}