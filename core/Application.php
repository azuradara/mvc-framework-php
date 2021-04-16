<?php

// @package app\core

namespace app\core;

class Application
{
    public static string $ROOT_DIR;
    public static Application $app;

    public string $userClass;
    public Database $db;
    public Router $router;
    public Request $req;
    public Response $res;
    public Controller $controller;
    public Session $session;
    public ?BaseDBModel $user;

    public function __construct($root, array $config)
    {
        self::$ROOT_DIR = $root;
        self::$app = $this;

        $this->db = new Database($config['db']);
        $this->userClass = $config['userClass'] ?? '';
        $this->session = new Session();
        $this->req = new Request();
        $this->res = new Response();
        $this->router = new Router($this->req, $this->res);

//        never use external classes inside the core


        $pval = $this->session->get('user');

        if ($pval) {
            $pk = $this->userClass::get_pk();
            $this->user = $this->userClass::fetchOne([$pk => $pval]);
        } else {
            $this->user = null;
        }
    }

    public static function guestUser()
    {
        return !self::$app->user;
    }

    public function run()
    {
        echo $this->router->resolve();
    }

    public function getController(): Controller
    {
        return $this->controller;
    }

    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }

    public function login(BaseDBModel $user): bool
    {
        $this->user = $user;

        $pk = $user->get_pk();
        $pval = $user->{$pk};

        $this->session->set('user', $pval);

        return true;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->del('user');
    }
}