<?php

namespace app\core\forms;

use app\core\Model;

class Input {
	public Model $model;
	public string $attr;

	public function __construct(Model $model, string $attr) {
		
	}
} 