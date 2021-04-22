<?php


namespace app\models;


class ContactForm extends \app\core\Model
{
    public string $name = '';
    public string $email = '';
    public string $address = '';

    public function ruleset(): array
    {
        return [
            'name' => [self::RL_REQUIRED],
            'email' => [self::RL_REQUIRED, self::RL_EMAIL],
            'address' => [self::RL_REQUIRED],
        ];
    }

    public function inputLabels(): array
    {
        return [
            'name' => 'Full Name',
            'email' => 'E-Mail',
            'address' => 'Address',
        ];
    }

    public function push()
    {
//        TODO: Implement this later
        return true;
    }
}