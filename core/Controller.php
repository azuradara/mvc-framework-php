<?php

namespace app\core;

use app\core\middlewares\RootMD;

abstract class Controller
{

    public string $layout = 'main';
    public string $deed = '';
    /*
     * @var \app\core\middlewares\RootMD[]
     */
    protected array $mds = [];

    public function render($view, $crumbs = []): bool|array|string
    {
        return Application::$app->view->renderView($view, $crumbs);
    }

// --Commented out by Inspection START (4/17/2021 5:15 AM):
//    public function socketView($layout)
//    {
//        $this->layout = $layout;
//    }
// --Commented out by Inspection STOP (4/17/2021 5:15 AM)


    public function getMds(): array
    {
        return $this->mds;
    }

    public function setMds(RootMD $md)
    {
        $this->mds[] = $md;
    }
}