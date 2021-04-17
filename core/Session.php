<?php


namespace app\core;


class Session
{
    protected const POP_KEY = 'pops';

    public function __construct()
    {
        session_start();
        $pops = $_SESSION[self::POP_KEY] ?? [];

        foreach ($pops as $k => &$pop) {
            // Mark a pop for death - as soon as request is fulfilled so that they don't stack on next requests (with a destructor)
            $pop['marked'] = true;
        }

        $_SESSION[self::POP_KEY] = $pops;
    }

    public function setPop($key, $msg)
    {
        $_SESSION[self::POP_KEY][$key] = [
            'marked' => false,
            'value' => $msg,
        ];
    }

    public function getPop($key)
    {
//        var_dump($_SESSION[self::POP_KEY]); this hurt
        return $_SESSION[self::POP_KEY][$key]['value'] ?? false;
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        // Iterate over marked pops and bop
        $pops = $_SESSION[self::POP_KEY] ?? [];

        foreach ($pops as $k => &$pop) {
            if ($pop['marked']) {
                unset($pops[$k]);
            }
        }

        $_SESSION[self::POP_KEY] = $pops;
    }

    public function set($k, $v)
    {
        $_SESSION[$k] = $v;
    }

    public function get($k)
    {
        return $_SESSION[$k] ?? false;
    }

    public function del($k)
    {
        unset($_SESSION[$k]);
    }
}