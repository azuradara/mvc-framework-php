<?php

// @package app\controllers

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

// use \app\core\Application;

class AppController extends Controller
{

    public function _render_home()
    {
        $crumbs = [
            'test' => 'test'
        ];

        return $this->render('home', $crumbs);
    }

    public function _render_contact()
    {
        return $this->render('contact');
    }

    public function _wrangle_contact(Request $req)
    {
        $req->getReqBody();
        return 'Wrangling tards';
    }
}