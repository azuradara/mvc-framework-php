<?php

namespace app\core\forms;

use app\core\Model;
use JetBrains\PhpStorm\Pure;

class RegInput extends BaseInput
{
    public const TY_TEXT = 'text';
    public const TY_PWD = 'password';

    public string $type;

    #[Pure] public function __construct(Model $model, string $attr)
    {
        parent::__construct($model, $attr);
        $this->type = self::TY_TEXT;
    }

    public function toPwd(): RegInput
    {
        $this->type = self::TY_PWD;
        return $this;
    }

    //TODO: go over this later, it works but it's way too scuffed
    //make it so that you can add classes or maybe dynamic attributes(?)

    public function renderInput(): string
    {
        return sprintf('<input type="%s" name="%s" value="%s" class="%s h-full w-full border-gray-300 px-2 transition-all border-blue rounded-sm"/>'
            ,
            $this->type,
            $this->attr,
            $this->model->{$this->attr},
            $this->model->hasErr($this->attr) ? 'border-red-500' : '',
        );
    }
}