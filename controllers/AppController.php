<?php

// @package app\controllers

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\ContactForm;

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

    public function contact(Request $req, Response $res): bool|array|string
    {
        $contact = new ContactForm();

        if ($req->isPOST()) {
            $contact->getData($req->getReqBody());

            if ($contact->validate() && $contact->push()) {
                Application::$app->session->setPop('success', 'Thanks for contacting us, we\'ll get back to you soon!');
                return $res->redirect('/contact');
            }
        }

        return $this->render('contact', ['model' => $contact]);
    }
}