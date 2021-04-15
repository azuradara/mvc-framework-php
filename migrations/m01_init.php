<?php

class m01_init {
	public function export()
	{
		$db = \app\core\Application::$app->db;
		$sql = '		
		create table user (
			userId serial primary key,
			userUsername varchar(16) not null,
			userEmail varchar(64) not null,
			userPwd varchar(64) not null
		);
		';
		$db->driver->exec($sql);
	}

	public function drop()
	{
		$db = \app\core\Application::$app->db;
		$sql = '		
		drop table if exists user;
		';
		$db->driver->exec($sql);
	}
}