<?php

namespace app\models;

//use app\core\BaseDBModel;
use app\core\UserModel;
use JetBrains\PhpStorm\ArrayShape;

class User extends UserModel
{
    // --Commented out by Inspection (4/17/2021 5:15 AM):const STATE_ON = 0;
    const STATE_OFF = 1;
    // --Commented out by Inspection (4/17/2021 5:15 AM):const STATE_RM = 2;


    public string $userUsername = '';
    // --Commented out by Inspection (4/17/2021 5:15 AM):public string $userEmail = '';
    public string $userPwd = '';
    // --Commented out by Inspection (4/17/2021 5:15 AM):public string $userPwdRpt = '';

    public int $userState = self::STATE_OFF;

    public static function get_table(): string
    {
        return 'user';
    }

    public static function get_pk(): string
    {
        return 'userId';
    }

    public function push(): bool
    {
        $this->userState = self::STATE_OFF;
        $this->userPwd = password_hash($this->userPwd, PASSWORD_DEFAULT);
        return parent::push();
    }

    public function get_rows(): array
    {
        return ['userUsername', 'userEmail', 'userPwd', 'userState'];
    }

    #[ArrayShape(['userUsername' => "array", 'userEmail' => "array", 'userPwd' => "array", 'userPwdRpt' => "array"])] public function ruleset(): array
    {
        return [
            'userUsername' => [self::RL_REQUIRED, [self::RL_MIN, 'val' => 3], [self::RL_MAX, 'val' => 16], [self::RL_UNIQ, 'class' => self::class]],
            'userEmail' => [self::RL_REQUIRED, self::RL_EMAIL, [self::RL_UNIQ, 'class' => self::class]],
            'userPwd' => [self::RL_REQUIRED],
            'userPwdRpt' => [self::RL_REQUIRED, [self::RL_MATCH, 'matches' => 'userPwd']],
        ];
    }

    #[ArrayShape(['userUsername' => "string", 'userEmail' => "string", 'userPwd' => "string", 'userPwdRpt' => "string"])] public function inputLabels(): array
    {
        return [
            'userUsername' => 'Username',
            'userEmail' => 'Email',
            'userPwd' => 'Password',
            'userPwdRpt' => 'Confirm Password',
        ];
    }

    public function getDisplayName(): string
    {
        // TODO: Implement getDisplayName() method.

        return $this->userUsername;
    }
}
