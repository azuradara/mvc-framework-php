<?php

namespace app\controllers;

use app\core\Request;
use app\core\Controller;
use app\models\SignupModel;

class Authcontroller extends Controller {

	// $this->socketView('blank');
	// this method to socket content in a different view

	public function login() {
		return $this->render('login');
	}

	public function signup(Request $req) {
		$signupModel = new SignupModel();
		$err = [];
		
		if ($req->isPOST()) {
			$signupModel->getData($req->getReqBody());

			// var_dump($signupModel);

			if ($signupModel->validate() && $signupModel->register()) {
				return 'sgood';
			}

			var_dump($signupModel->err);

			return $this->render('signup', ['model' => $signupModel]);
		}


		return $this->render('signup', ['model' => $signupModel]);
	}
}