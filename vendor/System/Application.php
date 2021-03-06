<?php
/**
 * Created by PhpStorm.
 * User: Vasq
 * Date: 5/03/2017
 * Time: 17:46
 */

namespace System;
use Closure;

class Application
{

    private $container = [];
    private static $instance = null;

    private function __construct(File $file)
    {
        $this->share('file', $file);
        $this->registerClass();
        $this->loadHelpers();
    }

    public static function getInstance($file = null)
    {
        if (is_null(static::$instance)) {
            static::$instance = new static($file);
        }
        return static::$instance;
    }

    public function run(){
        $this->session->start();
        $this->request->prepareUrl();
        $this->file->call("App/index.php");
        list($controller,$method, $arguments) = $this->route->getProperRoute();
        $output = $this->loader->action($controller,$method,$arguments);
        $this->response->setOutput($output);
        $this->response->send();


    }

    public function share($aliasClass, $value)
    {
        if($value instanceof Closure){
            $value = call_user_func($value,$this);
        }
        $this->container[$aliasClass] = $value;
    }

    public function registerClass()
    {
        spl_autoload_register([$this, 'load']);
    }

    public function load($class)
    {
        if (strpos($class, 'App') === 0) {
            $file = $class . '.php';
        } else {
            $file = 'vendor/' . $class . '.php';
        }

        if ($this->file->exists($file)) {
            $this->file->call($file);
        }

    }

    public function __get($alias)
    {
        return $this->get($alias);
    }

    public function get($classAlias)
    {
        if (!$this->isSharing($classAlias)) {
            if ($this->isCoreAlias($classAlias)) {
                $this->share($classAlias, $this->createNewObject($classAlias));
            } else {
                die("No se encontro la clase solicitada ". $classAlias);
            }
        }
        return $this->container[$classAlias];
    }

    private function isSharing($classAlias)
    {
        return isset($this->container[$classAlias]);
    }

    private function isCoreAlias($classAlias)
    {
        return isset($this->coreClass()[$classAlias]);
    }

    private function coreClass()
    {
        return [
            "session" => "System\\Session",
            "request" => "System\\Http\\Request",
            "route"   => "System\\Route",
            'loader'  => "System\\Loader",
            'view' => "System\\View\\ViewFactory",
            'response' => "System\\Http\\Response",
            'db' =>"System\\Database",
            'DBase' => "System\\DBase",
            'url' => "System\\Url",
            'html' => "System\\Html",
            'cookie' => "System\\Cookie"


        ];
    }

    private function loadHelpers()
    {
        $this->file->call('vendor/System/Helpers.php');
    }

    private function createNewOBject($classAlias)
    {
        $class = $this->coreClass()[$classAlias];
        return new $class($this);
    }


}