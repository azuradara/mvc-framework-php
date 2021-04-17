<?php

namespace app\core;

abstract class BaseDBModel extends Model
{
    public static function fetchOne($loc)
    {
        $table = static::get_table();
//        call gettable on the class instead of this abstract
        $attr = array_keys($loc);
        $sql = implode("AND ", array_map(fn($a) => "$a = :$a", $attr));

        $stmt = self::prepare("SELECT * FROM $table WHERE $sql");

        foreach ($loc as $k => $v) {
            $stmt->bindValue(":$k", "$v");
        }

        $stmt->execute();

        return $stmt->fetchObject(static::class);
        // return object as instance of invoker class (ye it took a few braincells)
    }

    abstract public static function get_pk(): string;

    public function push()
    {
        // TODO: introspect schema to get attributes instead of getting them manually
        $table = $this->get_table();
        $rows = $this->get_rows();

        $params = array_map(fn($row) => ":$row", $rows);

        $stmt = self::prepare("INSERT INTO $table (" . implode(',', $rows) . ") VALUES(" . implode(',', $params) . ")");

        // iterate over rows and bind

        foreach ($rows as $row) {
            $stmt->bindValue(":$row", $this->{$row});
        }

        $stmt->execute();

        return true;
    }

    abstract public static function get_table(): string;

    abstract public function get_rows(): array;

    public static function prepare($sql)
    {
        return Application::$app->db->driver->prepare($sql);
    }
}