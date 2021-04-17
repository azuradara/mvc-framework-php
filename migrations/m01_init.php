<?php

//namespace app\migrations;

use app\core\Application;

class m01_init
{
    public function export()
    {
        $db = Application::$app->db;
        $sql = '
		create table user (
			userId serial primary key,
			userState int not null,
			userUsername varchar(16) not null,
			userEmail varchar(64) not null,
			userPwd varchar(64) not null,
			userCreationDate timestamp default current_timestamp
		);
		';
        $db->driver->exec($sql);
    }

    public function drop()
    {
        $db = Application::$app->db;
        $sql = '
		drop table if exists user;
		';
        $db->driver->exec($sql);
    }
}

