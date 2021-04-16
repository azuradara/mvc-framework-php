<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\User;

class AuthController extends Controller
{

    // $this->socketView('blank');
    // this method to socket content in a different view

    public function login()
    {
        return $this->render('login');
    }

    public function signup(Request $req)
    {
        $user = new User();
        $err = [];

        if ($req->isPOST()) {
            $user->getData($req->getReqBody());

            // var_dump($user);

            if ($user->validate() && $user->push()) {
                Application::$app->session->setPop('success', 'Registration successful!');
                Application::$app->res->redirect('/');
                exit;
            }

            var_dump($user->err);

            return $this->render('signup', ['model' => $user]);
        }


        return $this->render('signup', ['model' => $user]);
    }
}
