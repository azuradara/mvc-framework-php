<?php


namespace app\core\exceptions;


use Exception;

class NotFoundExc extends Exception
{
    protected $message = "Page Not Found.";
    protected $code = 404;
}