<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

class Authcontroller extends Controller {

	public function login() {
		return $this->render('login');
	}

	public function signup(Request $req) {
		if ($req->isPOST()) {
			return 'wrangling';
		}

		$this->socketView('blank');

		return $this->render('signup');
	}
}