<?php


namespace app\core\middlewares;


use app\core\Application;
use app\core\exceptions\ForbiddenExc;

class AuthMD implements RootMD
{

    public array $deeds = [];

    public function __construct(array $deeds)
    {
        $this->deeds = $deeds;
    }

    public function exec()
    {
        if (Application::guestUser()) {
            if (empty($this->deeds) || in_array(Application::$app->controller->deed, $this->deeds)) {
                throw new ForbiddenExc();
            }
        }
    }
}