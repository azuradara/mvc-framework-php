<?php

namespace app\core;

use app\core\middlewares\RootMD;

abstract class Controller
{

    public $layout = 'main';
    public string $deed = '';
    /*
     * @var \app\core\middlewares\RootMD[]
     */
    protected array $mds = [];

    public function render($view, $crumbs = [])
    {
        return Application::$app->view->renderView($view, $crumbs);
    }

    public function socketView($layout)
    {
        $this->layout = $layout;
    }

    public function getMds()
    {
        return $this->mds;
    }

    public function setMds(RootMD $md)
    {
        $this->mds[] = $md;
    }
}