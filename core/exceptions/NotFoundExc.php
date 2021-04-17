<?php


namespace app\core\exceptions;


class NotFoundExc extends \Exception
{
    protected $message = "Page Not Found.";
    protected $code = 404;
}