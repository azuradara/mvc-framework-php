<?php

// @package app\core

namespace app\core;

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

    public function isGET()
    {
        return $this->method() === 'get';
    }

    // HELPERS

    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isPOST()
    {
        return $this->method() === 'post';
    }

    // HELPERS

    public function getReqBody()
    {
        $postBody = [];

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