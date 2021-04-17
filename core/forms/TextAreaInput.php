<?php


namespace app\core\forms;


class TextAreaInput extends BaseInput
{

    public function renderInput(): string
    {
        return sprintf('<textarea name="%s" class="%s resize-none h-full w-full border-gray-300 px-2 transition-all border-blue rounded-sm">%s</textarea>'
            ,
            $this->attr,
            $this->model->hasErr($this->attr) ? 'border-red-500' : '',
            $this->model->{$this->attr},
        );
    }
}