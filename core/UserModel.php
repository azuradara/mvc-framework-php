<?php


namespace app\core;


abstract class UserModel extends BaseDBModel
{

    abstract public function getDisplayName(): string;

}