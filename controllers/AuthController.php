<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AuthMD;
use app\core\Request;
use app\core\Response;
use app\models\Login;
use app\models\User;

class AuthController extends Controller
{

    // $this->socketView('blank');
    // this method to socket content in a different view

    public function __construct()
    {
        $this->setMds(new AuthMD(['profile']));
    }

    public function login(Request $req, Response $res)
    {
        $login = new Login();

        if ($req->isPOST()) {
            $login->getData($req->getReqBody());

            if ($login->validate() && $login->login()) {
                $res->redirect('/');
                return;
            }
        }

        return $this->render('login', ['model' => $login]);
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

    public function logout(Request $req, Response $res)
    {
        Application::$app->logout();
        $res->redirect('/');
    }

    public function profile()
    {
        return $this->render('profile');
    }
}
