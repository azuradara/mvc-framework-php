<?php

// @package app\core

namespace app\core;

use app\core\exceptions\NotFoundExc;

class Router
{
    public string $layout = 'main';
    public Request $req;
    public Response $res;
    protected array $routes = [];

    public function __construct(Request $req, Response $res)
    {
        $this->req = $req;
        $this->res = $res;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    /**
     * @throws \app\core\exceptions\NotFoundExc
     */
    public function resolve()
    {
        $path = $this->req->getPath();
        $method = $this->req->method();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            throw new NotFoundExc;
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if (is_array($callback)) {
            /* @var \app\core\Controller $controller*/
            $controller = new $callback[0]();
            Application::$app->controller = $controller;
            $controller->deed = $callback[1];
            $callback[0] = $controller;

            foreach ($controller->getMds() as $md) {
                $md->exec();
            }
        }

        return call_user_func($callback, $this->req, $this->res);
    }

    public function renderView($view, $crumbs = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderViewContent($view, $crumbs);

        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent()
    {
        $layout = Application::$app->layout;
        if (Application::$app->controller) {
            $layout = Application::$app->controller->layout;
        }

        ob_start();

        include_once Application::$ROOT_DIR . "/views/layouts/_$layout.php";

        return ob_get_clean();
    }

    protected function renderViewContent($view, $crumbs)
    {
        foreach ($crumbs as $k => $val) {
            // if $k evals as name, $$k evans as var name
            $$k = $val;
        }

        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";

        return ob_get_clean();
    }

    public function renderContent($content)
    {
        $layoutContent = $this->layoutContent();

        return str_replace('{{content}}', $content, $layoutContent);
    }
}