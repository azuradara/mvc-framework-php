<?php

// @package app\core

namespace app\core;

use app\core\exceptions\NotFoundExc;

class Router
{
    // --Commented out by Inspection (4/17/2021 5:15 AM):public string $layout = 'main';
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
            return Application::$app->view->renderView($callback);
        }

        if (is_array($callback)) {
            /* @var \app\core\Controller $controller */
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
}