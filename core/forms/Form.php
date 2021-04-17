<?php

namespace app\core\forms;

use app\core\Model;
use JetBrains\PhpStorm\Pure;

class Form
{

    public static function open($action, $method): Form
    {
        echo sprintf('<form action="%s" method="%s">', $action, $method);
        return new Form;
    }

    public static function close()
    {
        echo "</form>";
    }

    #[Pure] public function input(Model $model, $attr): Input
    {
        return new Input($model, $attr);
    }
}