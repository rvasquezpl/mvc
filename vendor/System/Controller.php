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

    /**
     * Error container
     * @var array
     */
    protected $errors = [];

    /**
     * Controller constructor.
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app= $app;
    }

    /**
     * Econe the given valu to json
     * @param mixed $data;
     * @return string
     */
    public function json($data)
    {
        return json_encode($data);
    }

    public function __get($key)
    {
        return $this->app->get($key);

    }

    public abstract function index();
}