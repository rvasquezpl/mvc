<?php
/**
 * Created by PhpStorm.
 * User: Vasq
 * Date: 6/03/2017
 * Time: 10:56
 */

namespace System;


class Loader
{
    private $app;
    private $controllers = [];
    private $methods = [];

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function action($controller, $method, $arguments = [])
    {
        $objController = $this->controller($controller);
        call_user_func([$objController,$method],$arguments);

    }

    private function controller($controller)
    {
        $controllerName = $this->getNameController($controller);
        if (!$this->hasController($controllerName)) {
            $this->addController($controllerName);
        }
        return $this->getController($controllerName);
    }

    private function getNameController($controller)
    {
        $controller .="Controller";
        $controllerName = "App\\Controllers\\" . $controller;
        return str_replace("/", "\\", $controllerName);
    }

    private function hasController($controllerName)
    {
        return isset($this->controllers[$controllerName]);

    }

    private function addController($controllerName)
    {
        if($this->app->file->exists($controllerName.'.php')){
            $objController = new $controllerName($this->app);
            $this->controllers[$controllerName] = $objController;
        }else{
            die("No se encontro el controlador solicitado");
        }
    }

    private function getController($controllerName)
    {
        return $this->controllers[$controllerName];
    }


}