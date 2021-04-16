<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\User;

class Authcontroller extends Controller
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
                return 'sgood';
            }

            var_dump($user->err);

            return $this->render('signup', ['model' => $user]);
        }


        return $this->render('signup', ['model' => $user]);
    }
}