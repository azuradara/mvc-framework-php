<?php


namespace app\core\exceptions;


use Exception;

class ForbiddenExc extends Exception
{
    protected $message = "Access Denied.";
    protected $code = 403;
}