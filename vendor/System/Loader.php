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
    private $models= [];

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function action($controller, $method, $arguments = [])
    {
        $objController = $this->controller($controller);
        return call_user_func([$objController,$method],$arguments);

    }

    public function controller($controller)
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
            die("No se encontro el controlador solicitado ". $controllerName);
        }
    }

    private function getController($controllerName)
    {
        return $this->controllers[$controllerName];
    }




    public function model($model)
    {
        $modelName = $this->getNamemodel($model);
        if (!$this->hasmodel($modelName)) {
            $this->addmodel($modelName);
        }
        return $this->getmodel($modelName);
    }

    private function getNamemodel($model)
    {
        $model .="model";
        $modelName = "App\\models\\" . $model;
        return str_replace("/", "\\", $modelName);
    }

    private function hasmodel($modelName)
    {
        return isset($this->models[$modelName]);

    }

    private function addmodel($modelName)
    {
        if($this->app->file->exists($modelName.'.php')){
            $objmodel = new $modelName($this->app);
            $this->models[$modelName] = $objmodel;
        }else{
            die("No se encontro el modelo solicitado");
        }
    }

    private function getmodel($modelName)
    {
        return $this->models[$modelName];
    }


}