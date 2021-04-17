<?php


namespace app\core\exceptions;


class ForbiddenExc extends \Exception
{
    protected $message = "Access Denied.";
    protected $code = 403;
}