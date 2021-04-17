<?php

// @package app\controllers

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
<<<<<<< HEAD
use app\core\Response;
use app\models\ContactForm;
=======
>>>>>>> parent of 1b329ad (this might break it all)

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

<<<<<<< HEAD
    public function contact(Request $req, Response $res): bool|array|string
=======
    public function _render_contact()
>>>>>>> parent of 1b329ad (this might break it all)
    {
        $contact = new ContactForm();

<<<<<<< HEAD
        if ($req->isPOST()) {
            $contact->getData($req->getReqBody());

            if ($contact->validate() && $contact->push()) {
                Application::$app->session->setPop('success', 'Thanks for contacting us, we\'ll get back to you soon!');
                return $res->redirect('/contact');
            }
        }

        return $this->render('contact', ['model' => $contact]);
=======
    public function _wrangle_contact(Request $req)
    {
        $req->getReqBody();
        return 'Wrangling tards';
>>>>>>> parent of 1b329ad (this might break it all)
    }
}