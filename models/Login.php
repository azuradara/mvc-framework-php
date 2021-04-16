<?php


namespace app\models;

use app\core\Application;
use app\core\Model;

class Login extends Model
{
    public string $userUsername = '';
    public string $userPwd = '';

    public function ruleset(): array
    {
        return [
            'userUsername' => [self::RL_REQUIRED],
            'userPwd' => [self::RL_REQUIRED]
        ];
    }

    public function inputLabels(): array
    {
        return [
            'userUsername' => 'Username',
            'userPwd' => 'Password'
        ];
    }

    public function login()
    {
        $user = (new User)->fetchOne(['userUsername' => $this->userUsername]);
        if (!$user) {
            $this->appendErr('userUsername', "We can't find an account with this username.");
            return false;
        }

        if (!password_verify($this->userPwd, $user->userPwd)) {
            $this->appendErr('userPwd', "Invalid credentials.");
            return false;
        }

        var_dump($user);

        return Application::$app->login();
    }
}