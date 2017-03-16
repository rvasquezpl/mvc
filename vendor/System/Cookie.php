<?php
/**
 * Created by PhpStorm.
 * User: Vasq
 * Date: 5/03/2017
 * Time: 18:41
 */

namespace System;


class Cookie
{
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function set($key, $value, $hours = 1800){
        setcookie($key,$value, time() + $hours * 3600,'','',false,true);
        exit();
    }

    public function get($key,$default = "")
    {
        return array_get($_COOKIE,$key,$default);
    }


    public function remove($key)
    {
        setcookie($key, null, -1);
        unset($_COOKIE[$key]);
    }

    public function has($key)
    {
        return array_key_exists($key, $_COOKIE);
    }
    public function all(){
        return $_COOKIE;
    }

    public function destroy(){
        foreach (array_keys($this->all()) AS $key){
            $this->remove($key);
        }
        unset($_COOKIE);
    }
}