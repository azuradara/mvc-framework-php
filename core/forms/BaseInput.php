<?php


namespace app\core\forms;


use app\core\Model;

abstract class BaseInput
{
    public Model $model;
    public string $attr;

    public function __construct(Model $model, string $attr)
    {
        $this->model = $model;
        $this->attr = $attr;
    }

    public function __toString(): string
    {
        return sprintf('
			<div class="relative h-10 input-component mb-5 empty">
				<label for="%s" class="absolute left-2 transition-all bg-white px-1">%s</label>
				%s
				<div class="text-sm text-red-500">%s</div>
			</div>
		',
            $this->attr,
            $this->model->get_label($this->attr),
            $this->renderInput(),
            $this->model->firstErr($this->attr)
        );
    }

    abstract public function renderInput(): string;
}