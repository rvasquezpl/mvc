<?php
/**
 * Created by PhpStorm.
 * User: Vasq
 * Date: 6/03/2017
 * Time: 11:33
 */

namespace System;


abstract class Controller
{
    protected $app;
    public function __construct(Application $app)
    {
        $this->app= $app;
    }
    public function __get($key)
    {
        return $this->app->get($key);

    }

    public abstract function index();
}