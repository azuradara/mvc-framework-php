<?php

namespace app\core\forms;

use app\core\Model;

class Form
{

    public static function open($action, $method)
    {
        echo sprintf('<form action="%s" method="%s">', $action, $method);
        return new Form;
    }

    public static function close()
    {
        echo "</form>";
    }

<<<<<<< HEAD
    #[Pure] public function input(Model $model, $attr): RegInput
=======
    public function input(Model $model, $attr)
>>>>>>> parent of 1b329ad (this might break it all)
    {
        return new RegInput($model, $attr);
    }
}