<?php

namespace app\core;

class Controller {

	public $layout = 'main';

	public function render($view, $crumbs = []) {
		return Application::$app->router->renderView($view, $crumbs);
	}

	public function socketView($layout) {
		$this->layout = $layout;
	}
}