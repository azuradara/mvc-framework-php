<?php

namespace app\core;

class Database {
	public \PDO $driver;

	public function __construct(array $dbConfig)
	{
		$dsn = $dbConfig['dsn'] ?? '';
		$user = $dbConfig['user'] ?? '';
		$pwd = $dbConfig['pwd'] ?? '';


		$this->driver = new \PDO($dsn, $user, $pwd);
		$this->driver->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	}
	
	public function migrate()
	{
		$this->initiateDB();
		
		$migged = $this->getMigs();
		$migs = scandir(Application::$ROOT_DIR.'/migrations');
		$unmigged = array_diff($migs, $migged);
		
		$newMigs = [];

		foreach ($unmigged as $mig) {
			if ($mig === '.' || $mig === '..') {
				continue;
			}

			require_once Application::$ROOT_DIR.'./migrations/'.$mig;
			
			// gives filename without extension
			$stripped_mig = pathinfo($mig, PATHINFO_FILENAME);

			$migObj = new $stripped_mig();
			
			echo PHP_EOL;
			echo "Migrating.. [$mig]".PHP_EOL;
			$migObj->export();
			echo "Done migrating.. [$mig]".PHP_EOL;
			echo PHP_EOL;

			$newMigs[] = $mig;
		}

		if (!empty($newMigs)) {
			$this->saveMigs($newMigs);
		} else {
			echo 'Done migrating..';
		}
	}

	public function initiateDB()
	{
		$this->driver->exec('
		create table if not exists migs(
			id serial primary key,
			mig varchar(128),
			creation_date timestamp default current_timestamp
		) ENGINE=INNODB;
		');
	}

	public function getMigs()
	{
		$stmt = $this->driver->prepare('select mig from migs');
		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_COLUMN);
	}

	public function saveMigs(array $migs)
	{
		$vals = implode(',', array_map(fn($m) => "('$m')", $migs));

		$stmt = $this->driver->prepare("insert into migs (mig) values $vals");
		$stmt->execute();
	}
}