<?php

namespace app\core;

abstract class BaseDBModel extends Model {
	abstract public function get_table(): string;

	abstract public function get_rows(): array;

	public function push() {
		// TODO: introspect schema to get attributes instead of getting them manually
		$table = $this->get_table();
		$rows = $this->get_rows();

		$params = array_map(fn($row) => ":$row", $rows);

		$stmt = self::prepare("INSERT INTO $table (".implode(',', $rows).") VALUES(".implode(',', $params).")");

		// iterate over rows and bind

		foreach($rows as $row) {
			$stmt->bindValue(":$row", $this->{$row});
		}
		
		$stmt->execute();
		
		return true;
	}

	public static function prepare($sql) {
		return Application::$app->db->driver->prepare($sql);
	}
}