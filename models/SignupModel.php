<?php

namespace app\models;

use app\core\Model;

class SignupModel extends Model
{

    public string $userUsername;
    public string $userEmail;
    public string $userPwd;
    public string $userPwdRpt;

    public function register()
    {
        echo "creating";
    }

    public function ruleset(): array
    {
        return [
            'userUsername' => [self::RL_REQUIRED, [self::RL_MIN, 'val' => 3], [self::RL_MAX, 'val' => 16]],
            'userEmail' => [self::RL_REQUIRED, self::RL_EMAIL],
            'userPwd' => [self::RL_REQUIRED],
            'userPwdRpt' => [self::RL_REQUIRED, [self::RL_MATCH, 'matches' => 'userPwd']],
        ];
    }
}