<?php

// @package app\controllers

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use JetBrains\PhpStorm\Pure;

// use \app\core\Application;

class AppController extends Controller
{

    public function _render_home(): bool|array|string
    {
        $crumbs = [
            'test' => 'test'
        ];

        return $this->render('home', $crumbs);
    }

    public function _render_contact(): bool|array|string
    {
        return $this->render('contact');
    }

    #[Pure] public function _wrangle_contact(Request $req): string
    {
        return 'Wrangling tards';
    }
}