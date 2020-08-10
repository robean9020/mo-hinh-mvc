<?php
namespace MyApp;
use MyApp\Controllers\tasksController;

class Dispatcher
{

    private $request;

    public function dispatch()
    {
        $this->request = new Request();

        Router::parse($this->request->url, $this->request);


        $controller = $this->loadController();

        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    public function loadController()
    {
        $namespace = 'MyApp\Controllers\\'. $this->request->controller . 'Controller';
        $controller = new $namespace();
        return $controller;
    }

}
