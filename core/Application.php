<?php

// @package app\core

namespace app\core;

use Exception;

class Application
{
    const EV_PRE_REQ = 'preReq';
    const EV_POST_REQ = 'postReq';

    protected array $eventListeners = [];

    public static string $ROOT_DIR;
    public static Application $app;

    public string $userClass;
    public string $layout = 'main';
    public Database $db;
    public Router $router;
    public Request $req;
    public Response $res;
    public ?Controller $controller = null;
    public Session $session;
    public ?BaseDBModel $user;
    public View $view;

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
        $this->view = new View();

//        never use external classes inside the core


        $pval = $this->session->get('user');

        if ($pval) {
            $pk = $this->userClass::get_pk();
            $this->user = $this->userClass::fetchOne([$pk => $pval]);
        } else {
            $this->user = null;
        }
    }

    public static function guestUser(): bool
    {
        return !self::$app->user;
    }

    public function run()
    {

        $this->trigger(self::EV_PRE_REQ);

        try {
            echo $this->router->resolve();
        } catch (Exception $e) {
            $this->res->setStatusCode($e->getCode());
            echo $this->view->renderView('_error', [
                'e' => $e
            ]);
        }
    }

// --Commented out by Inspection START (4/17/2021 5:15 AM):
//    public function getController(): Controller
//    {
//        return $this->controller;
//    }
// --Commented out by Inspection STOP (4/17/2021 5:15 AM)


// --Commented out by Inspection START (4/17/2021 5:15 AM):
//    public function setController(Controller $controller): void
//    {
//        $this->controller = $controller;
//    }
// --Commented out by Inspection STOP (4/17/2021 5:15 AM)


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

    public function on (string $event, $callback) {
        $this->eventListeners[$event][] = $callback;
    }

    private function trigger(string $event)
    {
        $callbacks = $this->eventListeners[$event] ?? [];

        foreach ($callbacks as $c) {
            call_user_func($c);
        }
    }
}