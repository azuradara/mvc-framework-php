<?php

// @package app\core

namespace app\core;

use JetBrains\PhpStorm\Pure;

class Request
{

    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $pos = strpos($path, '?');
        if ($pos === false) {
            return $path;
        }

        return substr($path, 0, $pos);
    }

// --Commented out by Inspection START (4/17/2021 5:15 AM):
//    #[Pure] public function isGET(): bool
//    {
//        return $this->method() === 'get';
//    }
// --Commented out by Inspection STOP (4/17/2021 5:15 AM)


    // HELPERS

    #[Pure] public function isPOST(): bool
    {
        return $this->method() === 'post';
    }

    public function method(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    // HELPERS

    #[Pure] public function getReqBody(): array
    {
        $reqBody = [];

        // filter_input ( int $type , string $var_name , int $filter = FILTER_DEFAULT , array|int $options = 0 ) : mixed
        // Idk how it works but it just does

        if ($this->method() === 'get') {
            foreach ($_GET as $k => $val) {
                $reqBody[$k] = filter_input(INPUT_GET, $k, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if ($this->method() === 'post') {
            foreach ($_POST as $k => $val) {
                $reqBody[$k] = filter_input(INPUT_POST, $k, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $reqBody;
    }
}