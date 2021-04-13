<?php

// @package app\core

namespace app\core;

class Router {
	public string $layout = 'main';
	public Request $req;
	public Response $res;
	protected array $routes = [];

	public function __construct(Request $req, Response $res) {
		$this->req = $req;
		$this->res = $res;
	}

	public function get($path, $callback) {
		$this->routes['get'][$path] = $callback;
	}

	public function post($path, $callback) {
		$this->routes['post'][$path] = $callback;
	}

	public function resolve() {
		$path = $this->req->getPath();
		$method = $this->req->method();
		$callback = $this->routes[$method][$path] ?? false;

		if($callback === false) {
			$this->res->setStatusCode(404);
			return  $this->renderView('_404');
		}

		if (is_string($callback)) {
			return $this->renderView($callback);
		}

		if (is_array($callback)) {
			Application::$app->controller = new $callback[0]();
			$callback[0] = Application::$app->controller;
		}

		return call_user_func($callback, $this->req);
	}

	public function renderView ($view, $crumbs = []){
		$layoutContent = $this->layoutContent();
		$viewContent = $this->renderViewContent($view, $crumbs);
		
		return str_replace('{{content}}', $viewContent, $layoutContent);
	}

	public function renderContent ($content){
		$layoutContent = $this->layoutContent();
		
		return str_replace('{{content}}', $content, $layoutContent);
	}

	protected function layoutContent(){
		$layout = Application::$app->controller->layout;
		
		ob_start();
		
		include_once Application::$ROOT_DIR."/views/layouts/_$layout.php";

		return ob_get_clean();
	}

	protected function renderViewContent($view, $crumbs) {
		foreach ($crumbs as $k => $val) {
			// if $k evals as name, $$k evans as var name
			$$k = $val;
		}

		ob_start();
		include_once Application::$ROOT_DIR."/views/$view.php";
		
		return ob_get_clean();
	}
}