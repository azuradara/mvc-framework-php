<?php

namespace app\core\forms;

use app\core\Model;

class Input {
	public const TY_TEXT = 'text';
	public const TY_PWD = 'password';

	public Model $model;
	public string $attr;
	public string $type;

	public function __construct(Model $model, string $attr) {
		$this->model = $model;
		$this->attr = $attr;
		$this->type = self::TY_TEXT;
	}

	public function toPwd()
	{
		$this->type = self::TY_PWD;
		return $this;
	}

	//TODO: go over this later, it works but it's way too scuffed
	//make it so that you can add classes or maybe dynamic attributes(?)

	public function __toString()
	{
		return sprintf('
			<div class="relative h-10 input-component mb-5 empty">
				<label for="%s" class="absolute left-2 transition-all bg-white px-1">%s</label>
				<input type="%s" name="%s" value="%s" class="%s h-full w-full border-gray-300 px-2 transition-all border-blue rounded-sm" />
				<div class="text-sm text-red-500">%s</div>
			</div>
		',
			$this->attr,
			$this->attr,
			$this->type,
			$this->attr,
			$this->model->{$this->attr},
			$this->model->hasErr($this->attr) ? 'border-red-500' : '',
			$this->model->firstErr($this->attr)
		);
	}
} 