<?php

namespace app\core;

class Database {
	public \PDO $dbdriver;

	public function __construct(array $dbConfig)
	{
		$dsn = $dbConfig['dsn'] ?? '';
		$user = $dbConfig['user'] ?? '';
		$pwd = $dbConfig['pwd'] ?? '';


		$this->dbdriver = new \PDO($dsn, $user, $pwd);
		$this->dbdriver->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	}
}