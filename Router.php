<?php

class Router {
    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    public function direct($uri, $method)
    {
       if(array_key_exists($uri, $this->routes[$method])) {
            return $this->callAction(...explode('@', $this->routes[$method][$uri]));
       };
       require '404.php';
       die();
    }

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    protected function callAction($controller, $function)
    {
        require 'controllers/'.$controller.'.php';
        $controller = (new $controller);
        if (!method_exists($controller, $function)) {
            require '404.php';
            die();
        }
        return $controller->$function();
    }
}
