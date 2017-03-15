<?php
/**
 * Created by PhpStorm.
 * User: Vasq
 * Date: 14/03/2017
 * Time: 18:53
 */

namespace System;


class Url
{
    protected $app;


    public function __construct(Application $app)
    {
        $this->app= $app;
    }
    public function link($path)
    {
        
        return $this->app->request->baseUrl() . trim($path,'/');
    }

    public function redirectTo($path)
    {
        header('location:' . $this->link($path));
        exit();
    }
}